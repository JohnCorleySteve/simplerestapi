<?php
if(isset($_GET['record']) && isset($_GET['id'])){
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
	if(isset($_GET['id'])){
		$get_data = mysqli_query($db,"SELECT * FROM currency WHERE id='".$_GET['id']."'");
	}else{
		$get_data = mysqli_query($db,"SELECT * FROM currency");
		
		if(isset($_GET['page'])){
			$start = $_GET['page']*5;
			$end = $_GET['page']*5;
		}else{
			$start = 0;
			$end = 5;
		}
		$get_data = mysqli_query($db,"SELECT * FROM currency");
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
		echo json_encode($json);
	}else{
	echo json_encode(array());
	}
}
