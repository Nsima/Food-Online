<?php
$conn = mysqli_connect('localhost','root','');
$dbconn = mysqli_select_db($conn,'food');

$email = $_POST['email'];  
$msg = $_POST['msg']; 

$sql = "INSERT INTO messages values('',CURRENT_TIMESTAMP,'$email','$msg','0')";
$result = mysqli_query($conn,$sql);
if($result){

	if(mail($email,"Your Restaurant",$msg)){
		echo "Message sent in Email";
	} else {
		echo "Error !";
	}

} else {
	echo "Error !";
}


?>