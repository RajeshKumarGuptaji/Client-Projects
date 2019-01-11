<?php include('include/header.php');?>
<?php
   $did=intval($_GET['id']);// get doctor id
   if(isset($_POST['submit'])){
   	$patname=$_POST['patname'];
      $pataddress=$_POST['pataddress'];
      $patcontact=$_POST['patcontact'];
      $patemail=$_POST['patemail'];
      $patgender=$_POST['patgender'];
      $curr_data = date("Y/m/d");
      $sql=mysqli_query($con,"Update patient set fullName='$patname',address='$pataddress',gender='$patgender',email='$patemail',updationDate='$curr_data',phoneNo='$patcontact' where id='$did'");
      if($sql){
         //$msg="Patient Details updated Successfully";
         echo "<script>alert('Patient Details updated Successfully');</script>";
         echo "<script> window.location.href = 'manage-patient.php';</script>";
      }
   }?>
<!-- start: PAGE TITLE -->
<section id="page-title">
   <div class="row">
      <div class="col-sm-8">
         <h1 class="mainTitle">Admin | Edit Patient Details</h1>
      </div>
      <ol class="breadcrumb">
         <li><span>Admin</span></li>
         <li class="active"><span>Edit Patient Details</span></li>
      </ol>
   </div>
</section>
<!-- end: PAGE TITLE -->
<!-- start: BASIC EXAMPLE -->
<div class="container-fluid container-fullw bg-white">
   <div class="row">
      <div class="col-md-12">
         <h5 style="color: green; font-size:18px; ">
            <?php if($msg) { echo htmlentities($msg);}?> 
         </h5>
         <div class="row margin-top-30">
            <div class="col-lg-8 col-md-12">
               <div class="panel panel-white">
                  <div class="panel-heading">
                     <h5 class="panel-title">Edit Patient info</h5>
                  </div>
                  <div class="panel-body">
                     <?php $sql=mysqli_query($con,"select * from patient where id='$did'");
                        while($data=mysqli_fetch_array($sql)){?>
                           <form role="form" name="adddoc" method="post" onSubmit="return valid();">
                              <div class="form-group">
                                 <label for="doctorname">
                                 Patient Name
                                 </label>
                                 <input type="text" name="patname" class="form-control"  placeholder="Enter Patient Name" value="<?php echo htmlentities($data['fullName']);?>">
                              </div>
                              <div class="form-group">
                                 <label for="address">
                                 Patient Address
                                 </label>
                                 <textarea name="pataddress" class="form-control"  placeholder="Enter Patient Address"><?php echo htmlentities($data['address']);?></textarea>
                              </div>
                             
                              <div class="form-group">
                                 <label for="fess">
                                 Patient Contact No
                                 </label>
                                 <input type="text" name="patcontact" class="form-control"  placeholder="Enter Patient Contact no" value="<?php echo htmlentities($data['phoneNo']);?>">
                              </div>
                              <div class="form-group">
                                 <label for="fess">
                                 Patient Email
                                 </label>
                                 <input type="email" name="patemail" class="form-control"  placeholder="Enter Patient Email id" value="<?php echo htmlentities($data['email']);?>">
                              </div>
                               <div class="form-group">
                                 <label for="fess">
                                 Patient Gender
                                 </label>
                                 <select name="patgender">
                                    <option value="">Select Gender</option>
                                    <option <?php if($data['gender'] == "male")echo "selected";?> value="male">Male</option>
                                    <option <?php if($data['gender'] == "female")echo "selected";?> value="female">Female</option>
                                 </select>
                              </div>
                              <?php } ?>
                              <button type="submit" name="submit" class="btn btn-o btn-primary">
                              Update
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
<!-- end: SELECT BOXES -->
</div>
</div>
</div>
<?php include('include/footer.php');?>