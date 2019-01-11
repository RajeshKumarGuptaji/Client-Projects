<?php include('include/header.php');?>
<?php
   $id=intval($_GET['id']);// get value
   date_default_timezone_set('Asia/Kolkata');// change according timezone
     $patient_id = $_POST['patient_id'];
     $bill_no = $_POST['bill_no'];
     $bill_date = $_POST['bill_date'];
     $total_price = $_POST['total_price'];
    if(isset($_POST['submit'])){
      $sql=mysqli_query($con,"INSERT INTO `patientbilldtl` (`id`, `patient_id`, `bill_no`, `bill_date`, `total_price`) VALUES (NULL, '$patient_id', '$bill_no', '$bill_date', '$total_price')");
      if($sql){
        echo "<script>alert('Bill added Successfully');</script>";
        header('location:medicine-patient.php');
      }else{
         echo "<script>alert('Bill Not Added Successfully');</script>";
        header('location:medicine-patient.php');
      }
    }?>
<!-- start: PAGE TITLE -->
<section id="page-title">
   <div class="row">
      <div class="col-sm-8">
         <h1 class="mainTitle">Admin | Edit Patient</h1>
      </div>
      <ol class="breadcrumb">
         <li>
            <span>Admin</span>
         </li>
         <li class="active">
            <span>Edit Patient</span>
         </li>
      </ol>
   </div>
</section>
<!-- end: PAGE TITLE -->
<!-- start: BASIC EXAMPLE -->
<div class="container-fluid container-fullw bg-white">
   <div class="row">
      <div class="col-md-12">
         <div class="row margin-top-30">
            <div class="col-lg-6 col-md-12">
               <div class="panel panel-white">
                  <div class="panel-heading">
                     <h5 class="panel-title">Patient Medicine</h5>
                  </div>
                  <div class="panel-body">
                     <p style="color:red;"><?php echo htmlentities($_SESSION['msg']);?>
                        <?php echo htmlentities($_SESSION['msg']="");?>
                     </p>
                     <form role="form" name="dcotorspcl" method="post" >
                        <div class="form-group">
                           <?php 
                              $id=intval($_GET['id']);
                                 $sql=mysqli_query($con,"select * from patient where id='$id'");
                              while($row=mysqli_fetch_array($sql))
                              {?> 
                           <input type="hidden" id="patient_id" name="patient_id" value="<?php echo $row['id'];?>">
                                 <div class="form-inline">
                                    <div>
                                       <label for="exampleInputEmail1">Patient Name</label>
                                       <input type="text" name="patient_name"  value="<?php echo $row['fullName'];?>">
                                    </div> 
                                    <div class="date_class">   
                                       <label for="exampleInputEmail1">Date</label>
                                       <input id="mfddatepicker" type="text" name="bil_date" value="<?php echo $curr_data= date("m/d/Y")?>">
                                    </div>
                                 </div>
                                 <div class="form-inline">
                                    <div class="">
                                       <label for="exampleInputEmail1">
                                       Patient Address
                                       </label>
                                       <textarea class="patient_address address_class" rows="3" cols="25"><?php echo $row['address'];?></textarea>
                                    </div>
                                    <div class="phone_class">
                                       <label for="exampleInputEmail1">
                                       Patient Phone No.
                                       </label>
                                       <input type="text" name="patient_phone" class="" value="<?php echo $row['phoneNo'];?>">
                                    </div>
                                 </div>
                        <?php } ?>
                        </div>
                        </br></br>
                        <h3>Add Medicine</h3>
                        <div class="form-inline">
                           <div class="phone_class">
                              <label for="exampleInputEmail1">
                              Medicine Name
                              </label>
                              <select onChange="getUnit(this.value);" id="mediName" name="mediName" class="form-control" required="required">
                              <option value="">Select Medicine</option>
                              <?php 
                              $ret=mysqli_query($con,"select * from inner_stock_dtl");
                              while($row=mysqli_fetch_array($ret))
                              { ?>
                              <option data-batchno="<?php echo htmlentities($row['batch no']);?>"
                              data-exp="<?php echo htmlentities($row['exp']);?>"
                              data-variant="<?php echo htmlentities($row['variant']);?>" data-type="<?php echo htmlentities($row['type']);?>" data-name="<?php echo htmlentities($row['name']);?>" data-price="<?php echo htmlentities($row['unit_price']);?>" data-id="<?php echo htmlentities($row['medicineId']);?>" value="<?php echo htmlentities($row['medicineId']);?>">
                              <?php echo htmlentities($row['name']);?>
                              </option>
                              <?php } ?>
                           </select>
                           </div>
                            <div class="phone_class">
                              <label for="exampleInputEmail1">
                              Unit
                              </label>
                              <select onChange="getquantity(this.value);" id="mediunit" name="mediunit" class="form-control" required="required">
                                <option value="">Select Unit</option>
                              </select>
                            </div>
                            <div class="phone_class">
                              <label for="exampleInputEmail1">
                              Quantity
                              </label>
                              <select id="mediqty" name="mediqty" class="form-control" required="required">
                              <option value="">Select Quantity</option>
                              </select>
                            </div>
                            <a href="" style ="margin: 3px 1px -13px -2px;" class="btn btn-o btn-primary" id="add_medicine">Add</a>
                        </div>
                     </form>
                     <?php //echo "<pre>"; print_r($_SESSION['cart']);echo "</pre>";?>
                  <div id="printableArea" class="invoice-details-table" style="background-color: coral;color:white;">
                    <h1 style="text-align: center;margin:21px 0px 21px 10px;">
                      <?php $sql_select=mysqli_query($con,"select * from setting where type='projectName'");
                    while($row=mysqli_fetch_array($sql_select)){
                    echo $row['name'];}?></h1>
                    </span>
                    <div style="border: 0px solid #ccc;float: right;
    width: 201pt;margin:16px;margin-bottom:30px;" class="invoice-details">
                        <?php 
                        $sql_query=mysqli_query($con,"select max(id) from patientbilldtl");
                        $id = mysqli_fetch_array($sql_query);
                        $last_id = $id[0];
                        $last_id = $last_id+1;
                        ?>
                        <b>Bill No:</b> <?php echo $last_id;?>
                        <br />
                        Date: <?php echo $curr_data= date("m/d/Y")?>
                    </div>
                    <div style="text-align: left; border: 1px solid #ccc;float: left;margin-top: 16px;margin-bottom:30px;margin-left: 20px;" class="company-address" id="company-address">
                    <span style="font-weight: bold;font-size: 13pt;">Dr.M.R.Verma</span><br/>
                    <span style="font-size: 9pt;text-align: left;">B.Sc,B.H.M.S (LKO)</span> <br/>
                    <span style="font-size: 9pt;text-align: left;margin-bottom:5px;">M.R.S.H</span><br/>
                        Resi : <?php $sql_select=mysqli_query($con,"select * from setting where type='address'");
                        while($row=mysqli_fetch_array($sql_select))
                              {
                                echo $row['name'];
                                $clinic_address =$row['second_name'];
                                $phone_no =$row['phone'];
                                }?>
                        <br />
                       Clinic :<?php echo $clinic_address ;?>
                        <br />
                        Phone No. :<?php echo $phone_no ;?>
                        <br />
                    </div>
                    
                    <input type="hidden" id="bill_no" name="bill_no" value="<?php echo $last_id;?>">
                    <input type="hidden" id="bill_date" name="bill_date" value="<?php echo $curr_data= date("Y/m/d")?>">
                    <table width="100%" border='4' cellspacing='1'>
                      <tr rowspan='2'>
                          <!-- <th width=100>Patient Id</th> -->
                          <th width=100>Med Name</th>
                          <th width=80>Qty</th>
                          <th width=100>Unit</th>
                          <th width=100>Unit Price</th>
                          <!-- <th width=100>Med Type</th>
                          <th width=100>Variant</th> -->
                          <th width=100>Batch no.</th>
                          <th width=100>Exp Dt.</th>
                          <th width=250>Tot Price</th>
                      </tr>
                      <?php 
                      $qut=0;$price=0;$total=0;$subTotal=0;$cst=10;
                      $gst=10;
                      foreach($_SESSION['cart'] as $id=>$value){
                        echo("<tr>");
                        foreach($value as $ids=>$values){
                          if($ids == 'meditype' || $ids == 'medivariants'){

                          }else{
                            echo("<td>$values</td>");
                          }  
                          if($ids == 'mediunit'){
                            $mediunit = $values;
                          }
                          if($ids == 'mediqut'){
                            $qut = $values;
                          }
                          if($ids == 'mediprice'){
                            $price=$values;
                          }
                          if($ids == 'meditype'){
                            $meditype=$values;
                          }
                          if($ids == 'medivariants'){
                            $medivariant=$values;
                          }
                        } 
                        preg_match_all('!\d+!', $mediunit, $matches);
                        $quan = $matches[0][1];
                        if($medivariant == 'loose'){
                            $z = $price/$quan;
                            $total= $z*$qut;
                        }
                        if($medivariant == 'unloose'){
                            $total= $price*$qut;
                          }
                        $subTotal =$subTotal +$total;
                        echo("<td>$total</td>");
                        echo("</tr>");
                      }
                      echo("<tr>");
                      echo("<td colspan='6' class='text-right'>Sub total</td>");
                      echo("<td class='text-right'>Rs. " . number_format($subTotal,2) . "</td>");
                      echo("</tr>");
                      echo("<tr>");
                      echo("<td colspan='6' class='text-right'><b>TOTAL</b></td>");
                      echo("<td class='text-right'><b>Rs. " . number_format(($subTotal),2) . "</b></td>");
                      echo("</tr>");
                      ?>
                    </table> 
                    <input type="hidden" id="total_price" name="total_price" value="<?php echo $subTotal;?>">      
                  </div>
                     </br></br> 
                    <input type="button" name="save_bill" value="Save" id="save_bill" class="btn btn-o btn-primary">
                    <input onclick="printPageArea('printableArea')" class="btn btn-o btn-primary" type="button" name="" value="Save & Print">
                  </div>
               </div>
            </div>
         </div>
      </div>
      <div class="col-lg-12 col-md-12">
         <div class="panel panel-white">
         </div>
      </div>
   </div>
</div>
<!-- end: SELECT BOXES -->
</div>
</div>
</div>
<?php include('include/footer.php');?>