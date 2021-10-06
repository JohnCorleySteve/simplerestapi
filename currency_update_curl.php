<?php
require_once"config.php";
$url = "http://www.cbr.ru/scripts/XML_daily.asp";
$xmlfile = file_get_contents($url);
$ob = simplexml_load_string($xmlfile);
$json = json_encode($ob);
$configData = json_decode($json, true);
$configData['Valute'];

//update_currencies
if(isset($configData['Valute']) && !empty($configData['Valute'])){
	mysqli_query($db,"TRUNCATE `currency`");
	$sql = "INSERT INTO `currency` (`name`,`rate`) VALUES ";
	$count = 0;
	foreach($configData['Valute'] as $value){
		$count++;		
		if($count>1){
			$sql .= ',';
		}
		$sql .= "('".$value['Name']."','".$value['Value']."')";		
	}
	//echo $sql;die;
	echo mysqli_query($db,"INSERT INTO `log` SET log_info='Currency Updated'");
	echo mysqli_query($db,$sql);
}else{
echo array();
}
