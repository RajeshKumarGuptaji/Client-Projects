<?php include('include/header.php');?>
<!-- start: PAGE TITLE -->
<section id="page-title">
   <div class="row">
      <div class="col-sm-8">
         <h1 class="mainTitle">Admin | Dashboard</h1>
      </div>
      <ol class="breadcrumb">
         <li><span>Admin</span></li>
         <li class="active"><span>Dashboard</span></li>
      </ol>
   </div>
</section>
<!-- end: PAGE TITLE -->
<!-- start: BASIC EXAMPLE -->
<div class="container-fluid container-fullw bg-white">
   <div class="row">
      <div class="col-sm-4">
         <div class="panel panel-white no-radius text-center">
            <div class="panel-body">
               <span class="fa-stack fa-2x">
                  <i class="fa fa-medkit" style="font-size:48px;color:red"></i>
               </span>
               <h2 class="StepTitle">Medicine Details</h2>
               <p class="links cl-effect-1">
                  <a href="view-stock-medicine.php">
                     Medicine Details 
                  </a>
               </p>
            </div>
         </div>
      </div>
      <div class="col-sm-4">
         <div class="panel panel-white no-radius text-center">
            <div class="panel-body">
               <span class="fa-stack fa-2x"> <i class="fa fa-wheelchair" style="font-size:48px;color:red"></i> </span>
               <h2 class="StepTitle">Manage Patients</h2>
               <p class="cl-effect-1">
                  <a href="manage-patient.php">
                       Manage Patients
                  </a>
               </p>
            </div>
         </div>
      </div>
      <div class="col-sm-4">
         <div class="panel panel-white no-radius text-center">
            <div class="panel-body">
               <span class="fa-stack fa-2x"> <i class="fa fa-square fa-stack-2x text-primary"></i> <i class="fa fa-users fa-stack-1x fa-inverse"></i> </span>
               <h2 class="StepTitle">Manage Company</h2>
               <p class="cl-effect-1">
                  <a href="add-company.php">
                       Manage Company
                  </a>
               </p>
            </div>
         </div>
      </div>
   </div>
</div>
<!-- end: SELECT BOXES -->
</div>
</div>
</div>
<!-- start: FOOTER -->
<?php include('include/footer.php');?>