<?php include('include/header.php');?>
<?php
   if(isset($_POST['submit'])){
      $sql_select=mysqli_query($con,"select * from secondaryunit where name='".$_POST['unit_name']."'");
      $rowcount=mysqli_num_rows($sql_select);
      if($rowcount>0){
         echo "<script>alert('Secondar Unit Name exists !!!!');</script>";
         echo "<script> window.location.href = 'add-secondary-unit.php';</script>";
      }else{
         $currentTime = date( 'd-m-Y h:i:s A', time () );
         $sql=mysqli_query($con,"insert into secondaryunit(name,creationDate) values('".$_POST['unit_name']."','".$currentTime."')");
         echo "<script>alert('Secondar Unit Name Added successfully !!!!');</script>";
      }
   }
   if(isset($_GET['del'])){
    mysqli_query($con,"delete from secondaryunit where id = '".$_GET['id']."'");
    echo "<script>alert('data deleted  !!!!');</script>";
   }?>
<!-- start: PAGE TITLE -->
<section id="page-title">
   <div class="row">
      <div class="col-sm-8">
         <h1 class="mainTitle">Admin | Add Secondary Unit</h1>
      </div>
      <ol class="breadcrumb">
         <li>
            <span>Admin</span>
         </li>
         <li class="active">
            <span>Add Secondary Unit</span>
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
                     <h5 class="panel-title">Add Unit</h5>
                  </div>
                  <div class="panel-body">
                     <p style="color:red;"><?php echo htmlentities($_SESSION['msg']);?>
                        <?php echo htmlentities($_SESSION['msg']="");?>
                     </p>
                     <form role="form" name="dcotorspcl" method="post" >
                        <div class="form-group">
                           <label for="exampleInputEmail1">
                            Secondary Unit
                           </label>
                           <input type="text" name="unit_name" class="form-control"  placeholder="Enter Secondary Unit Name">
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
   <div class="row">
      <div class="col-md-12">
         <h5 class="over-title margin-bottom-15">Manage <span class="text-bold">Unit</span></h5>
         <table class="table table-hover" id="sample-table-1">
            <thead>
               <tr>
                  <th class="center">#</th>
                  <th>Unit Name</th>
                  <th class="hidden-xs">Creation Date</th>
                  <th>Updation Date</th>
                  <th>Action</th>
               </tr>
            </thead>
            <tbody>
               <?php
               $sql=mysqli_query($con,"select * from secondaryunit");
               $cnt=1;
               while($row=mysqli_fetch_array($sql)){?>
                  <tr>
                     <td class="center"><?php echo $cnt;?>.</td>
                     <td class="hidden-xs"><?php echo $row['name'];?></td>
                     <td><?php echo $row['creationDate'];?></td>
                     <td><?php echo $row['updationDate'];?>
                     </td>
                     <td >
                        <div class="visible-md visible-lg hidden-sm hidden-xs">
                           <a href="edit-secondary-unit.php?id=<?php echo $row['id'];?>" class="btn btn-transparent btn-xs" tooltip-placement="top" tooltip="Edit"><i class="fa fa-pencil"></i></a>
                           <a href="add-secondary-unit.php?id=<?php echo $row['id']?>&del=delete" onClick="return confirm('Are you sure you want to delete?')"class="btn btn-transparent btn-xs tooltips" tooltip-placement="top" tooltip="Remove"><i class="fa fa-times fa fa-white"></i></a>
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
                  <?php $cnt=$cnt+1;
               }?>
            </tbody>
         </table>
      </div>
   </div>
</div>
<!-- end: SELECT BOXES -->
</div>
</div>
</div>
<!-- start: FOOTER -->
<?php include('include/footer.php');?>