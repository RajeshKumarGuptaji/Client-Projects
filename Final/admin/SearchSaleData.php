<?php
include('include/config.php');
$from = $_POST["from"];
$to = $_POST["to"];
if (! empty($_POST["from"]) && ! empty($_POST["to"])) { ?>
	<thead>
       <!-- <tr>
          <th class="center">#</th>
          <th>Medicine Name</th>
          <th class="hidden-xs">Quantity</th>
          <th class="hidden-xs">Unit</th>
          <th>Medicine Type</th>
          <th>Batch NO.</th>
          <th>Manufacturing Date</th>
          <th>Expire Date</th>
          <th>Unit Price</th>
          <th class="hidden-xs">Date</th>
       </tr> -->
       <tr>
                  <th class="center">#</th>
                  <th>Medicine Name</th>
                  <th class="hidden-xs">Quantity</th>
                  
                  <th>Medicine Type</th>
                  <th>Batch NO.</th>
                  <!-- <th>Manufacturing Date</th>
                  <th>Expire Date</th> -->
                  <th>Unit Price</th>
                  <th class="hidden-xs">Unit</th>
                  <th>Total Price</th>
                  <th class="hidden-xs">Date</th>
               </tr>
    </thead>
	<tbody>
       <?php $sql=mysqli_query($con,"SELECT pm.`medicineName`,pm.`quantity`,md.`unit_first`,md.`type`,md.`unit_second`,md.`batch no`,md.`mfd`,md.`exp`,md.`cmp`,md.`unit_price`,pm.`date`,pm.`tot_price` FROM `patientmedicinedtl` as pm,`medicine_dtl` md where md.`id`=pm.`medicineId` AND `date` BETWEEN cast('$from' as date) AND cast('$to' as date)");
          $cnt=1;$total=0;
          while($row=mysqli_fetch_array($sql)){?>
       <tr>
             <td class="center"><?php echo $cnt;?>.</td>
                  <td class="hidden-xs"><?php echo $row['medicineName'];?></td>
                  <td class="hidden-xs"><?php echo $row['unit_first'];echo "(";echo $row['unit_second'];echo ")";?></td>
                  
                  <td class="hidden-xs"><?php echo $row['type'];?></td>
                  <td class="nr">
                  <?php echo $row['batch no'];?>
                  </td>
                  <!--  <td><?php echo $row['mfd'];?></td> 
                  <td><?php echo $row['exp'];?></td> -->
                  <!-- <td><?php echo $row['date'];?></td>  -->
                  <td><?php echo $row['unit_price'];?></td>
                  <td id="tex-size" >
                     <input style="font-size: 8pt; height: 40px; width:40px; " type="text" name="medi_qty" value="<?php echo $row['quantity'];?>" id="medi_qty<?php echo $row['id'];?>" disabled>
                  </td>
                  <td><?php echo $row['tot_price'];$total = $total + $row['tot_price'];?></td>

                  <td><?php echo $row['date'];?></td>
       </tr>
       <?php 
          $cnt=$cnt+1;
       }?>
    </tbody>
    <tr>
            <td></td><td></td><td></td><td></td><td></td><td></td>
               <td style="color:red;font-weight: bold;font-size: 18pt;">Total=</td>
               <td style="color:red;font-weight: bold;font-size: 18pt;"><?php echo $total?></td>
            </tr>
<?php } ?>