<?php

$conn = mysqli_connect('localhost','root','');
$dbconn = mysqli_select_db($conn,'food');
echo $id = $_POST['id']; 

	$sql = "UPDATE cart_orders set status='2' where id='$id'";
	$result = mysqli_query($conn,$sql); 
	
?>