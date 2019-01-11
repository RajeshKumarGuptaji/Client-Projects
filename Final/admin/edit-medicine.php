<?php 
include('include/header.php');
$did=intval($_GET['id']);
if(isset($_POST['submit'])){ 
   if(isset($_POST['mediname'])){
      $mediname=$_POST['mediname'];
      $mediquantity=$_POST['mediquantity'];
      $meditype=$_POST['type'];
      $unit_first=$_POST['unit_first'];
      $unit_second=$_POST['unit_second'];
      $medibatchno=$_POST['medibatchno'];
      $medimfd=$_POST['medimfd'];
      $mediexp=$_POST['mediexp'];
      $medi_tot_price = $_POST['mediprice'] * $_POST['mediquantity'];
      $medi_unit_price=$_POST['mediprice'];
      $medicmp=$_POST['medicmp'];
      $medidescription=$_POST['medidescription'];
      $curr_data= date("yy/mm/dd");
      $variant = $_POST['variant'];
////
     $query="SELECT * FROM `medicine_dtl` WHERE `name`='$mediname' AND `type`='$meditype' AND `unit_first`='$unit_first' AND `unit_second`='$unit_second' AND `batch no`='$medibatchno' AND `mfd`='$medimfd' AND `exp`='$mediexp' AND `unit_price`='$medi_unit_price' AND `cmp`='$medicmp' where id='$did'";
      $result  = mysqli_query($con,$query);
      $rowcount = mysqli_num_rows($result);  
      $id;
      $qty;
      $tot_pri;
      $sql=mysqli_query($con,$query);
      while($row=mysqli_fetch_array($sql)){
         $id=$row['id'];
         $qty=$row['quantity'];
         $tot_pri=$row['tot_price'];
      }
      //echo $id;
      if($rowcount >0){
         $qty = $qty+$mediquantity;
         $tot_pri = $tot_pri+$medi_tot_price;
         $sql=mysqli_query($con,"Update `medicine_dtl` set `quantity`='$qty',`tot_price`='$tot_pri' where id='$id'"); 
         
        $sql1= mysqli_query($con,"delete from medicine_dtl where id = '$did'");
         if($sql1){
            echo "<script>alert('Medicine info Updated Successfully');</script>";
         }else{
            echo "<script>alert('Medicine info not Updated');</script>"; 
         }
      }else{
         $sql=mysqli_query($con,"Update `medicine_dtl` set `name`='$mediname',`type`='$meditype',`quantity`='$mediquantity',`unit_first`='$unit_first',`unit_second`='$unit_second',`batch no`='$medibatchno',`mfd`='$medimfd',`exp`='$mediexp',`unit_price`='$medi_unit_price',`tot_price`='$medi_tot_price',`cmp`='$medicmp', `variant`='$variant',`description`='$medidescription' where id='$did'"); 
         //$sql=mysqli_query($con,"Update `medicine_dtl` set `name`='$mediname' where id='$did'");
         if($sql){
         echo "<script>alert('Medicine info saved');</script>";
         echo "<script> window.location.href = 'view-medicine.php';</script>";
         }else{
         echo "<script>alert('Medicine info  not saved');</script>";
         }
      }   
      
   }else{
      echo "<script>alert('Medicine info not saved');</script>"; 
   } 
}?>
<!-- start: PAGE TITLE -->
<section id="page-title">
   <div class="row">
      <div class="col-sm-8">
         <h1 class="mainTitle">Admin | Edit Medicine</h1>
      </div>
      <ol class="breadcrumb">
         <li>
            <span>Admin</span>
         </li>
         <li class="active">
            <span>Edit Medicine</span>
         </li>
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
                     <h5 class="panel-title">Edit Medicine</h5>
                  </div>
                  <div class="panel-body">
                  <?php $sql=mysqli_query($con,"select * from `medicine_dtl` where id='$did'");
                        while($data=mysqli_fetch_array($sql)){?>
                           <form role="form" name="adddoc" method="post" onSubmit="return valid();">
                              <!-- Medicine Name -->
                              <div class="form-group">
                                 <label for="DoctorSpecialization">
                                 Medicine Name
                                 </label>
                                 <input type="text" name="mediname" class="form-control"  placeholder="Enter Medicine Name" required="required" value="<?php echo htmlentities($data['name']);?>">
                              </div>
                              <!-- Description -->
                              <div class="form-group">
                                 <label for="doctorname">
                                 Description
                                 </label>
                                 <textarea name="medidescription" class="form-control"  placeholder="Enter Description" required="required" ><?php echo htmlentities($data['description']);?></textarea>
                              </div>
                              <!-- Quantity -->
                              <div class="form-group">
                                 <label for="address">
                                 Quantity
                                 </label>
                                 <input type="number" name="mediquantity" class="form-control"  placeholder="Enter Quantity" required="required" value="<?php echo htmlentities($data['quantity']);?>">
                              </div>
                              <div class="form-group">
                                 <label for="fess">
                                 Type
                                 </label>
                                 <select name="type" class="form-control" required="required">
                                    <!-- <option value="">Select Unit</option> -->
                                    <?php $ret=mysqli_query($con,"select * from `medicine-type`");
                                    while($row=mysqli_fetch_array($ret))
                                    {?>
                                    <option <?php if($data['type'] == $row['name'])echo "selected";?> value="<?php echo htmlentities($row['name']);?>">
                                    <?php echo htmlentities($row['name']);?>
                                    </option>
                                    <?php } ?>
                                 </select>
                              </div>
                              <div class="form-group">
                                 <label for="fess">
                                 Variant
                                 </label>
                                 <select name="variant" class="form-control" required="required">                      
                                    <option <?php if($data['variant'] == 'loose') echo "selected";?> value="loose">
                                    Loose
                                    </option>
                                    <option <?php if($data['variant'] == 'unloose') echo "selected";?> value="unloose">
                                    Unloose
                                    </option>
                                 </select>
                              </div>
                              <!-- Unit -->
                              <div class="form-group">
                                 <label for="fess">
                                 Unit
                                 </label>
                                 <select name="unit_first" class="form-control" required="required">
                                    <!-- <option value="">Select Unit</option> -->
                                    <?php $ret=mysqli_query($con,"select * from primaryunit");
                                    while($row=mysqli_fetch_array($ret))
                                    {?>
                                    <option <?php if($data['unit_first'] == $row['name'])echo "selected";?> value="<?php echo htmlentities($row['name']);?>">
                                    <?php echo htmlentities($row['name']);?>
                                    </option>
                                    <?php } ?>
                                 </select>
                                 <select name="unit_second" class="form-control" required="required">
                                    <!-- <option value="">Select Unit</option> -->
                                    <?php $ret=mysqli_query($con,"select * from secondaryunit");
                                    while($row=mysqli_fetch_array($ret))
                                    {?>
                                    <option <?php if($data['unit_second'] == $row['name'])echo "selected";?> value="<?php echo htmlentities($row['name']);?>">
                                    <?php echo htmlentities($row['name']);?>
                                    </option>
                                    <?php } ?>
                                 </select>
                              </div>
                              <!-- Batch No -->
                              <div class="form-group">
                                 <label for="fess">
                                 Batch No
                                 </label>
                                 <input type="text" name="medibatchno" class="form-control"  placeholder="Enter Batch No" required="required" value="<?php echo htmlentities($data['batch no']);?>">
                              </div>
                              <!-- Manufacturing Date -->
                              <div class="form-group">
                                 <label for="fess">
                                 Manufacturing Date
                                 </label>
                                 <input type="text" name="medimfd" class="form-control"  placeholder="Enter Manufacturing Date" required="required" id="mfddatepicker" value="<?php echo htmlentities($data['mfd']);?>">
                              </div>
                              <!-- Expiry Date -->
                              <div class="form-group">
                                 <label for="exampleInputPassword1">
                                 Expiry Date
                                 </label>
                                 <input type="text" name="mediexp" class="form-control"  placeholder="Enter the Expiry Date" required="required" id="expdatepicker" value="<?php echo htmlentities($data['exp']);?>">
                              </div>
                              <!-- Price -->
                              <div class="form-group">
                                 <label for="exampleInputPassword2">
                                 Unit Price
                                 </label>
                                 <input step="0.01" data-qty="<?php echo htmlentities($data['quantity']);?>" onChange="price_change(this.value);" id="mediprice" type="text" name="mediprice" class="form-control"  placeholder="Enter the Price" required="required" value="<?php echo htmlentities($data['unit_price']);?>">
                              </div>
                              <!-- Company Name -->
                              <div class="form-group">
                                 <label for="exampleInputPassword2">
                                 Company Name
                                 </label>
                                 <select name="medicmp" class="form-control" required="required">
                                    <option value="">Select Company Name</option>
                                    <?php $ret=mysqli_query($con,"select * from company");
                                    while($row=mysqli_fetch_array($ret))
                                    {?>
                                    <option <?php if($data['cmp'] == $row['name'])echo "selected";?> value="<?php echo htmlentities($row['name']);?>">
                                    <?php echo htmlentities($row['name']);?>
                                    </option>
                                    <?php } ?>
                                 </select>
                              </div>
                              <?php } ?>
                              <button type="submit" name="submit" class="btn btn-o btn-primary">
                              Submit
                              </button>
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
</div>
</div>
</div>
<!-- start: FOOTER -->
<?php include('include/footer.php');?>
<!-- end: FOOTER -->