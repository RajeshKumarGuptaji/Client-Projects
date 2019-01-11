<?php include('include/header.php');?>
<?php 
date_default_timezone_set('Asia/Kolkata');// change according timezone
$currentTime = date( 'd-m-Y h:i:s A', time () );

if(isset($_POST['submit'])){
   $sql=mysqli_query($con,"SELECT password FROM  admin where password='".$_POST['cpass']."' && username='".$_SESSION['login']."'");
   $num=mysqli_fetch_array($sql);
   if($num>0){
      $con=mysqli_query($con,"update admin set password='".$_POST['npass']."', updationDate='$currentTime' where username='".$_SESSION['login']."'");
      $_SESSION['msg1']="Password Changed Successfully !!";
   }else{
      $_SESSION['msg1']="Old Password not match !!";
   }
}?>
<!-- start: PAGE TITLE -->
<section id="page-title">
   <div class="row">
      <div class="col-sm-8">
         <h1 class="mainTitle">Admin | Change Password</h1>
      </div>
      <ol class="breadcrumb">
         <li>
            <span>Admin</span>
         </li>
         <li class="active">
            <span>Change Password</span>
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
                     <h5 class="panel-title">Change Password</h5>
                  </div>
                  <div class="panel-body">
                     <p style="color:red;"><?php echo htmlentities($_SESSION['msg1']);?>
                        <?php echo htmlentities($_SESSION['msg1']="");?>
                     </p>
                     <form role="form" name="chngpwd" method="post" onSubmit="return valid();">
                        <div class="form-group">
                           <label for="exampleInputEmail1">
                           Current Password
                           </label>
                           <input type="password" name="cpass" class="form-control"  placeholder="Enter Current Password">
                        </div>
                        <div class="form-group">
                           <label for="exampleInputPassword1">
                           New Password
                           </label>
                           <input type="password" name="npass" class="form-control"  placeholder="New Password">
                        </div>
                        <div class="form-group">
                           <label for="exampleInputPassword1">
                           Confirm Password
                           </label>
                           <input type="password" name="cfpass" class="form-control"  placeholder="Confirm Password">
                        </div>
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
<!-- end: SELECT BOXES -->
</div>
</div>
</div>
<!-- start: FOOTER -->
<!-- start: FOOTER -->
<?php include('include/footer.php');?>