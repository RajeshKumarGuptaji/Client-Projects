<?php include('include/header.php');?>
<?php
session_start();?>
<!-- start: PAGE TITLE -->
<section id="page-title">
   <div class="row">
      <div class="col-sm-8">
         <h1 class="mainTitle">Admin | Bill Detail</h1>
      </div>
      <ol class="breadcrumb">
         <li>
            <span>Admin</span>
         </li>
         <li class="active">
            <span>Detailed Bill</span>
         </li>
      </ol>
   </div>
</section>
<!-- end: PAGE TITLE -->
<!-- start: BASIC EXAMPLE -->
<div class="container-fluid container-fullw bg-white">
   <div class="row">
      <div class="col-md-12">
         <h5 class="over-title margin-bottom-15">Detailed <span class="text-bold">Bill</span></h5>
         <p style="color:red;"><?php echo htmlentities($_SESSION['msg']);?>
            <?php echo htmlentities($_SESSION['msg']="");?>
         </p>
         <table class="table table-hover" id="example">
            <thead>
               <tr>
                  <th class="center">#</th>
                  <th>Medicine Name.</th>
                  <th>Quantity</th>
                  <th>Unit Price</th>
                  <th>Total Price</th>

               </tr>
            </thead>
            <tbody>
               <?php
               $patient_id = $_GET['patient_id'];
               $bill_id = $_GET['bill_id'];
               $subtotal=0;
               $sql=mysqli_query($con,"SELECT * FROM `patientmedicinedtl` WHERE patient_id = '$patient_id' and bill_no ='$bill_id'");
                  $cnt=1;
                  while($row=mysqli_fetch_array($sql)){?>
                     <tr>
                        <td class="center"><?php echo $cnt;?>.</td>
                        <td class="hidden-xs"><?php echo $row['medicineName'];?></td>
                        <td><?php echo $row['quantity'];?></td>
                        <td><?php echo $row['unitPrice'];?></td>
                        <td><?php echo $row['tot_price'];echo ".00";?></td>
                     </tr>
                     
                  <?php $subtotal=$subtotal+$row['tot_price'];
                  $cnt=$cnt+1;
               }?>
               <tr>
                  <td colspan='4' class='text-right'><b>SUB TOTAL</b></td>
                  <td><b>Rs. <?php echo $subtotal;echo ".00";?></b></td>
               </tr>
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