<?php
	$mys=new mysqli("localhost","root","","ng_project");
	$dt=file_get_contents("php://input");
	$r=json_decode($dt);

	$email_subject=$r->email_subject;
	$email_body=$r->email_body;
	$email=$r->email;
	$id=$r->id;
	
	$sql="update tblservice set email_subject='$email_subject', email_body='$email_body',status=1, updated_at=now() where id=$id";
	$q=$mys->query($sql);
	echo "Email Sent to $email";
	//mail($email,$email_subject,$email_body);
?>