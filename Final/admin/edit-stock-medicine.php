<?php 
include('include/header.php');
$did=intval($_GET['id']);
if(isset($_POST['submit'])){ 
   if(isset($_POST['mediname'])){
      $mediname=$_POST['mediname'];
      $mediquantity=$_POST['mediquantity'];
      $unit_first=$_POST['unit_first'];
      $unit_second=$_POST['unit_second'];
      $medibatchno=$_POST['medibatchno'];
      $medimfd=$_POST['medimfd'];
      $mediexp=$_POST['mediexp'];
      ///
      $medi_tot_price = $_POST['mediprice'] * $_POST['mediquantity'];
      $medi_unit_price=$_POST['mediprice'];
      //
      /*$medi_tot_price=$_POST['mediprice'];
      $medi_unit_price=$_POST['mediprice']/$_POST['mediquantity'];*/
      $medicmp=$_POST['medicmp'];
      $medidescription=$_POST['medidescription'];
      $curr_data= date("yy/mm/dd");
      //die();
      $sql=mysqli_query($con,"Update `medicine_dtl` set `name`='$mediname',`quantity`='$mediquantity',`unit_first`='$unit_first',`unit_second`='$unit_second',`batch no`='$medibatchno',`mfd`='$medimfd',`exp`='$mediexp',`unit_price`='$medi_unit_price',`tot_price`='$medi_tot_price',`cmp`='$medicmp',`description`='$medidescription' where id='$did'"); 
      //$sql=mysqli_query($con,"Update `medicine_dtl` set `name`='$mediname' where id='$did'");
      if($sql){
      echo "<script>alert('Medicine info saved');</script>";
      echo "<script> window.location.href = 'view-stock-medicine.php';</script>";
      }else{
      echo "<script>alert('Medicine info  not saved');</script>";
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
                        while($data=mysqli_fetch_array($sql))
                        {
                        ?>
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
                           <input type="text" name="mediquantity" class="form-control"  placeholder="Enter Quantity" required="required" value="<?php echo htmlentities($data['quantity']);?>">
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
                           Price
                           </label>
                           <input data-qty="<?php echo htmlentities($data['quantity']);?>" onChange="price_change(this.value);" id="mediprice" type="text" name="mediprice" class="form-control"  placeholder="Enter the Price" required="required" value="<?php echo htmlentities($data['unit_price']);?>">
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