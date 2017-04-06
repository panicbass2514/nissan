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
                        <li><a href="#">Subitem</a></li>
                        <li><a href="#">Subitem</a></li>
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
                        <li><a href="#">Subitem</a></li>
                        <li><a href="#">Subitem</a></li>
                      </div>
                    </ul>
                  </div>
                </li>
                <li>
                  <div class="dropdown">
                    <a class="dropbtn" href="<?php echo "http://".$_SERVER['SERVER_NAME']?>/nissan/view/workstation.php">
                      Workstation
                    </a>
                    <ul class="sub-menu">
                      <div class="dropdown-content">
                        <li><a href="#">Subitem</a></li>
                        <li><a href="#">Subitem</a></li>
                      </div>
                    </ul>
                  </div>
                </li>
              </ul>
            </div><!-- .mixed-menu -->
            <!-- Search Box with AJAX Autocomplete Feature -->
            <div class="search-box">
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
        <!-- <main class="div-center "> -->
        <table class="result well table-hover table-custom table-bordered">