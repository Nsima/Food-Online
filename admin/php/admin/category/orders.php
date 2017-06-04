<?php

include 'dbconn.php';

function delivery(){
	//To return the status of the order for the user
}

	$sql = "SELECT * FROM cart_orders ORDER BY id DESC";
	$result = mysqli_query($conn,$sql);

	while($row = mysqli_fetch_array($result)){
		$order_no = $row['order_id'];
		$customer = $row['cust_email'];
		$status = $row['status'];

		$sql4 = "SELECT * FROM users WHERE email = '$customer' ";
		$result4 = mysqli_query($conn, $sql4);
		$row4 = mysqli_fetch_array($result4, MYSQLI_ASSOC);

		$name = $row4['name'];
		$cont = $row4['contact'];
		$addr = $row4['address'];

		
		$sql2 = "SELECT * FROM cart WHERE order_id = '$order_no' ORDER BY id DESC";
		$result2 = mysqli_query($conn,$sql2);

		while ($row2 = mysqli_fetch_array($result2)) {
			$prod = $row2['prod_id'];
			$qty = $row2['qty'];

			$sql3 = "SELECT * FROM products WHERE id = '$prod' ";
			$result3 = mysqli_query($conn,$sql3);
			$row3 = mysqli_fetch_array($result3, MYSQLI_ASSOC);

			$prod = $row3['name'];
			$cate = $row3['category'];
			$desc = $row3['description'];
			$cost = $row3['price'];
			$imag = $row3['image'];
		}
		//Echo out the Customer and order number before getting the details of the order;
		//Also echo out the action for the order
		if ($status==1) {
			echo "
			<form action='index' method='post'>
			<button class='btn btn-warning'>Proccess</button>
			</form>"."<p>";
		}elseif($status==2){
			echo "
			<form action='index' method='post'>
			<button class='btn btn-info' disabled>Delivering</button>
			</form>"."<p>";
		}elseif ($status==3) {
			echo "
			<form action='index' method='post'>
			<button class='btn btn-info' disabled>Delivered</button>
			</form>"."<p>";
		}else{
			echo "<button class='btn btn-info' disabled>Order Cancelled</button>";
		}
	}

?>