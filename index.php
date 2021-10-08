<?php


require_once 'config.php';


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
	
	@$_GET['id'] = $uriSegments[4];
	@$_GET['record'] = $uriSegments[5];
	if(isset($uriSegments[3])){
		$cms = $uriSegments[3];
	}else{
		$cms = 'home';
	}
	if(file_exists(DIR.'/'.$portal.$cms.'.php')){		
		include DIR.'/'.$portal.$cms.'.php';
	}else{
		echo 'error';
	}
}
