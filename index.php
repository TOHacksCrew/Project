<?php

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hackathon</title>
    <link rel="stylesheet" href="stlyes/master.css">
    <link rel="stylesheet" href="https://unpkg.com/purecss@2.1.0/build/pure-min.css" integrity="sha384-yHIFVG6ClnONEA5yB5DJXfW2/KC173DIQrYoZMEtBvGzmf0PKiGyNEqe9N6BNDBH" crossorigin="anonymous">
</head>
<body>
    <header>
        <h1>
            Title of Project
        </h1>
    </header>
    <main>
        <form action="/action_page.php">
       
     
        <label for="firstname">Enter your first name:</label>
        <input type="firstname" id="firstname" name="firstname">
            <br>
            <label for="lastname">Enter your last name:</label>
        <input type="lastname" id="lastname" name="lastname">
            <br>
            <label for="email">Enter your email:</label>
        <input type="email" id="email" name="email">
        <br>
        <input type="submit">
            

        </form>
        <div class="pure-g">
            <div class="pure-u-1-2">
                <span>Description</span>
            </div>
        </div>
        <div class="pure-g">
            <div class="pure-u-1-2">
                <span>Filter</span>
            </div>
        </div>
        <div class="pure-g">
            <div class="pure-u-1-2">
                <span>Map</span>
            </div>
        </div>
    </main>
    <footer>
        <span>TOHacks 2022</span>
    </footer>
</body>
</html>