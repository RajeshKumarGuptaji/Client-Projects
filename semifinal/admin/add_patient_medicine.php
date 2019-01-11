<?php
	session_start();
	include('include/config.php');
	$patient_id=$_POST['patient_id'];
	$mediName=$_POST['mediName'];
	$mediqut=$_POST['mediqut'];
	$mediunit=$_POST['mediunit'];
	$mediprice=$_POST['mediprice'];
	$mediid=$_POST['mediid'];
	$meditype=$_POST['medi_type'];
	$medivariant=$_POST['medi_variant'];
	$medibatchno=$_POST['medi_batchno'];
	$mediexp=$_POST['medi_exp'];
	preg_match_all('!\d+!', $mediunit, $matches);
	$quan = $matches[0][1];
	if($medivariant == 'loose'){
		$z = $mediprice/$quan;
		$tot_price= $z*$mediqut;
	}else{
		$tot_price= $mediprice*$mediqut;
	}
	$cart_item=array(
	    'mediName'=>$mediName,
	    'mediqut'=>$mediqut,
	    'mediunit'=>$mediunit,
	    'mediprice'=>$mediprice,
	    'meditype'=>$meditype,
	    'medivariants'=>$medivariant,
	    'medibatchno'=>$medibatchno,
	    'mediexp'=>$mediexp
		);
 	$_SESSION['cart'][]=$cart_item;
	$sql_query=mysqli_query($con,"select max(id) from patientbilldtl");
    $id = mysqli_fetch_array($sql_query);
	$last_id = $id[0];
	$last_id = $last_id+1;
	$curr_data= date("Y/m/d");
	$sql=mysqli_query($con,"INSERT INTO `patientmedicinedtl` (`id`, `patient_id`, `medicineId`, `medicineName`, `quantity`, `unitPrice`, `tot_price`, `bill_no`, `date`) VALUES (NULL, '$patient_id', '$mediid', '$mediName', '$mediqut', '$mediprice', '$tot_price', '$last_id', '$curr_data')");
	$sql_select=mysqli_query($con,"select * from inner_stock_dtl where medicineId='".$mediid."'");
	$rowcount=mysqli_num_rows($sql_select);
      if($rowcount > 0){
        while($row=mysqli_fetch_array($sql_select)){
          $quantity = htmlentities($row['tot_qty']);
          $unit_second = htmlentities($row['unit_second']);
        }
        preg_match_all('!\d+!', $unit_second, $mediqty);
        $unit_seconds= $mediqty[0][0];
		if($medivariant == 'loose'){
			$totqty = $quantity - $mediqut;
		}else{
			$mul = $quan*$mediqut;
			$totqty = $quantity - $mul;
		}
        if($totqty == 0 ){
        	mysqli_query($con,"delete from `inner_stock_dtl` where medicineId='$mediid'");
        }else{
        	$exe_sql1 = "Update `inner_stock_dtl` set `tot_qty`= '$totqty' where medicineId='$mediid'";
	        $sql1=mysqli_query($con,$exe_sql1); 
		    if($sql1){
		     $msg = "Medicine Update Successfully";
		    }else{
		      $msg = "Medicine  Not Update Successfully";
		    }
        }	    
    }
	if($sql){
		$msg = "Medicine Added Successfully";
	}else{
		$msg = "Medicine Not Added Successfully";
	}
	echo $msg;

