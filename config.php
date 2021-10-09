<?php
define("DIR","/home/anjaliby/public_html/clients/simplerestapi");
define("DOMAIN","https://amit.byethost12.com/clients/simplerestapi");
$db = mysqli_connect("localhost","anjaliby_simplerestapi","simplerestapi","anjaliby_simplerestapi");
mysqli_query($db,"SET NAMES 'utf8';"); 
mysqli_query($db,"SET CHARACTER SET 'utf8';"); 
mysqli_query($db,"SET SESSION collation_connection = 'utf8_general_ci';"); 

function authenticate($db) {
     try {
        switch(true) {
            case array_key_exists('HTTP_HTTP_AUTHORIZATION', $_SERVER) :
                $authHeader = $_SERVER['HTTP_HTTP_AUTHORIZATION'];
                break;
            case array_key_exists('Authorization', $_SERVER) :
                $authHeader = $_SERVER['Authorization'];
                break;
            default :
                $authHeader = null;
                break;
        }
       	if(isset(explode('Bearer',$authHeader)[1])){
       	    
       	    $get_token = mysqli_query($db,"SELECT * FROM users WHERE token='".str_replace('Bearer ','',$authHeader)."'");
       	    
			if(mysqli_num_rows($get_token)>0){
				return str_replace('Bearer ','',$authHeader);
			}else{
				throw new \Exception('No Bearer Token');
			}
		}		
        if(!isset(explode('Bearer',$authHeader)[1])) {
            throw new \Exception('No Bearer Token');
        }
    } catch (\Exception $e) {
        return false;
    }
}
