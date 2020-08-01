<?php
	$mys=new mysqli("localhost","root","","ng_project");
	$dt=file_get_contents("php://input");
	$r=json_decode($dt);
	$id=$r->id;
	
	$sql="delete from tblservice where id=$id";
	$q=$mys->query($sql);
?>