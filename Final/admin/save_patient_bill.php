<?php
	// start session 
	session_start();
	include('include/config.php');
?>
<?php
	$patient_id=$_POST['patient_id'];
	$bill_no=$_POST['bill_no'];
	$bill_date=$_POST['bill_date'];
	$total_price=$_POST['total_price'];	

	$sql=mysqli_query($con,"INSERT INTO `patientbilldtl` (`id`, `patient_id`, `bill_no`, `bill_date`, `total_price`) VALUES (NULL, '$patient_id', '$bill_no', '$bill_date', '$total_price')");
	//$cart_item = array();
	$arrayName = array();
	$_SESSION['cart']=$arrayName;
	//session_unset("cart");
	//session_destroy();
	if($sql){
		echo "Save Succesfully";
	}else{
		echo "Save NOT Succesfully";
	}
