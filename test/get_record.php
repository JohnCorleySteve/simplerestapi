<?php

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "http://localhost/phptask/currencies");
curl_setopt( $ch, CURLOPT_HTTPHEADER, [
	"http-authorization: Bearer kdjf4u50943f78emjfoidjfg9rkue0"
]);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($ch);
echo($response);