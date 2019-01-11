<?php include('include/header.php');?>
<?php
if(isset($_POST['submit'])){  
   $patname=$_POST['patname'];
   $paytyp=$_POST['paytyp'];
   $curr_data = date("Y/m/d");
   $bal = 0;
   $totAmt = 0;
   $totbal = 0;
   $payAmt = $_POST['payAmt'];
   if($paytyp == 'fullPayment'){
      $payableAmt = $_POST['payAmt'];
      $bal = 0; 
   }else if($paytyp == 'fullBalance'){
      $payableAmt = $_POST['payableAmt'];
      $bal = $_POST['payableAmt'];
   }else if($paytyp == 'partialPayment'){
      $payableAmt = $_POST['payableAmt'];
      $payAmt = $_POST['payAmt']; 
      if($payableAmt > $payAmt){
         $bal = $payableAmt - $payAmt;
      }
      else{
         $bal = $payAmt - $payableAmt;
      }
   }
   $sql=mysqli_query($con,"select * from `party_dtl` where `partyName`= '".$patname."'");
   $rowcount = mysqli_num_rows($sql); 
      if($rowcount > 0){
         while($data=mysqli_fetch_array($sql)){
            $partyamt = htmlentities($data['partyAmount']);
            $partybal = htmlentities($data['balance']);
            $partyId =  htmlentities($data['id']);
         }
         $totAmt = $partyamt + $payableAmt;
         $totbal = $partybal + $bal;
         $sqlupdate=mysqli_query($con,"Update `party_dtl` set `partyAmount`='$totAmt', `balance`='$totbal',`updated_at`='$curr_data', `partyAmountType` ='$paytyp' where `partyName`='$patname'");
         $sql=mysqli_query($con,"INSERT INTO `party_full_dtl`(`id`, `partyName`, partyId , `partyAmount`,`partyAmountType`,`balance`,`addDate`) VALUES (NULL, '".$patname."','".$partyId."','".$payableAmt."','". $paytyp."','".$bal."','".$curr_data."')");
         if($sql){
            echo "<script>alert('Added Successfully');</script>";
         }else{
         echo "<script>alert('Submition failed !!!!');</script>";
         }
      }else{
         echo "<script>alert('No Party Exists !!!!');</script>";
      }
  
         
         
}?>
<!-- start: PAGE TITLE -->
<section id="page-title">
   <div class="row">
      <div class="col-sm-8">
         <h1 class="mainTitle">Admin | Make Payment</h1>
      </div>
      <ol class="breadcrumb">
         <li><span>Admin</span></li>
         <li class="active"><span>Make Payment</span></li>
      </ol>
   </div>
</section>
<!-- end: PAGE TITLE -->
<!-- start: BASIC EXAMPLE -->
<div class="container-fluid container-fullw bg-white">
   <div class="row">
      <div class="col-md-12">
         <div class="row margin-top-30">
            <div class="col-lg-8 col-md-12">
               <div class="panel panel-white">
                  <div class="panel-heading">
                     <h5 class="panel-title">Make Payment</h5>
                  </div>
                  <div class="panel-body">
                     <form role="form" name="adddoc" method="post" onSubmit="return valid();">
                        <label>Select Party</label> 
                        <?php $sql=mysqli_query($con,"select * from `party_dtl`");?>
                        <select name="patname">
                           <?php while($data=mysqli_fetch_array($sql)){?>  
                              <option value="<?php echo htmlentities($data['partyName']);?>"><?php echo htmlentities($data['partyName']);?></option>
                           <?php }?>
                        </select> 
                        <div class="form-group">
                           <label for="fess">Payment Type </label>
                           <select name="paytyp" id="paytyp" onchange="paymentTypeValidate();" required="">
                           <option value="select payment type">Select Payment Type</option>
                           <option value="fullPayment">Full payment</option>
                           <option value="partialPayment">Partial Payment</option>
                           <option value="fullBalance">Full Balance</option>
                           </select>
                        </div>
                        <div class="form-group payAmt">
                           <label for="fess">Pay Amount </label>
                           <input name="payAmt" class="form-control"  placeholder="Enter Total Amount" type="number" step="any" pattern="^\d*(\.\d{0,2})?$" />
                        </div>
                        <div class="form-group payable">
                           <label for="fess">Payable Amount </label>
                           <input name="payableAmt" class="form-control"  placeholder="Enter Total Amount" type="number" step="any" pattern="^\d*(\.\d{0,2})?$" />
                        </div>
                        <button type="submit" name="submit" class="btn btn-o btn-primary">Submit</button>
                     </form>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <div class="col-lg-12 col-md-12">
         <div class="panel panel-white">
         </div>
      </div>
   </div>
</div>
<!-- end: BASIC EXAMPLE -->
<!-- end: SELECT BOXES -->
</div>
</div>
</div>
<!-- start: FOOTER -->
<?php include('include/footer.php');?>