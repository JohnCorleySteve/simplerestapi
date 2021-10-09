<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: OPTIONS,GET");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

if (!authenticate($db)) {
    header("HTTP/1.1 401 Unauthorized");
    exit('Unauthorized');
}
if(isset($_GET['record']) && isset($_GET['id']) && $_GET['record']!='' &&  !isset($_GET['page'])){
	$get_data = mysqli_query($db,"SELECT * FROM log");
	$json = array();
	if(mysqli_num_rows($get_data)>0){
		while($row = mysqli_fetch_assoc($get_data)){
			$json[] = $row;
		}
		echo json_encode($json);
	}else{
	echo json_encode(array());
	}
}else{
	if(isset($_GET['id']) && $_GET['id']!='' &&  !isset($_GET['page'])){
		$get_data = mysqli_query($db,"SELECT * FROM currency WHERE id='".$_GET['id']."'");
	}else{
		$get_data = mysqli_query($db,"SELECT * FROM currency");
		$number_of_result = mysqli_num_rows($get_data);
		
		$results_per_page = 5;
		
		 $number_of_page = ceil ($number_of_result / $results_per_page);  
		
	   if (!isset ($_GET['page']) ) {  
            $page = 1;  
        } else {  
            $page = $_GET['page'];  
        } 
        
        $page_first_result = ($page-1) * $results_per_page;  
        
		$get_data = mysqli_query($db,"SELECT * FROM currency LIMIT " . $page_first_result . ',' . $results_per_page."");
        
	}
	$json = array();
	if(mysqli_num_rows($get_data)>0){
		while($row = mysqli_fetch_assoc($get_data)){
			$json[] = array(
				'ID'=>$row['id'],
				'name'=>$row['name'],
				'rate'=>$row['rate']
			);
		}
		$json[]['pagination'] = array(
		    'previous'=> DOMAIN.'/currencies/&page='.($page-1),
		    'next'=> DOMAIN.'/currencies/&page='.($page+1)
		);
		echo json_encode($json);
	}else{
	echo json_encode(array());
	}
}
