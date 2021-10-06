<?php
define("DIR","C:/xampp/htdocs/phptask");
$db = mysqli_connect("localhost","root","","phptask");
mysqli_query($db,"SET NAMES 'utf8';"); 
mysqli_query($db,"SET CHARACTER SET 'utf8';"); 
mysqli_query($db,"SET SESSION collation_connection = 'utf8_general_ci';"); 

function authenticate() {
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
			if(str_replace('Bearer ','',$authHeader)=='kdjf4u50943f78emjfoidjfg9rkue0'){
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