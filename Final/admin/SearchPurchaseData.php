<?php
include('include/config.php');
$from = $_POST["from"];
$to = $_POST["to"];
if (! empty($_POST["from"]) && ! empty($_POST["to"])) { ?>
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
    	<?php $sql=mysqli_query($con,"SELECT `id`,`name`,`quantity`,`unit_first`,`unit_second`,`batch no`,`mfd`,`exp`,`unit_price`,`tot_price`,`description`,`cmp`,`purchase_date` FROM `purchase_dtl` WHERE `purchase_date` BETWEEN cast('$from' as date) AND cast('$to' as date)");
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
				<td><?php echo $row['tot_price']; $total = $total + $row['tot_price'];?></td> 
				<td><?php echo $row['description'];?></td> 
				<td><?php echo $row['cmp'];?></td>
				<td><?php echo $row['purchase_date'];?></td>
			</tr>
			<?php $cnt=$cnt+1;
		}?>
		<tr>
            <td></td><td></td><td></td><td></td><td></td>
               <td style="color:red;font-weight: bold;font-size: 18pt;">Total  = </td>
               <td style="color:red;font-weight: bold;font-size: 18pt;"><?php echo $total?></td>
            </tr>
    </tbody>
<?php } ?>