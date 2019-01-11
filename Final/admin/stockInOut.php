<?php 
	session_start();
	include('include/config.php');
	$qty=$_POST['qty'];
	$id=$_POST['id'];
	$tot_price=$_POST['tot_price'];

  $option = $_POST['opt'];

if($option == "stockIn") {
  if (! empty($_POST["id"])) {
    $sql=mysqli_query($con,"Update `medicine_dtl` set `quantity`='$qty',`tot_price`='$tot_price' where id='$id'"); 
    if($sql){
      echo "Medicine Quantity Added Successfully";
    }else{
      echo "Medicine Quantity Not Added Successfully";
    } 
  }
}
if($option == "stockOut") {
  if($qty >= 0){
    if (! empty($_POST["id"])) {
      $sql=mysqli_query($con,"Update `medicine_dtl` set `quantity`='$qty',`tot_price`='$tot_price' where id='$id'"); 

      $currentTime = date( 'd-m-Y h:i:s A', time () );
      
      $sql_select=mysqli_query($con,"select * from sale_dtl where medicineId='".$id."'");

      $sql_select1=mysqli_query($con,"select * from inner_stock_dtl where medicineId='".$id."'");
      $quantity = 0;
      $quantity1 = 0;
      $msg ="";
      $tot_qtys= "";
      $unit_second=0;
      $tot_qty=0;
      $mediunit;
      $mediqty;
      $totqty;
      $rowcount=mysqli_num_rows($sql_select);
      if($rowcount > 0){
        while($row=mysqli_fetch_array($sql_select)){
          $quantity = htmlentities($row['quantity']);
        }
        $quantity = $quantity*1+1;
        $exe_sql = "Update `sale_dtl` set `quantity`='$quantity' where medicineId='$id'";
        $sql=mysqli_query($con,$exe_sql); 
        if($sql){
          $msg = "Medicine Stock Out Successfully";
        }else{
          $msg = "Medicine Stock Out Not Successfully";
        } 
      }else{
        /*$sql1=mysqli_query($con,"INSERT INTO sale_dtl (`medicineId`, `name`, `quantity`, `unit_first`,`unit_second`,`batch no`,`mfd`,`exp`,`unit_price`,`description`,`cmp`,`sale_date`) 
          SELECT `id`, `name`, '1', `unit_first`,`unit_second`,`batch no`,`mfd`,`exp`,`unit_price`,`description`,`cmp`,'".$currentTime."' from `medicine_dtl` WHERE `id` = '$id'");*/
          $sel_sql = mysqli_query($con,"SELECT * from `medicine_dtl` WHERE `id` = '$id'");
        $id;$name;$type;$quantity;$unit_first;
        $unit_second;$batch_no;$mfd;$exp;$unit_price;$description;
        $cmp;$purchase_date;
        while($row=mysqli_fetch_array($sel_sql))
        {
          $id = $row['id'];
          $name = $row['name'];
          $type = $row['type'];
          $quantity = 1;
          $unit_first = $row['unit_first'];
          $unit_second = $row['unit_second'];
          preg_match_all('!\d+!', $unit_second, $mediqty);
          $tot_qt =$mediqty[0][0];
          $batch_no = $row['batch no'];
          $mfd = $row['mfd'];
          $exp = $row['exp'];
          $unit_price = $row['unit_price'];
          $description = $row['description'];
          $cmp = $row['cmp'];
          $purchase_date = $row['purchase_date'];
          $variant = $row['variant'];
        }

        $sql1=mysqli_query($con,"INSERT INTO `sale_dtl` (`id`,`medicineId`, `name`,`type`, `quantity`, `unit_first`,`unit_second`,`batch no`,`mfd`,`exp`,`unit_price`,`description`,`cmp`,`variant`,`sale_date`) VALUES (NULL, '$id', '$name','$type', '$quantity', '$unit_first','$unit_second','$batch_no','$mfd','$exp','$unit_price','$description','$cmp', '$variant','$purchase_date')");  
        if($sql1){
          $msg = "Medicine Stock Out Successfully";
        }else{
          $msg = "Medicine Stock Out Not Successfully";
        } 
      }
    
      $rowcount1=mysqli_num_rows($sql_select1);
      if($rowcount1 > 0){
        while($row=mysqli_fetch_array($sql_select1)){
          $quantity1 = htmlentities($row['quantity']);
          $unit_second = htmlentities($row['unit_second']);
          preg_match_all('!\d+!', $unit_second, $mediunit);
          $tot_qty = htmlentities($row['tot_qty']);
          preg_match_all('!\d+!', $tot_qty, $mediqty);
        }
        //print_r($mediunit);
        //die();
        $unit_second = $mediunit[0][0];
        $tot_qty = $mediqty[0][0];
        $totqty= $tot_qty + $unit_second;
        $totqty= $totqty;
        $quantity1 = $quantity1*1+1;
        $exe_sql1 = "Update `inner_stock_dtl` set `quantity`='$quantity1',`tot_qty`= '$totqty' where medicineId='$id'";
        $sql1=mysqli_query($con,$exe_sql1); 
        if($sql1){
         $msg = "Medicine Stock Out Successfully";
        }else{
          $msg = "Medicine Stock Out Not Successfully";
        } 
      }else{
        //preg_match_all('!\d+!', $tot_qty, $mediqty);
        $sel_sql = mysqli_query($con,"SELECT * from `medicine_dtl` WHERE `id` = '$id'");
        $id;$name;$type;$quantity;$unit_first;
        $unit_second;$batch_no;$mfd;$exp;$unit_price;$description;
        $cmp;$purchase_date;
        while($row=mysqli_fetch_array($sel_sql))
        {
          $id = $row['id'];
          $name = $row['name'];
          $type = $row['type'];
          $quantity = 1;
          $unit_first = $row['unit_first'];
          $unit_second = $row['unit_second'];
          preg_match_all('!\d+!', $unit_second, $mediqty);
          $tot_qt =$mediqty[0][0];
          $batch_no = $row['batch no'];
          $mfd = $row['mfd'];
          $exp = $row['exp'];
          $unit_price = $row['unit_price'];
          $description = $row['description'];
          $cmp = $row['cmp'];
          $purchase_date = $row['purchase_date'];
           $variant = $row['variant'];

        }

        $ins_query=mysqli_query($con,"INSERT INTO `inner_stock_dtl` (`id`,`medicineId`, `name`,`type`, `quantity`, `unit_first`,`unit_second`,`batch no`,`mfd`,`exp`,`unit_price`,`description`,`cmp`,`variant`,`sale_date`,`tot_qty`) VALUES (NULL, '$id', '$name','$type', '$quantity', '$unit_first','$unit_second','$batch_no','$mfd','$exp','$unit_price','$description','$cmp','$variant','$purchase_date','$tot_qt')");
         
       /* $sql11=mysqli_query($con,"INSERT INTO inner_stock_dtl (`medicineId`, `name`, `quantity`, `unit_first`,`unit_second`,`batch no`,`mfd`,`exp`,`unit_price`,`description`,`cmp`,`sale_date`,`tot_qty`) 
          SELECT *  `id`, `name`, '1', `unit_first`,`unit_second`,`batch no`,`mfd`,`exp`,`unit_price`,`description`,`cmp`,'".$currentTime."',`unit_second` from `medicine_dtl` WHERE `id` = '$id'");*/  
        if($ins_query){
          $msg = "Medicine Stock Out Successfully";
        }else{
          $msg = "Medicine Stock Out Not Successfully";
        } 
      }
      echo $msg;
    }
  }else{
    echo "Empty stock";
  }
  
}?>