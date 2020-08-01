<?php
	$mys=new mysqli("localhost","root","","ng_project");
	$sql="select * from tblservice";
	$q=$mys->query($sql);
	$result=array();
	while($rs=$q->fetch_object()){
		$result[]=$rs;
	}
	echo json_encode($result,true);
?>