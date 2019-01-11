<?php include('include/header.php');?>
<?php
   if(isset($_POST['submit'])){
     $comp_name = $_POST['comp_name'];
     $cmp_address = $_POST['comp_address'];
     $cmp_phone = $_POST['comp_phone'];
     $cmp_email = $_POST['comp_emailId'];
     $cmp_website = $_POST['comp_website'];
     $cmp_supplierName = $_POST['comp_supplierName'];
     $sql_select=mysqli_query($con,"select * from company where name='".$comp_name."'");
      $rowcount=mysqli_num_rows($sql_select);
      if($rowcount>0){
         echo "<script>alert('Company Name exists !!!!');</script>";
         echo "<script> window.location.href = 'dashboard.php';</script>";
      }else{
         $sql=mysqli_query($con,"insert into `company`(`id`, `name`, `cmp_address`, `cmp_phone`, `cmp_email`, `cmp_website`, `cmp_supplierName`) values(NULL,'$comp_name','$cmp_address','$cmp_phone','$cmp_email','$cmp_website','$cmp_supplierName')");
         if($sql){
            echo "<script>alert('Company added successfully !!!!');</script>";
            echo "<script> window.location.href = 'dashboard.php';</script>";
         }
      }
   }
   if(isset($_GET['del'])){
      mysqli_query($con,"delete from company where id = '".$_GET['id']."'");
      echo "<script>alert('data deleted !!!!');</script>";
   }?>
<!-- start: PAGE TITLE -->
<section id="page-title">
   <div class="row">
      <div class="col-sm-8">
         <h1 class="mainTitle">Admin | Add Company</h1>
      </div>
      <ol class="breadcrumb">
         <li>
            <span>Admin</span>
         </li>
         <li class="active">
            <span>Add Company</span>
         </li>
      </ol>
   </div>
</section>
<!-- end: PAGE TITLE -->
<!-- start: BASIC EXAMPLE -->
<div class="container-fluid container-fullw bg-white">
   <div class="row">
      <div class="col-md-12">
         <h5 class="over-title margin-bottom-15">All Company <span class="text-bold">Details</span> / Manage <span class="text-bold">Company</span></h5>
         <table class="table table-hover" id="sample-table-1">
            <thead>
               <tr>
                  <th class="center">#</th>
                  <th>Company Name</th>
                  <th class="hidden-xs">Company Address</th>
                  <th>Company Phone No.</th>
                  <th>Company Email Id</th>
                  <th>Company Website</th>
                  <th>Company Supplier Name</th>
                  <th>Action</th>
               </tr>
            </thead>
            <tbody>
               <?php
                  $sql=mysqli_query($con,"select * from company");
                  $cnt=1;
                  while($row=mysqli_fetch_array($sql)){?>
                     <tr>
                        <td class="center"><?php echo $cnt;?>.</td>
                        <td class="hidden-xs"><?php echo $row['name'];?></td>
                        <td><?php echo $row['cmp_address'];?></td>
                        <td><?php echo $row['cmp_phone'];?>
                        <td><?php echo $row['cmp_email'];?>
                        <td><?php echo $row['cmp_website'];?>
                        <td><?php echo $row['cmp_supplierName'];?>
                        </td>
                        <td >
                           <div class="visible-md visible-lg hidden-sm hidden-xs">
                              <a href="edit-company.php?id=<?php echo $row['id'];?>" class="btn btn-transparent btn-xs" tooltip-placement="top" tooltip="Edit"><i class="fa fa-pencil"></i></a>
                              <a href="add-company.php?id=<?php echo $row['id']?>&del=delete" onClick="return confirm('Are you sure you want to delete?')"class="btn btn-transparent btn-xs tooltips" tooltip-placement="top" tooltip="Remove"><i class="fa fa-times fa fa-white"></i></a>
                           </div>
                           <div class="visible-xs visible-sm hidden-md hidden-lg">
                              <div class="btn-group" dropdown is-open="status.isopen">
                                 <button type="button" class="btn btn-primary btn-o btn-sm dropdown-toggle" dropdown-toggle>
                                 <i class="fa fa-cog"></i>&nbsp;<span class="caret"></span>
                                 </button>
                                 <ul class="dropdown-menu pull-right dropdown-light" role="menu">
                                    <li><a href="#">Edit</a></li>
                                    <li><a href="#">Share</a></li>
                                    <li><a href="#">Remove</a></li>
                                 </ul>
                              </div>
                           </div>
                        </td>
                     </tr>
                     <?php $cnt=$cnt+1;
                  }?>
            </tbody>
         </table>
      </div>
   </div>
   <div class="row">
      <div class="col-md-12">
         <div class="row margin-top-30">
            <div class="col-lg-6 col-md-12">
               <div class="panel panel-white">
                  <div class="panel-heading">
                     <h5 class="panel-title">Add New Company</h5>
                  </div>
                  <div class="panel-body">
                     <p style="color:red;"><?php echo htmlentities($_SESSION['msg']);?>
                        <?php echo htmlentities($_SESSION['msg']="");?>
                     </p>
                     <form role="form" name="dcotorspcl" method="post" >
                        <div class="form-group">
                           <label for="exampleInputEmail1">
                           Company Name
                           </label>
                           <input type="text" name="comp_name" class="form-control"  placeholder="Enter Company Name">
                        </div>
                        <div class="form-group">
                           <label for="exampleInputEmail1">
                           Company Address
                           </label>
                           <input type="text" name="comp_address" class="form-control"  placeholder="Enter Company Address">
                        </div>
                        <div class="form-group">
                           <label for="exampleInputEmail1">
                           Company Phone No.
                           </label>
                           <input type="text" name="comp_phone" class="form-control"  placeholder="Enter Company Phone No.">
                        </div>
                        <div class="form-group">
                           <label for="exampleInputEmail1">
                           Company Email Id
                           </label>
                           <input type="text" name="comp_emailId" class="form-control"  placeholder="Enter Company Email Id">
                        </div>
                        <div class="form-group">
                           <label for="exampleInputEmail1">
                           Company Website
                           </label>
                           <input type="text" name="comp_website" class="form-control"  placeholder="Enter Company Website">
                        </div>
                        <div class="form-group">
                           <label for="exampleInputEmail1">
                           Company Supplier Name
                           </label>
                           <input type="text" name="comp_supplierName" class="form-control"  placeholder="Enter Company Supplier Name">
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
<?php include('include/footer.php');?>