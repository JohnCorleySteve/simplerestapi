<?php

if(!isset ($_GET['page']) ) {  
    $page = 1;  
} else {  
    $page = $_GET['page'];  
} 

$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, "http://amit.byethost12.com/clients/simplerestapi/currencies/&page=".$page);
curl_setopt( $ch, CURLOPT_HTTPHEADER, [
	"http-authorization: Bearer 6565393035326565323132646265333665313030336234616266346339333333"
]);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($ch);
echo($response);
