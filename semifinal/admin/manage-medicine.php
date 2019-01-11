<?php include('include/header.php');?>
<?php if(isset($_GET['del'])){
         mysqli_query($con,"delete from medicine where id = '".$_GET['id']."'");
         $_SESSION['msg']="data deleted !!";
      }?>
<!-- start: PAGE TITLE -->
<section id="page-title">
   <div class="row">
      <div class="col-sm-8">
         <h1 class="mainTitle">Admin | Manage Medicine</h1>
      </div>
      <ol class="breadcrumb">
         <li>
            <span>Admin</span>
         </li>
         <li class="active">
            <span>Manage Medicine</span>
         </li>
      </ol>
   </div>
</section>
<!-- end: PAGE TITLE -->
<!-- start: BASIC EXAMPLE -->
<div class="container-fluid container-fullw bg-white">
   <div class="row">
      <div class="col-md-12">
         <h5 class="over-title margin-bottom-15">Manage <span class="text-bold">Medicine</span></h5>
         <p style="color:red;"><?php echo htmlentities($_SESSION['msg']);?>
            <?php echo htmlentities($_SESSION['msg']="");?>
         </p>
         <table class="table table-hover" id="sample-table-1">
            <thead>
               <tr>
                  <th class="center">#</th>
                  <th>Medicine Name</th>
                  <th>Description</th>
                  <th class="hidden-xs">Quantity</th>
                  <th>Batch No </th>
                  <th>MFD</th>
                  <th>EXP</th>
                  <th>Price</th>
                  <th>Company Name</th>
                  <th>Action</th>

               </tr>
            </thead>
            <tbody>
               <?php
                  $sql=mysqli_query($con,"select * from medicine");
                  $cnt=1;
                  while($row=mysqli_fetch_array($sql))
                  {
                  ?>
               <tr>
                  <td class="center"><?php echo $cnt;?>.</td>
                  <td class="hidden-xs"><?php echo $row['name'];?></td>
                  <td class="hidden-xs"><?php echo $row['description'];?></td>
                  <td class="hidden-xs"><?php echo $row['quantity'];echo "&nbsp"; echo $row['unit'];?></td>
                  <td><?php echo $row['batch no'];?></td>
                  <td><?php echo $row['mfd'];?>
                  <td><?php echo $row['exp'];?>
                  <td><?php echo $row['price'];?>
                  <td><?php echo $row['cmp'];?>
                  </td>
                  <td >
                     <div class="visible-md visible-lg hidden-sm hidden-xs">
                        <a href="edit-medicine.php?id=<?php echo $row['id'];?>" class="btn btn-transparent btn-xs" tooltip-placement="top" tooltip="Edit"><i class="fa fa-pencil"></i></a>
      <a href="manage-medicine.php?id=<?php echo $row['id']?>&del=delete" onClick="return confirm('Are you sure you want to delete?')" class="btn btn-transparent btn-xs tooltips" tooltip-placement="top" tooltip="Remove"><i class="fa fa-times fa fa-white"></i></a>
                     </div>
                     <div class="visible-xs visible-sm hidden-md hidden-lg">
                        <div class="btn-group" dropdown is-open="status.isopen">
                           <button type="button" class="btn btn-primary btn-o btn-sm dropdown-toggle" dropdown-toggle>
                           <i class="fa fa-cog"></i>&nbsp;<span class="caret"></span>
                           </button>
                           <ul class="dropdown-menu pull-right dropdown-light" role="menu">
                              <li>
                                 <a href="#">
                                 Edit
                                 </a>
                              </li>
                              <li>
                                 <a href="#">
                                 Share
                                 </a>
                              </li>
                              <li>
                                 <a href="#">
                                 Remove
                                 </a>
                              </li>
                           </ul>
                        </div>
                     </div>
                  </td>
               </tr>
               <?php 
                  $cnt=$cnt+1;
                                                    }?>
            </tbody>
         </table>
      </div>
   </div>
</div>
<!-- end: BASIC EXAMPLE -->
<!-- end: SELECT BOXES -->
</div>
</div>
</div>
<?php include('include/footer.php');?>