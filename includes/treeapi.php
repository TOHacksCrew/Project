
<?php

/*
$url = "https://api.sandbox.digitalhumani.com/";

$curl = curl_init();
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

$headers = array(
   "Accept: application/json",
   "Content-Type: application/json",
   "X-Api-Key: n6oy0P9w6DuNNDT1c6d1q7crhw2dyoP6CtNHGCFUZdiIK3O3"
);
curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);

$data = <<<DATA
{
    "treeCount": 1,
    "enterpriseId": "aef88679",
    "projectId": "82828283",
    "user": "test_user_1"
  }
DATA;

curl_setopt($curl, CURLOPT_POSTFIELDS, $data);

$resp = curl_exec($curl);
curl_close($curl);

echo "api response: ";
echo $resp;
*/

$url = "https://api.sandbox.digitalhumani.com/";

$data = array('treeCount' => '1', 'enterpriseId' => 'aef88679', 'projectId' => '82828283', 'user' => 'test_user_1');

$options = array(
  'http' => array(
    'header'  => array(
        "Accept: application/json",
        "Content-Type: application/json",
        "X-Api-Key: n6oy0P9w6DuNNDT1c6d1q7crhw2dyoP6CtNHGCFUZdiIK3O3"
    ),
    'method'  => 'POST',
    'content' => http_build_query($data)
  )
);
$context  = stream_context_create($options);
$resp = file_get_contents($url, false, $context);
var_dump($resp);



?>
