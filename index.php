<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: OPTIONS,GET");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

require_once 'config.php';

if (!authenticate()) {
    header("HTTP/1.1 401 Unauthorized");
    exit('Unauthorized');
}

if(isset($_GET['id'])){
$action = explode('/',$_GET['id']);
}else{
$action = array('index.php');
}


$portal = '';
$cms = $action[0];

if(!isset($cms)){ 
	if(file_exists(DIR.'/'.$portal.'/index.php')){
		include $portal.'/index.php';
	}else{
		echo 'error';
	}
}else{
	
	$uriSegments = explode("/", parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));
	$uriSegments = array_filter($uriSegments);
	unset($uriSegments[1]);
	$uriSegments  = $uriSegments;
	
	@$_GET['id'] = $uriSegments[3];
	@$_GET['record'] = $uriSegments[4];
	if(isset($uriSegments[2])){
		$cms = $uriSegments[2];
	}else{
		echo json_encode(array("error"=>"Route scope not found","error_type"=>"Invalid Route"));die;
	}
	if(file_exists(DIR.'/'.$portal.$cms.'.php')){		
		include DIR.'/'.$portal.$cms.'.php';
	}else{
		echo 'error';
	}
}
