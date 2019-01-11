<?php
include('include/config.php');
if (! empty($_POST["id"])) {
    $query = $sql=mysqli_query($con,"SELECT `unit_first`,`unit_second`,`tot_qty`,`type`,`variant`,`batch no`,`exp` FROM inner_stock_dtl WHERE medicineId = '" . $_POST["id"] . "'");?>
	<option value disabled selected>Select Unit</option>
	<?php foreach ($query as $state) {?>
		<option data-batchno="<?php echo htmlentities($state['batchno']);?>" data-exp="<?php echo htmlentities($state['exp']);?>" data-qty="<?php echo htmlentities($state['tot_qty']);?>" data-unit="<?php echo htmlentities($state['unit_second']);?>" data-type="<?php echo htmlentities($state['type']);?>" 
		data-variant="<?php echo htmlentities($state['variant']);?>" value="<?php echo $state["unit_first"];echo "("; echo $state["unit_second"];echo ")";?>"><?php echo $state["unit_first"];echo "("; echo $state["unit_second"];echo ")";?>
		</option>
	<?php }
}?>