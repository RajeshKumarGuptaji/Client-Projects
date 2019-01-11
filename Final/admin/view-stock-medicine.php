<?php include('include/header.php');?>
<?php
session_start();?>
<!-- start: PAGE TITLE -->
<section id="page-title">
   <div class="row">
      <div class="col-sm-8">
         <h1 class="mainTitle">Admin | Main Stock Details</h1>
      </div>
      <ol class="breadcrumb">
         <li>
            <span>Admin</span>
         </li>
         <li class="active">
            <span>Main Stock Details</span>
         </li>
      </ol>
   </div>
</section>
<!-- end: PAGE TITLE -->
<!-- start: BASIC EXAMPLE -->
<div class="container-fluid container-fullw bg-white">
   <div class="row">
      <div class="col-md-12">
         <h5 class="over-title margin-bottom-15">Manage <span class="text-bold">Main Stock Details</span></h5>
         <p style="color:red;"><?php echo htmlentities($_SESSION['msg']);?>
            <?php echo htmlentities($_SESSION['msg']="");?>
         </p>
         <table class="table table-hover" id="example">
            <thead>
               <tr>
                  <th class="center">#</th>
                  <th>Medicine Name</th>
                  <th class="hidden-xs">Quantity</th>
                  <th>Unit </th>
                  <th>Batch NO. </th>
                  <!-- <th>Manufacturing Date </th> -->
                  <th>Expairy Date </th>
                  <th>Unit Price</th>
                  <!-- <th>Total Price</th> -->
                  <!-- <th>Descriptin</th> -->
                  <th>Company</th>
                  <th>Action</th>
               </tr>
            </thead>
            <tbody>
               <?php
                  /*$sql=mysqli_query($con,"SELECT `id`,`name`,sum(quantity) as `quantity`,`unit_first`,`unit_second`,`batch no`,`mfd`,`exp`,`unit_price`,`tot_price`,`description`,`cmp`,`purchase_date` FROM `medicine_dtl` GROUP BY name,unit_first,unit_second,`batch no`,`unit_price`");*/
                  $sql=mysqli_query($con,"SELECT `id`,`name`,`quantity`,`unit_first`,`unit_second`,`batch no`,`mfd`,`exp`,`unit_price`,`tot_price`,`description`,`cmp`,`purchase_date` FROM `medicine_dtl`");
                  $cnt=1;
                  while($row=mysqli_fetch_array($sql))
                  {
                  ?>
               <tr>
                  <td class="center"><?php echo $cnt;?>.</td>
                  <td class="hidden-xs"><?php echo $row['name'];?></td>
                  <td id="tex-size" >
                     <input style="font-size: 8pt; height: 40px; width:40px; " type="text" name="medi_qty" value="<?php echo $row['quantity'];?>" id="medi_qty<?php echo $row['id'];?>" disabled>
                  </td>
                  <!-- <td class="nr">
                  <?php echo $row['quantity'];?>
                     
                  </td> -->
                  <td><?php echo $row['unit_first'];echo "(";echo $row['unit_second'];echo ")";?></td>
                  <td><?php echo $row['batch no'];?></td>
                  <!-- <td><?php echo $row['mfd'];?></td> -->
                  <td><?php echo $row['exp'];?></td>
                  <td><?php echo $row['unit_price'];?></td>
                  <!-- <td><?php echo $row['tot_price'];?></td> -->
                  <!-- <td><?php echo $row['description'];?></td> -->
                  <td><?php echo $row['cmp'];?></td>
                  <!-- <td>
                     <a href="edit-stock-medicine.php?id=<?php echo $row['id'];?>" class="btn btn-transparent btn-xs" tooltip-placement="top" tooltip="Edit"><i class="fa fa-pencil"></i></a>
                  </td>  -->
                  <input type="hidden" name="unit_price" value="<?php echo $row['unit_price'];?>" id="unit_price<?php echo $row['id'];?>">             
                  <input type="hidden" name="tot_price" value="<?php echo $row['tot_price'];?>" id="tot_price<?php echo $row['id'];?>">             
                  <td onclick="stockOut(<?php  echo $row['id'];?>)">
                     <a href="javascript:void(0)" class="btn btn-transparent btn-xs stockOut" tooltip-placement="top" tooltip="Edit"><i class="fa fa-minus"></i>&nbsp&nbspStock Out</a> 
                  </td>
                  <!-- <td>
                     <a href="javascript:void(0)" class="btn btn-transparent btn-xs" tooltip-placement="top" tooltip="Edit" onclick="stockIn(<?php  echo $row['id'];?>)"><i class="fa fa-plus"></i>&nbsp&nbspStock In</a> 
                  </td> -->
                  
               </tr>
               <?php 
                  $cnt=$cnt+1;
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