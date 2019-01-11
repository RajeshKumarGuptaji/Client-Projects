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
                        <h1>Add Medicine</h1>
                        <div class="form-inline">
                           <div class="phone_class">
                              <label for="exampleInputEmail1">
                              Medicine Name
                              </label>
                              <select id="mediName" name="mediName" class="form-control" required="required">
                              <option value="">Select Medicine</option>
                              <?php $ret=mysqli_query($con,"select * from medicine");
                              while($row=mysqli_fetch_array($ret))
                              {?>
                              <option data-price="<?php echo htmlentities($row['price']);?>" data-id="<?php echo htmlentities($row['id']);?>" value="<?php echo htmlentities($row['name']);?>">
                              <?php echo htmlentities($row['name']);?>
                              </option>
                              <?php } ?>
                           </select>
                           </div>
                            <div class="phone_class">
                              <label for="exampleInputEmail1">
                              Quantity
                              </label>
                              <input id="mediqut" min="1" max="100" type="text" name="mediqut" class="" ">
                            </div>
                            <div class="phone_class">
                              <label for="exampleInputEmail1">
                              Unit
                              </label>
                              <select id="mediunit" name="mediunit" class="form-control" required="required">
                                <option value="">Select Unit</option>
                                <?php $ret=mysqli_query($con,"select * from unit");
                                while($row=mysqli_fetch_array($ret))
                                {?>
                                <option value="<?php echo htmlentities($row['name']);?>">
                                <?php echo htmlentities($row['name']);?>
                                </option>
                                <?php } ?>
                              </select>
                            </div>
                            <!-- <button type="submit" name="submit" class="btn btn-o btn-primary" id="add_medicine">
                              Add
                            </button> -->
                            <a href="" class="btn btn-o btn-primary" id="add_medicine">Add</a>
                        </div>
                     </form>
                     <?php //echo "<pre>"; print_r($_SESSION['cart']);echo "</pre>";?>
                  <div class="invoice-details-table">
                    
                   
                    <input type="hidden" id="bill_no" name="bill_no" value="<?php echo $last_id;?>">
                    <input type="hidden" id="bill_date" name="bill_date" value="<?php echo $curr_data= date("Y/m/d")?>">
                    <table border='4' cellspacing='1'>
                      <tr rowspan='2'>
                          <!-- <th width=100>Patient Id</th> -->
                          <th width=100>Medicine Name</th>
                          <th width=80>Quantity</th>
                          <th width=100>Unit</th>
                          <th width=100>Unit Price</th>
                          <!-- <th width=100>Medicine Id</th> -->
                          <th width=250>Total Price</th>
                      </tr>
                      <?php 
                      $qut=0;$price=0;$total=0;$subTotal=0;$cst=10;
                      $gst=10;
                      foreach($_SESSION['cart'] as $id=>$value){
                        echo("<tr>");
                        foreach($value as $ids=>$values){
                          echo("<td>$values</td>");
                          if($ids == 'mediqut'){
                            $qut = $values;
                          }if($ids == 'mediprice'){
                            $price=$values;
                          }
                        } 
                        $total = $qut*$price;
                        $subTotal =$subTotal +$total;
                        echo("<td>$total</td>");
                        echo("</tr>");
                      }
                      echo("<tr>");
                      echo("<td colspan='4' class='text-right'>Sub total</td>");
                      echo("<td class='text-right'>€" . number_format($subTotal,2) . "</td>");
                      echo("</tr>");
                      /*echo("<tr>");
                      echo("<td colspan='4' class='text-right'>CST</td>");
                      echo("<td class='text-right'>€" . number_format(($total*$cst)/100,2) . "</td>");
                      echo("</tr>");
                      echo("<tr>");
                      echo("<td colspan='4' class='text-right'>GST</td>");
                      echo("<td class='text-right'>€" . number_format(($total*$gst)/100,2) . "</td>");
                      echo("</tr>");*/
                      echo("<tr>");
                      echo("<td colspan='4' class='text-right'><b>TOTAL</b></td>");
                      echo("<td class='text-right'><b>€" . number_format(($subTotal),2) . "</b></td>");
                      echo("</tr>");
                      ?>
                    </table> 
                    <input type="hidden" id="total_price" name="total_price" value="<?php echo $subTotal;?>">      
                  </div>
                     </br></br> 
                    <input type="button" name="save_bill" value="Save" id="save_bill" class="btn btn-o btn-primary">
                    <!-- <button type="submit" name="submit" class="btn btn-o btn-primary">Save Bill
                        </button> -->
                    <input class="btn btn-o btn-primary" type="button" name="" value="Save & Print">
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