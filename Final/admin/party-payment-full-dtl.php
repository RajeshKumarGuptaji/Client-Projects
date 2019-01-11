<?php include('include/header.php');?>
<?php
session_start();?>
<!-- start: PAGE TITLE -->
<section id="page-title">
   <div class="row">
      <div class="col-sm-8">
         <h1 class="mainTitle">Admin | Party Payment Details</h1>
      </div>
      <ol class="breadcrumb">
         <li>
            <span>Admin</span>
         </li>
         <li class="active">
            <span>Party Payment Details</span>
         </li>
      </ol>
   </div>
</section>
<!-- end: PAGE TITLE -->
<!-- start: BASIC EXAMPLE -->
<div class="container-fluid container-fullw bg-white">
   <div class="row">
      <div class="col-md-12">
         <h5 class="over-title margin-bottom-15">Manage <span class="text-bold">Party Payment Details</span></h5>
         <p style="color:red;"><?php echo htmlentities($_SESSION['msg']);?>
            <?php echo htmlentities($_SESSION['msg']="");?>
         </p>
         <table class="table table-hover" id="example">
            <thead>
               <tr>
                  <th class="center">#</th>
                  <th>Party Name</th>
                  <th>Total Payable Amt.</th>
                  <th>Total Balance </th>
                  <th>Payment Type </th>
               </tr>
            </thead>
            <tbody>
               <?php
                  $sql=mysqli_query($con,"SELECT * FROM `party_full_dtl` where partyId='".$_GET['id']."'");
                  $cnt=1;
                  while($row=mysqli_fetch_array($sql)){?>
                     <tr>
                        <td class="center"><?php echo $cnt;?>.</td>
                        <td class="hidden-xs"><?php echo $row['partyName'];?></td>
                        <td><?php echo $row['partyAmount'];?></td>
                        <td><?php echo $row['balance'];?></td>
                        <td><?php echo $row['partyAmountType'];?></td>
                                    
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