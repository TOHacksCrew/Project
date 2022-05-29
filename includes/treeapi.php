
<?php

function plantTree($email){
    //debug
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    
    
    $apiini = parse_ini_file("/var/pass/trees.ini");
    
    $apikey = $apiini['testapikey'];
    
    
    $url = "https://api.sandbox.digitalhumani.com/tree";
    $data = [
        'treeCount' => 1,
        'enterpriseId' => 'aef88679',
        'projectId' => '93322249',
        'user' => $email
      ];
    $curl = curl_init($url);
    
    //set curl
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_POST, true);
    curl_setopt($curl, CURLOPT_POSTFIELDS,  json_encode($data));
    curl_setopt($curl, CURLOPT_HTTPHEADER, [
      'X-Api-Key: '.$apikey,
      'Content-Type: application/json'
    ]);
    
    //get response
    $response = curl_exec($curl);
    curl_close($curl);
    
    
    //debug
    var_dump($response);
    echo $response . PHP_EOL;
}

?>
