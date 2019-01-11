<?php include('include/header.php');?>
<?php
   $id=intval($_GET['id']);// get value
   date_default_timezone_set('Asia/Kolkata');// change according timezone
   $currentTime = date( 'Y-m-d', time () );
   if(isset($_POST['submit'])){
      $sql=mysqli_query($con,"update setting set name='".$_POST['clinic_address']."',second_name='".$_POST['home_address']."',phone='".$_POST['phone']."', updationDate='$currentTime' where type='address'");
      $_SESSION['msg']="Address updated successfully !!";
   }?>
<!-- start: PAGE TITLE -->
<section id="page-title">
   <div class="row">
      <div class="col-sm-8">
         <h1 class="mainTitle">Admin | Edit Address</h1>
      </div>
      <ol class="breadcrumb">
         <li>
            <span>Admin</span>
         </li>
         <li class="active">
            <span>Edit Address</span>
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
            <div class="col-lg-6 col-md-12">
               <div class="panel panel-white">
                  <div class="panel-heading">
                     <h5 class="panel-title">Edit Address</h5>
                  </div>
                  <div class="panel-body">
                     <p style="color:red;"><?php echo htmlentities($_SESSION['msg']);?>
                        <?php echo htmlentities($_SESSION['msg']="");?>
                     </p>
                     <form role="form" name="dcotorspcl" method="post" >
                        <div class="form-group">
                           <label for="exampleInputEmail1">
                           Clinic Address
                           </label>
                           <?php $second_address= "";
                              $id=intval($_GET['id']);
                                 $sql=mysqli_query($con,"select * from setting where type='address'");
                              while($row=mysqli_fetch_array($sql)){?>    
                                 <textarea required name="clinic_address" class="form-control"><?php echo $row['name'];?>
                                 </textarea>
                                 <?php $second_address= $row['second_name'];
                                 $phone = $row['phone'];?>
                                
                           <?php } ?>
                           <label>Home Address</label>
                           <textarea required name="home_address" class="form-control"><?php echo $second_address;?>
                           </textarea>
                           <label>Mobile NO.</label>
                           <input type="text" name="phone" class="form-control" value="<?php echo $phone;?>" pattern="[0-9]{10}" required>
                        </div>
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