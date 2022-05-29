<?php
//treeplanting api call
include 'includes/treeapi.php';


$fname = $_POST['fname'] ?? null;
$lname = $_POST['lname'] ?? null;
$email = $_POST['email'] ?? null;

$errors = array();

if (isset($_POST['submit'])) {

    //validate user has entered a name
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = true;
    }

    if (count($errors) === 0) {
        include 'includes/library.php';

        $pdo = connectDB();
        
        // We need to know if the email is already in our database
        $query = "SELECT * FROM `USERS` WHERE `email`= ?";
        $stmt = $pdo->prepare($query);
        $stmt->execute([$email]);

        $user = $stmt->fetch();

        // If email exists 
        if (!is_null($user['email'])) {
            if(is_null($user['fname']) || $user['fname'] == ""){
                $query = "UPDATE `USERS` SET `fname` = ? WHERE `email` = ?";
                $stmt = $pdo->prepare($query);
                $stmt->execute([$fname, $email]);
            }
            if(is_null($user['lname'])|| $user['lname'] == ""){
                $query = "UPDATE `USERS` SET `lname`= ? WHERE `email` = ?";
                $stmt = $pdo->prepare($query);
                $stmt->execute([$lname, $email]);
            }
        }
        else if (is_null($user['email'])){
            $query = "INSERT INTO `USERS` VALUES (?,?,?)";
            $stmt = $pdo->prepare($query);
            $stmt->execute([$fname, $lname, $email]);
            
            //call api only once per email address
            plantTree($email);
        }

        
        //send the user to the thankyou page.
        header("Location:thankyou.php");
        exit();
    }

}

?>

<!------------------------------------------------------------------------------------------------------->

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tree Huggers</title>
    <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
    <link rel="stylesheet" href="styles/master.css">
</head>
<body>

<div class="splash-container">
    <div class="splash">
        <h1 class="splash-head">Tree Huggers</h1>
        <p class="splash-subhead">
            For every email we obtain, we will plant a tree 
            where they are needed the most! <br>It's easy tree-zy!
        </p>
        <p>
            <a href="#start" class="pure-button pure-button-primary">Get Started</a>
        </p>
    </div>
</div>

<div class="content-wrapper">
    <div class="content">
        <h2 id="start" class="content-head is-center">Let's Plant a Tree</h2>

        <div class="pure-g">
            <div class="l-box-lrg pure-u-1 pure-u-md-2-5">
                <form class="pure-form pure-form-stacked" action="<?= htmlentities($_SERVER['PHP_SELF']) ?>" method="POST" novalidate>


                        <label for="fname">Your First Name</label>
                        <input id="fname" name="fname" type="text" value="<?=$_POST['fname'] ?? null ?>" placeholder="First Name Here">

                        <label for="lname">Your Last Name</label>
                        <input id="lname" name="lname" type="text" value="<?=$_POST['lname'] ?? null ?>" placeholder="Last Name Here">

                        <label for="email">Your Email*</label>
                        <input id="email" name="email" type="email" value="<?=$_POST['email'] ?? null ?>" placeholder="Email Here">
                        <span class="error <?=!isset($errors['email']) ? 'hidden' : "";?>">Please enter a Valid Email<br></span>
                        
                        <span id="mandatory">* fields are mandatory<br></span>
                        <button id="submit" name="submit" type="submit" class="pure-button">Let's Plant it!</button>

                        
                </form>
            </div>
        </div>

    </div>
</div>

</body>
</html>