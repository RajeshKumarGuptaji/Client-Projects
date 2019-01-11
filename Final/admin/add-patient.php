<?php include('include/header.php');?>
<?php
if(isset($_POST['submit'])){  
   $patname=$_POST['patname'];
   $pataddress=$_POST['pataddress'];
   $patcontact=$_POST['patcontact'];
   $patemail=$_POST['patemail'];
   $patgender=$_POST['patgender'];
   if(!empty($patname)){
      $query="SELECT * FROM `patient` WHERE `fullName`='$patname' AND `address`='$pataddress' AND `gender`='$patgender'";
      $result  = mysqli_query($con,$query);
      $rowcount = mysqli_num_rows($result); 
      if($rowcount >0){
         echo "<script>alert('Patient info already Exists');</script>";
         echo "<script> window.location.href = 'manage-patient.php';</script>";
      }else{
         $sql=mysqli_query($con,"INSERT INTO `patient` (`id`, `fullName`, `address`, `gender`, `email`, `phoneNo`) VALUES (NULL, '$patname','$pataddress','$patgender','$patemail','$patcontact')");
         if($sql){
            echo "<script>alert('Patient info added Successfully');</script>";
            echo "<script> window.location.href = 'manage-patient.php';</script>";
         }
      }
   }else{
      echo "<script>alert('All fields are required !!!!');</script>";
      echo "<script> window.location.href = 'add-patient.php';</script>";
   }
}?>
<!-- start: PAGE TITLE -->
<section id="page-title">
   <div class="row">
      <div class="col-sm-8">
         <h1 class="mainTitle">Admin | Add Patient</h1>
      </div>
      <ol class="breadcrumb">
         <li><span>Admin</span></li>
         <li class="active"><span>Add Patient</span></li>
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
                     <h5 class="panel-title">Add Patient</h5>
                  </div>
                  <div class="panel-body">
                     <form role="form" name="adddoc" method="post" onSubmit="return valid();">
                        <div class="form-group">
                           <label for="doctorname">Patient Name</label>
                           <input type="text" name="patname" class="form-control"  placeholder="Enter Patient Name" required>
                        </div>
                        <div class="form-group">
                           <label for="address">Patient Address</label>
                           <textarea name="pataddress" class="form-control"  placeholder="Enter Patient Address" required></textarea>
                        </div>
                        <div class="form-group">
                           <label for="fess">Patient Contact no(9129065105)</label>
                           <input type="text" name="patcontact" class="form-control"  placeholder="Enter Patient Contact no" pattern="[0-9]{10}" required>
                        </div>
                        <div class="form-group">
                           <label for="fess">Patient Email</label>
                           <input type="email" name="patemail" class="form-control"  placeholder="Enter Patient Email id" required>
                        </div>
                         <div class="form-group">
                           <label for="fess">Patient Gender</label>
                           <select name="patgender">
                              <option value="">Select Gender</option>
                              <option value="male">Male</option>
                              <option value="female">Female</option>
                           </select>
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