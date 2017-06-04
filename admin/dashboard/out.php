<?php
session_start();
$admin = $_SESSION['admin'];
include "d.php"; 
session_destroy();
unset($admin);
header('location:index');
	 

?>