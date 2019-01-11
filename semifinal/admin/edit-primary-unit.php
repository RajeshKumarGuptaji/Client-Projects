<?php include('include/header.php');?>
<?php
   $id=intval($_GET['id']);// get value
   date_default_timezone_set('Asia/Kolkata');// change according timezone
   $currentTime = date( 'd-m-Y h:i:s A', time () );
   if(isset($_POST['submit']))
   {
      $sql=mysqli_query($con,"update primaryunit set name='".$_POST['unit_name']."', updationDate='".$currentTime."' where id='$id'");
      if($sql)
      {
      echo "<script>var url='add-primary-unit.php';
      window.location.href = url;
      </script>";
      }
   }
   
   ?>
<!-- start: PAGE TITLE -->
<section id="page-title">
   <div class="row">
      <div class="col-sm-8">
         <h1 class="mainTitle">Admin | Edit Primary Unit</h1>
      </div>
      <ol class="breadcrumb">
         <li>
            <span>Admin</span>
         </li>
         <li class="active">
            <span>Edit Primary Unit</span>
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
                     <h5 class="panel-title">Edit Primary Unit</h5>
                  </div>
                  <div class="panel-body">
                     <p style="color:red;"><?php echo htmlentities($_SESSION['msg']);?>
                        <?php echo htmlentities($_SESSION['msg']="");?>
                     </p>
                     <form role="form" name="dcotorspcl" method="post" >
                        <div class="form-group">
                           <label for="exampleInputEmail1">
                           Unit
                           </label>
                           <?php 
                              $id=intval($_GET['id']);
                                 $sql=mysqli_query($con,"select * from primaryunit where id='$id'");
                              while($row=mysqli_fetch_array($sql))
                              {                                         
                                 ?>    <input type="text" name="unit_name" class="form-control" value="<?php echo $row['name'];?>" >
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