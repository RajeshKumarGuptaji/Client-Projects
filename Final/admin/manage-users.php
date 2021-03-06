<?php include('include/header.php');?>
<!-- Include header.php file Code End -->
<!-- Delete Code Start -->
   <?php if(isset($_GET['del'])){
      mysqli_query($con,"delete from patient where id = '".$_GET['id']."'");
      $_SESSION['msg']="data deleted !!";
   }?>
<!-- Delete Code End -->

<!-- start: PAGE TITLE -->
   <section id="page-title">
      <div class="row">
         <div class="col-sm-8">
            <h1 class="mainTitle">Admin | Manage Patients</h1>
         </div>
         <ol class="breadcrumb">
            <li>
               <span>Admin</span>
            </li>
            <li class="active">
               <span>Manage Patients</span>
            </li>
         </ol>
      </div>
   </section>
<!-- end: PAGE TITLE -->

<!-- start: Whole Content -->
   <div class="container-fluid container-fullw bg-white">
      <div class="row">
         <div class="col-md-12">
            <h5 class="over-title margin-bottom-15">Manage <span class="text-bold">Patients</span></h5>
            <p style="color:red;"><?php echo htmlentities($_SESSION['msg']);?>
               <?php echo htmlentities($_SESSION['msg']="");?>
            </p>
            <table class="table table-hover" id="example">
               <thead>
                  <tr>
                     <th class="center">#</th>
                     <th>Full Name</th>
                     <th class="hidden-xs">Adress</th>
                     <th>Gender </th>
                     <th>Email </th>
                     <!-- <th>Creation Date </th>
                     <th>Updation Date </th> -->
                     <th>Phone No. </th>
                     <th>Action</th>
                  </tr>
               </thead>
               <tbody>
                  <?php
                     $sql=mysqli_query($con,"select * from patient");
                     $cnt=1;
                     while($row=mysqli_fetch_array($sql)){?>
                        <tr>
                           <td class="center"><?php echo $cnt;?>.</td>
                           <td class="hidden-xs"><?php echo $row['fullName'];?></td>
                           <td><?php echo $row['address'];?></td>
                           <td><?php echo $row['gender'];?></td>
                           <td><?php echo $row['email'];?></td>
                           <!-- <td><?php echo $row['regDate'];?></td>
                           <td><?php echo $row['updationDate'];?> -->
                           <td><?php echo $row['phoneNo'];?></td>
                           <td >
                              <div class="visible-md visible-lg hidden-sm hidden-xs">
                                 <a href="edit-patient.php?id=<?php echo $row['id'];?>" class="btn btn-transparent btn-xs" tooltip-placement="top" tooltip="Edit"><i class="fa fa-pencil"></i>
                                 </a>
                                 <a href="manage-users.php?id=<?php echo $row['id']?>&del=delete" onClick="return confirm('Are you sure you want to delete?')"class="btn btn-transparent btn-xs tooltips" tooltip-placement="top" tooltip="Remove"><i class="fa fa-times fa fa-white"></i></a>
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
   </div>
<!-- end: SELECT BOXES -->
</div>
</div>
</div>
<?php include('include/footer.php');?>