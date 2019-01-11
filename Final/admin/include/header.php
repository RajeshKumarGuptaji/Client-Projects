<?php
   session_start();
   //error_reporting(0);
   include('include/config.php');
   include('include/checklogin.php');
   check_login();
   ?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <title>Patients | Appointment History</title>
      <meta charset="utf-8" />
      <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
      <meta name="apple-mobile-web-app-capable" content="yes">
      <meta name="apple-mobile-web-app-status-bar-style" content="black">
      <meta content="" name="description" />
      <meta content="" name="author" />

      <link href="assets/css/fonts.googleapis.css" rel="stylesheet" type="text/css" />
      <link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css">
      <link rel="stylesheet" href="vendor/fontawesome/css/font-awesome.min.css">
      <link rel="stylesheet" href="vendor/themify-icons/themify-icons.min.css">
      <link href="vendor/animate.css/animate.min.css" rel="stylesheet" media="screen">
      <link href="vendor/perfect-scrollbar/perfect-scrollbar.min.css" rel="stylesheet" media="screen">
      <link href="vendor/switchery/switchery.min.css" rel="stylesheet" media="screen">
      <link href="vendor/bootstrap-touchspin/jquery.bootstrap-touchspin.min.css" rel="stylesheet" media="screen">
      <link href="vendor/select2/select2.min.css" rel="stylesheet" media="screen">
      <link href="vendor/bootstrap-datepicker/bootstrap-datepicker3.standalone.min.css" rel="stylesheet" media="screen">
      <link href="vendor/bootstrap-timepicker/bootstrap-timepicker.min.css" rel="stylesheet" media="screen">
      <link rel="stylesheet" href="assets/css/styles.css">
      <link rel="stylesheet" href="assets/css/styles.css">
      <link rel="stylesheet" href="assets/css/jquerys.dataTables.min.css">
      <link rel="stylesheet" href="assets/css/plugins.css">
      <link rel="stylesheet" href="assets/css/themes/theme-1.css" id="skin_color" />
      <link rel="stylesheet" href="assets/css/jquery-ui.css">
      <link rel="stylesheet" href="/assets/css/style.css">
      
      <style type="text/css">
         /*rajesh*/
         .form-inline {display: flex;flex-flow: row wrap;align-items: center;margin: -32px 6px -23px 3px;
         }
         .form-inline input {vertical-align: middle;margin: 5px 10px 5px 0;padding: 10px;background-color: #fff;border: 1px solid #ddd;}
         .form-inline button {padding: 10px 20px;background-color: dodgerblue;border: 1px solid #ddd;color: white;cursor: pointer;}
         .form-inline button:hover {background-color: royalblue;}
         .date_class{margin: 0px 0px 0px 133px;}
         .address_class{margin: 10px 19px -51px -11px;}
         .phone_class{ margin: 22px 4px 6px 1px;}
         @media (max-width: 800px) {
            .form-inline input { margin: 10px 0;}
            .form-inline {flex-direction: column;align-items: stretch;}
            .date_class{margin: 0px 0px 0px 0px;}
            .address_class{margin: 0px 0px 0px 0px;}
            .phone_class{margin: 0px 0px 0px 0px;}
            .invoice-details-table{
              width: 100%;
              margin: 0px 0px 0px -26px;
            }
            div.invoice-details {border: 0px solid #ccc;float: right;width: 201pt;margin: -16px 0px 47px;}
            div.company-address {border: 1px solid #ccc!important;
              float: left!important;width: 150pt!important;
              margin: 11px 1px 2px 17px!important;}
            .add_medicine{margin-top: 12px!important;}
          }
         div.invoice {border:1px solid #ccc;padding:10px;
        height:740pt;width:570pt;}
 
        div.company-address {border:1px solid #ccc;
            float:left;width:200pt;margin-top:12px;
        }
         
        div.invoice-details {border: 0px solid #ccc;
              float: right;width: 201pt;margin: -16px 0px 47px;}
        div.clear-fix {clear:both;float:none;}
         
        table {width:100%;}
         
        th {text-align: left;}
         
        td {}
        .text-left {text-align:left;}
        .text-center {text-align:center;}
        .text-right {text-align:right;}

/* Add Animation */
@-webkit-keyframes animatetop {
    from {top:-300px; opacity:0} 
    to {top:0; opacity:1}
}

@keyframes animatetop {
    from {top:-300px; opacity:0}
    to {top:0; opacity:1}
}

/* The Close Button */
.close {
    color: white;
    float: right;
    font-size: 28px;
    font-weight: bold;
}

.close:hover,
.close:focus {
    color: #000;
    text-decoration: none;
    cursor: pointer;
}

.modal-header {
    padding: 2px 16px;
    background-color: #5cb85c;
    color: white;
}

.modal-body {padding: 2px 16px;}

.modal-footer {
    padding: 2px 16px;
    background-color: #5cb85c;
    color: white;
}

.showPopup{
  display: block;
}
.hidePopup{
  display: none;
}

/*popup*/
/* Popup container - can be anything you want */
.popup {
    position: relative;
    display: inline-block;
    cursor: pointer;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
}

/* The actual popup */
.popup .popuptext {
    visibility: hidden;
    width: 160px;
    background-color: #555;
    color: #fff;
    text-align: center;
    border-radius: 6px;
    padding: 8px 0;
    position: absolute;
    z-index: 1;
    bottom: 125%;
    left: 50%;
    margin-left: -80px;
}

/* Popup arrow */
.popup .popuptext::after {
    content: "";position: absolute;top: 100%;left: 50%;margin-left: -5px;border-width: 5px;border-style: solid;border-color: #555 transparent transparent transparent;
}

/* Toggle this class - hide and show the popup */
.popup .show {visibility: visible;-webkit-animation: fadeIn 1s;
    animation: fadeIn 1s;}
.hide{display: none;}
.show{display: block;}
/* Add animation (fade in the popup) */
@-webkit-keyframes fadeIn {
    from {opacity: 0;} 
    to {opacity: 1;}
}
@keyframes fadeIn {from {opacity: 0;}to {opacity:1 ;}
}
</style>
   </head>
   <body>
      <div id="app">
      <?php include('include/sidebar.php');?>
      <div class="app-content">
      <?php error_reporting(0);?>
      <header class="navbar navbar-default navbar-static-top">
         <!-- start: NAVBAR HEADER -->
         <div class="navbar-header">
            <a href="#" class="sidebar-mobile-toggler pull-left hidden-md hidden-lg" class="btn btn-navbar sidebar-toggle" data-toggle-class="app-slide-off" data-toggle-target="#app" data-toggle-click-outside="#sidebar">
            <i class="ti-align-justify"></i>
            </a>
            <a class="navbar-brand" href="dashboard.php">
               <h2 style="padding-top:2% ">HMS</h2>
            </a>
            <a href="#" class="sidebar-toggler pull-right visible-md visible-lg" data-toggle-class="app-sidebar-closed" data-toggle-target="#app">
            <i class="ti-align-justify"></i>
            </a>
            <a class="pull-right menu-toggler visible-xs-block" id="menu-toggler" data-toggle="collapse" href=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <i class="ti-view-grid"></i>
            </a>
         </div>
         <!-- end: NAVBAR HEADER -->
         <!-- start: NAVBAR COLLAPSE -->
         <div class="navbar-collapse collapse">
            <ul class="nav navbar-right">
               <!-- start: MESSAGES DROPDOWN -->
               <li  style="padding-top:2% ">
                  <h2>
                    <?php $sql_select=mysqli_query($con,"select * from setting where type='projectName'");
                    while($row=mysqli_fetch_array($sql_select)){
                    echo $row['name'];}?>
                  </h2>
               </li>
               <li class="dropdown current-user">
                  <a href class="dropdown-toggle" data-toggle="dropdown">
                  <img src="assets/images/avatar-1.jpg" alt="Peter"> <span class="username">
                  Admin
                  <i class="ti-angle-down"></i></i></span>
                  </a>
                  <ul class="dropdown-menu dropdown-dark">
                     <li>
                        <a href="change-password.php">
                        Change Password
                        </a>
                     </li>
                     <li>
                        <a href="logout.php">
                        Log Out
                        </a>
                     </li>
                  </ul>
               </li>
               <!-- end: USER OPTIONS DROPDOWN -->
            </ul>
            <!-- start: MENU TOGGLER FOR MOBILE DEVICES -->
            <div class="close-handle visible-xs-block menu-toggler" data-toggle="collapse" href=".navbar-collapse">
               <div class="arrow-left"></div>
               <div class="arrow-right"></div>
            </div>
            <!-- end: MENU TOGGLER FOR MOBILE DEVICES -->
         </div>
         <!-- end: NAVBAR COLLAPSE -->
      </header>
      <!-- end: TOP NAVBAR -->
      <div class="main-content" >
      <div class="wrap-content container" id="container">