<?php
include('include/config.php');
if (! empty($_POST["tot_qtys"])) {?>
	<option value disabled selected>Select Quantity</option>
	<?php 
	$second_unit= $_POST["second_unit"];
	$tot_qty= $_POST["tot_qtys"];
	$type= $_POST["type"];
	$variant= $_POST["variant"];
	preg_match_all('!\d+!', $second_unit, $matches);
	echo $act_qty = $matches[0][0];
	$loop_value = $tot_qty / $act_qty;
	$arr_val = array('Tab','Tabs','tabs','tab','Tablet','Tablets','tablet','tablets','caps','capsule','Cap','Capsule');

	if($variant == 'loose'){
		//if(in_array($type,$arr_val)){
		if($tot_qty >= 30){
			for($i=1;$i<=30;$i++) {?>
				<option value="<?php echo $i;?>"><?php echo $i;?></option>
			<?php }
		}else{
			for($i=1;$i<=$tot_qty;$i++) {?>
				<option value="<?php echo $i;?>"><?php echo $i;?></option>
			<?php }
		}
		
	}else{
		for($i=1;$i<=$loop_value;$i++) {?>
			<option value="<?php echo $i;?>"><?php echo $i;?></option>
		<?php } 
	}
	
}?>