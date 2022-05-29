
<?php

function plantTree($email){
    
    
    $apiini = parse_ini_file("/var/pass/trees.ini");
    
    $apikey = $apiini['apikey'];
    
    
    $url = "https://api.digitalhumani.com/tree";
    $data = [
        'treeCount' => 1,
        'enterpriseId' => 'aef88679',
        'projectId' => '06032322',
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
    
}

?>
