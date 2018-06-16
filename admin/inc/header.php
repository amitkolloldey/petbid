<?php 
include('./lib/Session.php');
include('./lib/Database.php');
include('./lib/functions.php');
include('./helpers/Format.php'); 
Session::checkSession();
$db = new Database(); 
$fd = new Format(); 

?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Admin | <?php $query = "SELECT site_name FROM site_settings WHERE id='1'"; $select = $db->select($query); if($select){while($row = $select->fetch_assoc()){echo $row['site_name'];}}?></title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="//cdn.datatables.net/1.10.15/css/dataTables.bootstrap4.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
  <link rel="stylesheet" href="dist/css/style.css">
   
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
<style>
 
.ui-datepicker.ui-widget.ui-widget-content.ui-helper-clearfix.ui-corner-all {
    background: #fff none repeat scroll 0 0; 
    padding: 10px;
    text-align: center;
    width: 200px !important; 
}
table.ui-datepicker-calendar {
    width: 100%;
}
.ui-corner-all {
    cursor: pointer;
    font-weight: bold;
    padding: 0 20px;
}
    
</style>   
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="index.php" class="logo"> 
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b><?php $query = "SELECT site_name FROM site_settings WHERE id='1'"; $select = $db->select($query); if($select){while($row = $select->fetch_assoc()){echo $row['site_name'];}}?></b></span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav"> 
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <?php if (Session::get('login')): ?>  
              <img src="./<?php echo Session::get('image'); ?>" class="user-image" alt="User Image">
              <span class="hidden-xs"><?php echo Session::get('name'); ?></span>
            <?php endif ?>
            </a> 
          </li>
          <!-- Control Sidebar Toggle Button -->
          <li> 
            <a href="?action=logout" onclick="return confirm('Are You Sure You Want To Logout?');"><i class="fa fa-sign-out"></i></a>
            <?php if(isset($_GET['action']) && $_GET['action'] == "logout"){
                Session::destroy(); 
            }?>             
          </li>
        </ul>
      </div>
    </nav>
  </header>