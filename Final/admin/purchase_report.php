<?php include('include/header.php');?>
<?php
session_start();?>
<!-- start: PAGE TITLE -->
<section id="page-title">
   <div class="row">
      <div class="col-sm-8">
         <h1 class="mainTitle">Admin | Purchase Details</h1>
      </div>
      <ol class="breadcrumb">
         <li>
            <span>Admin</span>
         </li>
         <li class="active">
            <span>Purchase Details</span>
         </li>
      </ol>
   </div>
</section>
<!-- end: PAGE TITLE -->
<!-- start: BASIC EXAMPLE -->
<div class="container-fluid container-fullw bg-white">
   <div class="row">
      <div class="col-md-12">
         <h5 class="over-title margin-bottom-15" style="color:orange;">Manage <span class="text-bold" style="color:green;">Purchase Details</span></h5>
         <p style="color:red;"><?php echo htmlentities($_SESSION['msg']);?>
            <?php echo htmlentities($_SESSION['msg']="");?>
         </p>
         <b style="color: red">Search By date</b> &nbsp;&nbsp;&nbsp;<b>From</b> 
         <input type="date" name="" id="searchfrom"><b> To</b> 
         <input type="date" name="" id="searchto" onChange="getData(this.value,searchfrom.value);">
         <br><br>
         <table id="example" class="table table-hover">
            <thead>
               <tr>
                  <th class="center">#</th>
                  <th>Medicine Name</th>
                  <th class="hidden-xs">Qty</th>
                  <th>Unit </th>
                  <th>Batch NO. </th>
                  <th>Manufacturing / Exp Date </th> 
                  <th>Unit Price</th>
                  <th>Total Price</th> 
                  <th>Descriptin</th> 
                  <th>Company</th>
                  <th>Purchase Date</th>
               </tr>
            </thead>
            <tbody>
               <?php $sql=mysqli_query($con,"SELECT `id`,`name`,`quantity`,`unit_first`,`unit_second`,`batch no`,`mfd`,`exp`,`unit_price`,`tot_price`,`description`,`cmp`,`purchase_date` FROM `purchase_dtl`");
               $cnt=1;$total=0;
               while($row=mysqli_fetch_array($sql)){?>
                  <tr>
                     <td class="center"><?php echo $cnt;?>.</td>
                     <td class="hidden-xs"><?php echo $row['name'];?></td>
                     <td id="tex-size" >
                        <input style="font-size: 8pt; height: 40px; width:40px; " type="text" name="medi_qty" value="<?php echo $row['quantity'];?>" id="medi_qty<?php echo $row['id'];?>" disabled>
                     </td>
                     <td><?php echo $row['unit_first'];echo "(";echo $row['unit_second'];echo ")";?></td>
                     <td><?php echo $row['batch no'];?></td>
                     <td><?php echo $row['mfd'];?> / <?php echo $row['exp'];?></td> 
                     <td><?php echo $row['unit_price'];?></td>
                     <td><?php echo $row['tot_price'];$total = $total + $row['tot_price'];?></td> 
                     <td><?php echo $row['description'];?></td> 
                     <td><?php echo $row['cmp'];?></td>
                     <td><?php echo $row['purchase_date'];?></td>
                  </tr>
                  <?php $cnt=$cnt+1;
               }?>
            </tbody>
            <tr>
            <td></td><td></td><td></td><td></td><td></td>
               <?php if($total >0){?>
               <td style="color:red;font-weight: bold;font-size: 18pt;">Total = </td>
               <td style="color:red;font-weight: bold;font-size: 18pt;"><?php echo $total?></td>
               <?php }?> 
            </tr>
         </table>
      </div>
   </div>
</div>
<!-- end: SELECT BOXES -->
</div>
</div>
</div>
<?php include('include/footer.php');?>