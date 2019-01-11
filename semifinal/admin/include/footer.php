<footer>
   <div class="footer-inner">
      <div class="pull-left">
         &copy; <span class="current-year"></span><span class="text-bold text-uppercase"> <?php $sql_select=mysqli_query($con,"select * from setting where type='projectName'");
                    while($row=mysqli_fetch_array($sql_select)){
                    echo $row['name'];}?></span>. <span>All rights reserved</span>
      </div>
      <div class="pull-right">
         <span class="go-top"><i class="ti-angle-up"></i></span>
      </div>
   </div>
</footer>
<!-- end: FOOTER -->
<?php include('include/setting.php');?>
</div>
<!-- start: MAIN JAVASCRIPTS -->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<script src="vendor/modernizr/modernizr.js"></script>
<script src="vendor/jquery-cookie/jquery.cookie.js"></script>
<script src="vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
<script src="vendor/switchery/switchery.min.js"></script>
<!-- end: MAIN JAVASCRIPTS -->
<!-- start: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
<script src="vendor/maskedinput/jquery.maskedinput.min.js"></script>
<script src="vendor/bootstrap-touchspin/jquery.bootstrap-touchspin.min.js"></script>
<script src="vendor/autosize/autosize.min.js"></script>
<script src="vendor/selectFx/classie.js"></script>
<script src="vendor/selectFx/selectFx.js"></script>
<script src="vendor/select2/select2.min.js"></script>
<script src="vendor/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
<script src="vendor/bootstrap-timepicker/bootstrap-timepicker.min.js"></script>
<!-- end: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
<!-- start: CLIP-TWO JAVASCRIPTS -->
<script src="assets/js/main.js"></script>
<!-- <script src="https://code.jquery.com/jquery-3.3.1.js"></script> -->
<!-- start: JavaScript Event Handlers for this page -->
<script src="assets/js/form-elements.js"></script>
<script>
jQuery.noConflict();
   jQuery(document).ready(function() {
      Main.init();
      FormElements.init();
   });
</script>
<!--calendar jquery  --> 
<script src="assets/js/jquery-1.12.4.js"></script>
<script src="assets/js/jquery-ui.js"></script>
<script src="assets/js/jquerys.dataTables.min.js"></script>
<script>
function printPageArea(areaID){
    //var element = document.getElementById("company-address");
    //element.classList.add("billcss");
    var printContent = document.getElementById(areaID);
    var WinPrint = window.open('', '', 'width=900,height=650');
    WinPrint.document.write(printContent.innerHTML);
    WinPrint.document.close();
    WinPrint.focus();
    WinPrint.print();
    WinPrint.close();
}
$(document).ready(function() {
    $('#example').DataTable();
});
function getData(to,from) {
    $.ajax({
      type: "POST",
      url: "SearchPurchaseData.php",
      data:'from='+ from +'&to=' +to,
      success: function(data){
        $("#example").html(data);
      }
    });
  }
  function getSaleData(to,from) {
    $.ajax({
      type: "POST",
      url: "SearchSaleData.php",
      data:'from='+ from +'&to=' +to,
      success: function(data){
        $("#example").html(data);
      }
    });
  }
  
  function getUnit(val) {
    $.ajax({
      type: "POST",
      url: "getUnit.php",
      data:'id='+val,
      success: function(data){
        $("#mediunit").html(data);
      }
    });
  }
  /*get actual quantity of a particular medici on Medicine-Patient.php page during billing and user can select one of them*/
  function getquantity(valu) {
    var second_unit= $("#mediunit").find(':selected').data('unit');
    var tot_qty = $("#mediunit").find(':selected').data('qty');
    var type = $("#mediunit").find(':selected').data('type');
    var variant = $("#mediunit").find(':selected').data('variant');
    var dataString = 'tot_qtys='+ tot_qty + '&second_unit='+second_unit + '&type=' + type + '&variant=' + variant;
    $.ajax({
      type: "POST",
      url: "getQuantity.php",
      data: dataString,
      cache: false,
      success: function(data){
        $("#mediqty").html(data);
      }
    });
  }
  $( function() {
    $('#add_medicine').click(function(){
         var patient_id = $('#patient_id').val();
         var mediName = $("#mediName").find(':selected').data('name');
         var mediqut = $('#mediqty').val();
         var mediunit = $('#mediunit').val();
         var mediprice = $("#mediName").find(':selected').data('price');
        var mediid = $("#mediName").find(':selected').data('id');
        var act_qty = $("#mediName").find(':selected').data('actQty');
        var meditype = $("#mediName").find(':selected').data('type');
        var medivariant = $("#mediName").find(':selected').data('variant');
         var medibatchno = $("#mediName").find(':selected').data('batchno');
        var mediexp = $("#mediName").find(':selected').data('exp');
         
         var dataString = 'patient_id='+ patient_id + '&mediName='+ mediName + '&mediqut='+ mediqut + '&mediunit='+ mediunit + '&mediprice=' + mediprice + '&mediid=' +mediid + '&act_qty=' + act_qty + '&medi_type=' + meditype + '&medi_variant=' + medivariant + '&medi_batchno=' + medibatchno + '&medi_exp=' + mediexp;
         //alert(dataString);
         if(patient_id==''||mediName==''||mediqut==''||mediunit==''||mediprice==''||mediid==''){
            alert("Please Fill All Fields");
         }else{
            $.ajax({
               type: "POST",
               url: "add_patient_medicine.php",
               data: dataString,
               cache: false,
               success: function(result){
                  alert(result);
                  location.reload();
                  
               }
            });
         }
    });
    $('#save_bill').click(function(){
       var patient_id = $('#patient_id').val();
       var bill_no = $('#bill_no').val();
       var bill_date = $('#bill_date').val();
       var total_price = $('#total_price').val();
       var dataString = 'patient_id='+ patient_id + '&bill_no='+ bill_no + '&bill_date='+ bill_date + '&total_price='+ total_price;
       if(patient_id==''||bill_no==''||bill_date==''||total_price==''){
          alert("Please Fill All Fields");
       }else{
          $.ajax({
             type: "POST",
             url: "save_patient_bill.php",
             data: dataString,
             cache: false,
             success: function(result){
                var url="manage-patient.php";
                alert(result);
                window.location.href = url;
             }
          });
       }
    });
    $( "#mfddatepicker" ).datepicker({ dateFormat: 'yy/mm/dd' });
    $( "#expdatepicker" ).datepicker({ dateFormat: 'yy/mm/dd' });
    
    $( "#searchfrom" ).datepicker({ dateFormat: 'yy-mm-dd' });
    $( "#searchto" ).datepicker({ dateFormat: 'yy-mm-dd' });

    $( "#salesearchfrom" ).datepicker({ dateFormat: 'yy-mm-dd' });
    $( "#salesearchto" ).datepicker({ dateFormat: 'yy-mm-dd' });
  });
  function stockIn(id) {
    var qty = $("#medi_qty"+id).val();
    var unit_price = parseInt($("#unit_price"+id).val());
    var tot_price = parseInt($("#tot_price"+id).val());
    $("#medi_qty"+id).val(function(i, val) { 
      qty = qty*1+1 ;
      opt="stockIn";
      tot_price = tot_price + unit_price;
      var dataString = 'id='+ id + '&qty='+ qty + '&tot_price='+ tot_price + '&opt=' + opt;
      $.ajax({
        type: "POST",
        url: "stockInOut.php",
        data: dataString ,
        success: function(data){
          location.reload();
          alert(data);
        }
      });
      return qtu;
    });
  }
  function stockOut(id) {
    var qty = $("#medi_qty"+id).val();
    var unit_price = parseInt($("#unit_price"+id).val());
    var tot_price = parseInt($("#tot_price"+id).val());
    $("#medi_qty"+id).val(function(i, val) {
      qty = qty*1-1;
      opt="stockOut";
      tot_price = tot_price - unit_price;
      var dataString = 'id='+ id + '&qty='+ qty + '&tot_price='+ tot_price + '&opt=' + opt;
      if(qty <= 0){
        qty=0;
        alert("Not valid Quantity");
        $.ajax({
          type: "POST",
          url: "stockInOut.php",
          data: dataString ,
          success: function(data){
            location.reload();
            alert(data);
          }
        });
        return qty;
      }else{
        $.ajax({
          type: "POST",
          url: "stockInOut.php",
          data: dataString ,
          success: function(data){
            location.reload();
            alert(data);
          }
        });
        return qty;
      }
    });
  }
</script>
</body>
</html>