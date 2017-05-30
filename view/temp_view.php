<?php
/*Declaring start of the header*/ 
ob_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <link rel="icon" href="<?php echo "http://".$_SERVER['SERVER_NAME']?>/nissan/res/img/nissan_favicon.png">
  <link href="<?php echo "http://".$_SERVER['SERVER_NAME']?>/nissan/res/css/bootstrap.css" type="text/css" rel="stylesheet">
  <link href="<?php echo "http://".$_SERVER['SERVER_NAME']?>/nissan/res/css/navbar-fixed-side.css" type="text/css" rel="stylesheet">
  <link href="<?php echo "http://".$_SERVER['SERVER_NAME']?>/nissan/res/css/custom.css" type="text/css" rel="stylesheet">
  <script type="text/javascript" src="<?php echo "http://".$_SERVER['SERVER_NAME']?>/nissan/res/js/jquery-3.2.0.min.js"></script>
  <script type="text/javascript" src="<?php echo "http://".$_SERVER['SERVER_NAME']?>/nissan/res/js/bootstrap.js"></script>
  <script type="text/javascript" src="<?php echo "http://".$_SERVER['SERVER_NAME']?>/nissan/res/js/custom.js"></script>
  <title><?php  
    switch ($_SERVER['PHP_SELF']) {
      case '/nissan/index.php':
      echo "Nissan Home";
      break;
      case '/nissan/view/issues.php':
      echo "ERIC Issues";
      break;
      case '/nissan/view/inventory.php':
      echo "Inventory";
      break;
      case '/nissan/view/workstation.php':
      echo "Workstation";
      break;
      case '/nissan/view/employee.php':
      echo "Employees";
      default:
      echo "Nissan Home";
      break;
    }
    ?></title>
  </head>
  <body>
    <div class="outer-wrap">
      <header class="masthead">
        <div class="centered">
          <div class="site-title">
            <img src="<?php echo "http://".$_SERVER['SERVER_NAME']?>/nissan/res/img/nissan_logo_test.png" alt="">
            <span>IT Monitoring</span>
          </div><!-- .site-title -->
        </div><!-- .centered -->
        <div class="main-menu">
          <div class="nav-mixed menu">
            <nav id="multi-level-nav" class="multi-level-nav" role="navigation">
              <ul>
                <li><div class="dropdown"><a class="dropbtn" href="<?php echo "http://".$_SERVER['SERVER_NAME']?>/nissan/index.php">Home</a></div>
                </li>
                <li>
                  <div class="dropdown">
                    <a class="dropbtn" href="<?php echo "http://".$_SERVER['SERVER_NAME']?>/nissan/view/issues.php">
                      ERIC
                    </a>
                    <ul class="sub-menu">
                      <div class="dropdown-content">
                        <li><a href="#">List</a></li>
                        <li><a href="#">Users</a></li>
                      </div>
                    </ul>
                  </div>
                </li>
                <li>
                  <div class="dropdown">
                    <a class="dropbtn" href="<?php echo "http://".$_SERVER['SERVER_NAME']?>/nissan/view/inventory.php">
                      Inventory
                    </a>
                    <ul class="sub-menu">
                      <div class="dropdown-content">
                        <li><a href="<?php echo "http://".$_SERVER['SERVER_NAME']?>/nissan/view/inventory.php">List</a></li>
                        <li><a href="<?php echo "http://".$_SERVER['SERVER_NAME']?>/nissan/view/supplier.php">Suppliers</a></li>
                      </div>
                    </ul>
                  </div>
                </li>
                <li>
                  <div class="dropdown">
                    <a class="dropbtn" href="<?php echo "http://".$_SERVER['SERVER_NAME']?>/nissan/view/workstation.php">
                      Nissan
                    </a>
                    <ul class="sub-menu">
                      <div class="dropdown-content">
                        <li><a href="<?php echo "http://".$_SERVER['SERVER_NAME']?>/nissan/view/workstation.php">Workstation</a></li>
                        <li><a href="<?php echo "http://".$_SERVER['SERVER_NAME']?>/nissan/view/employee.php">Employees</a></li>
                      </div>
                    </ul>
                  </div>
                </li>
              </ul>
            </div><!-- .mixed-menu -->
            <!-- Search Box with AJAX Autocomplete Feature -->
            
            <?php 
            $self = $_SERVER['PHP_SELF'];
            $searchClass = ($self == '/nissan/view/issues.php') ? "search-issues" : (($self == '/nissan/view/inventory.php') ? "search-inventory" : (($self == '/nissan/view/workstation.php') ? "search-workstation"  : (($self == '/nissan/view/employee.php') ? "search-employee" : (($self == '/nissan/view/supplier.php') ? "search-supplier" : "search-nissan"))));
            ?>
            <div class='<?php echo "$searchClass"; ?>'>
              <form class="navbar-form" role="search">
                <div class="input-group add-on">
                  <input class="form-control" placeholder="Search" name="srch-term" id="srch-term" type="text" autocomplete="off">     
                  <div class="input-group-btn">
                    <button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
                  </div>
                </div>
              </form>
            </div><!-- search-box -->
          </div><!-- main-menu -->
        </header><!-- .masthead -->






            <div id="wrapper">
        <div class="overlay"></div>
    
        <!-- Sidebar -->
        <nav class="navbar navbar-inverse navbar-fixed-top" id="sidebar-wrapper" role="navigation">
            <ul class="nav sidebar-nav">
                <li class="sidebar-brand">
                    <a href="#">
                       Bootstrap 3
                    </a>
                </li>
                <li>
                    <a href="#"><i class="fa fa-fw fa-home"></i> Home</a>
                </li>
                <li>
                    <a href="#"><i class="fa fa-fw fa-folder"></i> Page one</a>
                </li>
                <li>
                    <a href="#"><i class="fa fa-fw fa-file-o"></i> Second page</a>
                </li>
                <li>
                    <a href="#"><i class="fa fa-fw fa-cog"></i> Third page</a>
                </li>
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-fw fa-plus"></i> Dropdown <span class="caret"></span></a>
                  <ul class="dropdown-menu" role="menu">
                    <li class="dropdown-header">Dropdown heading</li>
                    <li><a href="#">Action</a></li>
                    <li><a href="#">Another action</a></li>
                    <li><a href="#">Something else here</a></li>
                    <li><a href="#">Separated link</a></li>
                    <li><a href="#">One more separated link</a></li>
                  </ul>
                </li>
                <li>
                    <a href="#"><i class="fa fa-fw fa-bank"></i> Page four</a>
                </li>
                <li>
                    <a href="#"><i class="fa fa-fw fa-dropbox"></i> Page 5</a>
                </li>
                <li>
                    <a href="#"><i class="fa fa-fw fa-twitter"></i> Last page</a>
                </li>
            </ul>
        </nav>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper">
          <button type="button" class="hamburger is-closed animated fadeInLeft" data-toggle="offcanvas">
            <span class="hamb-top"></span>
            <span class="hamb-middle"></span>
            <span class="hamb-bottom"></span>
          </button>
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-lg-offset-2">
                        <h1 class="page-header">Awesome Bootstrap 3 Sidebar Navigation</h1>  
                        
                    </div>
                </div>
            </div>
        </div>
        <!-- /#page-content-wrapper -->

    </div>
    <!-- /#wrapper -->