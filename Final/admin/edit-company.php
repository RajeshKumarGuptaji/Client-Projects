<?php include('include/header.php');?>
<?php
   $id=intval($_GET['id']);// get value
   date_default_timezone_set('Asia/Kolkata');// change according timezone
   $currentTime = date( 'd-m-Y h:i:s A', time () );
   $comp_name = $_POST['comp_name'];
   $cmp_address = $_POST['comp_address'];
   $cmp_phone = $_POST['comp_phone'];
   $cmp_email = $_POST['comp_emailId'];
   $cmp_website = $_POST['comp_website'];
   $cmp_supplierName = $_POST['comp_supplierName'];
   if(isset($_POST['submit'])){
      $sql=mysqli_query($con,"update `company` set `name`='".$comp_name."', `cmp_address`='".$cmp_address."',`cmp_phone`='".$cmp_phone."',`cmp_email`='".$cmp_email."', `cmp_website`='".$cmp_website."',`cmp_supplierName`='".$cmp_supplierName."' where `id`='$id'");
      $_SESSION['msg']="Company updated successfully !!";
   }?>
<!-- start: PAGE TITLE -->
<section id="page-title">
   <div class="row">
      <div class="col-sm-8">
         <h1 class="mainTitle">Admin | Edit Company</h1>
      </div>
      <ol class="breadcrumb">
         <li>
            <span>Admin</span>
         </li>
         <li class="active">
            <span>Edit Company</span>
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
                     <h5 class="panel-title">Edit Company</h5>
                  </div>
                  <div class="panel-body">
                     <p style="color:red;"><?php echo htmlentities($_SESSION['msg']);?>
                        <?php echo htmlentities($_SESSION['msg']="");?>
                     </p>
                     <form role="form" name="dcotorspcl" method="post" >
                        <div class="form-group">
                           <?php $id=intval($_GET['id']);
                           $sql=mysqli_query($con,"select * from company where id='$id'");
                           while($row=mysqli_fetch_array($sql)){?> 
                              <div class="form-group">
                                 <label for="exampleInputEmail1">
                                 Company Name
                                 </label>
                                 <input type="text" name="comp_name" class="form-control"  placeholder="Enter Company Name" value="<?php echo $row['name'];?>">
                              </div>
                              <div class="form-group">
                                 <label for="exampleInputEmail1">
                                 Company Address
                                 </label>
                                 <input type="text" name="comp_address" class="form-control"  placeholder="Enter Company Address" value="<?php echo $row['cmp_address'];?>">
                              </div>
                              <div class="form-group">
                                 <label for="exampleInputEmail1">
                                 Company Phone No.
                                 </label>
                                 <input type="text" name="comp_phone" class="form-control"  placeholder="Enter Company Phone No." value="<?php echo $row['cmp_phone'];?>">
                              </div>
                              <div class="form-group">
                                 <label for="exampleInputEmail1">
                                 Company Email Id
                                 </label>
                                 <input type="text" name="comp_emailId" class="form-control"  placeholder="Enter Company Email Id" value="<?php echo $row['cmp_email'];?>">
                              </div>
                              <div class="form-group">
                                 <label for="exampleInputEmail1">
                                 Company Website
                                 </label>
                                 <input type="text" name="comp_website" class="form-control"  placeholder="Enter Company Website" value="<?php echo $row['cmp_website'];?>">
                              </div>
                              <div class="form-group">
                                 <label for="exampleInputEmail1">
                                 Company Supplier Name
                                 </label>
                                 <input type="text" name="comp_supplierName" class="form-control"  placeholder="Enter Company Supplier Name" value="<?php echo $row['cmp_supplierName'];?>">
                              </div>
                           <?php } ?>
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