<?php
	$mys=new mysqli("localhost","root","","ng_project");
	$dt=file_get_contents("php://input");
	$r=json_decode($dt);
	
	$name=$r->name;
	$contact=$r->contact;
	$email=$r->email;
	$service=$r->service;
	
	$sql="insert into tblservice set name='$name', contact='$contact', email='$email',service='$service', created_at=now()";
	$q=$mys->query($sql);
	
	echo $mys->insert_id;
?>