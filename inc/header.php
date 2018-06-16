<?php
include('lib/Session.php');
include('lib/Database.php');
include('helpers/Format.php');
$fd = new Format();
$db = new Database();
Session::checkLogin();

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <title><?php $query = "SELECT site_name FROM site_settings WHERE id='1'"; $select = $db->select($query); if($select){while($row = $select->fetch_assoc()){echo $row['site_name'];}}?></title>
        <!-- Bootstrap -->
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
        <link href="css/jquery.bxslider.min.css" rel="stylesheet">
        <!-- Font Awesome -->
        <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
        <link rel="stylesheet" href="//cdn.datatables.net/1.10.15/css/dataTables.bootstrap4.min.css">
        <!-- Fonts -->
        <link href="//fonts.googleapis.com/css?family=Roboto:400,500,700,700i" rel="stylesheet">
        <!-- Custom CSS-->
        <link href="css/style.css" rel="stylesheet" type="text/css"/>

        
        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
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
    <body>
        <!--- Top Header -->
        <header>
            <div class="container">
                <div class="row top-header">
                    <div class="col-md-3">
                        <div class="logo">
                            <h1 class="pull-left"><a href="index.php"><?php $query = "SELECT site_name FROM site_settings WHERE id='1'"; $select = $db->select($query); if($select){while($row = $select->fetch_assoc()){echo $row['site_name'];}}?></a>
                            </h1>
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="input-group pet-search">
                            <form class="navbar-form search-form" action="search.php" method="get">
                                <input class="form-control" type="text" name="search" placeholder="Search keyword..."/>
                                <input type="submit" class="btn btn-default" name="submit" value="Search"/>
                            </form>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="sign-in-form">
                            <?php if (Session::get('ulogin')): ?>
                            
                            <div class="dropdown">
                                <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Hello <img src="<?php echo Session::get('image'); ?>"><?php echo Session::get('name'); ?>
                                <span class="caret"></span></button>
                                <ul class="dropdown-menu">
                                    <li><a href="myaccount.php">My Account</a></li> 
                                    <li><a href="mypets.php">My Pets</a></li>
                                    <li><a href="myarticles.php">My Articles</a></li>
                                    <li><a href="mybids.php">My Bids</a></li>
                                    <li><a href="myaccount.php">Edit Account</a></li>
                                    <li class="divider"></li>
                                    <li>
                                        <a href="?<?php echo $_SERVER['QUERY_STRING']; ?>&action=logout" onclick="return confirm('Are You Sure You Want To Logout?');"><i class="fa fa-sign-out"></i> Logout</a>
                                        <?php if(isset($_GET['action']) && $_GET['action'] == "logout"){
                                        Session::destroy();
                                        echo "<script>window.location.assign('/pet-bid/index.php')</script>";
                                        }?>
                                    </li>
                                </ul>
                            </div>
                            <?php else: ?>
                            <a href="#loginbox" data-toggle="modal" data-target="#loginbox"> Login</a>
                            <a href="#registerbox" data-toggle="modal" data-target="#registerbox"> Register</a>
                            <?php endif ?>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!--- Header Bottom Section -->
        <section id="header-bottom">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <?php if($select){?>
                        <div class="dropdown">
                            <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true">
                            Category
                            <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenu2">
                                <?php 
                                    $query = "SELECT * FROM pet_categories";
                                    $select = $db->select($query);
                                while($row = $select->fetch_assoc()){
                                ?>
                                <li><a href="category.php?id=<?php echo urlencode($row['id']);?>"><?php echo $row['name'];?></a></li>
                                <?php } ?>
                            </ul>
                        </div>
                        <?php } ?>
                        <div class="pet-bid-menu pull-left">
                            <ul class="list-inline list-unstyle">
                                <li><a href="todays_deal.php">Today's Deal</a></li>

                                <li><a href="about.php">About</a></li>  
                                
                                <li><a href="blog.php">Blog</a></li>

                                <li><a href="help.php">Help</a></li>

                                <li><a href="Contact.php">Contact</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>