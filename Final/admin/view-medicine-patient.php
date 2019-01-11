<?php include('include/header.php');?>
<?php
$did=intval($_GET['id']);
session_start();?>
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
<!-- start: BASIC EXAMPLE -->
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
                  <th>Bill No.</th>
                  <th class="hidden-xs">Bill Date</th>
                  <th>Payed Amt.</th>
                  <th>Details</th>

               </tr>
            </thead>
            <tbody>
               <?php
                  $sql=mysqli_query($con,"select * from patientbilldtl where patient_id =".$did);
                  $cnt=1;
                  while($row=mysqli_fetch_array($sql)){?>
                     <tr>
                        <td class="center"><?php echo $cnt;?>.</td>
                        <td class="hidden-xs"><?php echo $row['bill_no'];?></td>
                        <td><?php echo $row['bill_date'];?></td>
                        <td><?php echo $row['total_price'];echo " "; echo".00";
                        echo "Rs."?></td>
                        <td >
                           <div class="visible-md visible-lg hidden-sm hidden-xs">
                              <a href="patient-full-medicine-dtl.php?bill_id=<?php echo $row['bill_no']?>&patient_id=<?php echo $_GET['id'];?>" class="btn btn-transparent btn-xs tooltips">View </a>
                           </div>
                           <input type="hidden" name="patient_id" value="<?php echo $_GET['id'];?>">
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