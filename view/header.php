<?php
/*Declaring start of the header*/ 
ob_start();

@session_start();


  //Autoloads class from the system

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <link rel="icon" href="<?php echo "http://".$_SERVER['SERVER_NAME']?>/nissan/res/img/nissan_favicon.png">
  <link href="<?php echo "http://".$_SERVER['SERVER_NAME']?>/nissan/res/css/bootstrap.css" type="text/css" rel="stylesheet">
  <link href="<?php echo "http://".$_SERVER['SERVER_NAME']?>/nissan/res/css/navbar-fixed-side.css" type="text/css" rel="stylesheet">
  <link href="<?php echo "http://".$_SERVER['SERVER_NAME']?>/nissan/res/css/custom.css" type="text/css" rel="stylesheet">
  <!--   <link href="<?php //echo "http://".$_SERVER['SERVER_NAME']?>/nissan/res/css/inventory.css" type="text/css" rel="stylesheet"> -->
  <script type="text/javascript" src="<?php echo "http://".$_SERVER['SERVER_NAME']?>/nissan/res/js/jquery-3.2.0.min.js"></script>
  <script type="text/javascript" src="<?php echo "http://".$_SERVER['SERVER_NAME']?>/nissan/res/js/bootstrap.js"></script>
  <script type="text/javascript" src="<?php echo "http://".$_SERVER['SERVER_NAME']?>/nissan/res/js/custom.js"></script>
  <!--  <script src="https://cdnjs.cloudflare.com/ajax/libs/prefixfree/1.0.7/prefixfree.min.js"></script> -->
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
    <main class="#">
      <header class="masthead">
        <div class="centered">
          <div class="site-title">
            <img src="<?php echo "http://".$_SERVER['SERVER_NAME']?>/nissan/res/img/nissan_logo_test.png" alt="">
            <span>IT Monitoring</span>
          </div><!-- .site-title -->
          <div class="user-profile">
            <?php 

            $id =  $_SESSION['user_session'];
            $admin = '';
            $host = 'localhost';
            $user = 'root';
            $db = 'nissan';
            $pass = '';
            try {
              $conn = new PDO('mysql:host='.$host.';dbname='.$db,$user,$pass);
            } catch(PDOException $e) {

              echo $e->getMessage();
            }

            $sql = "SELECT * FROM employee WHERE id = :id";
            $q = $conn->prepare($sql);
            $q->execute(array(':id' => $id));

            while($r = $q->fetch(PDO::FETCH_ASSOC)) {
              $data[] = $r;
            } 
            foreach($data as $r) {
              echo "<h5>".$r['f_name']."</h5><span>".($r['admin'] == 1 ? "Admin" : " ")."</span>";
              $admin .= $r['admin'];
            }

            $sql = "SELECT * FROM employee_logs WHERE employee_id = :employee_id
            ORDER BY log_in DESC
            LIMIT 1";

            $q = $conn->prepare($sql);
            $q->execute(array(':employee_id' => $id));

            while($rx = $q->fetch(PDO::FETCH_ASSOC)) {
              $data[] = $rx;
            }
            echo "<h5> Last Login: ";
            foreach($data as $rx) {
              echo @$rx['log_in'];
              
            }
            echo "<h5>";
            ?>
          </div>
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
            </nav>
          </div><!-- .mixed-menu -->
          <!-- Search Box with AJAX Autocomplete Feature -->
          
          <?php 
          $self = $_SERVER['PHP_SELF'];
          $searchClass = ($self == '/nissan/view/issues.php') ? "search-issues" : (($self == '/nissan/view/inventory.php') ? "search-inventory" : (($self == '/nissan/view/workstation.php') ? "search-workstation"  : (($self == '/nissan/view/employee.php') ? "search-employee" : (($self == '/nissan/view/supplier.php') ? "search-supplier" : "search-nissan"))));
          ?>
          <div class='<?php echo "$searchClass"; ?>'>
            <form class="navbar-form" role="search" action="<?php echo "http://".$_SERVER['SERVER_NAME']?>/nissan/view/logout.php"">
              <div class="input-group add-on">
                <input class="form-control" placeholder="Search" type="text" autocomplete="off">     
                <div class="input-group-btn">
                  <button class="btn btn-default" type="submit" disabled=""><i class="glyphicon glyphicon-search"></i></button>
                  <button class="btn btn-danger" type="submit"><i class="glyphicon glyphicon-log-out"></i>&nbsp;LOGOUT</button>
                </div>
              </div>
            </form>
            
          </div><!-- search-box -->
        </div><!-- main-menu -->
      </header><!-- .masthead -->
      <!-- Side Nav -->
      <!-- <section class="pdsa-sn-wrapper"> -->
        <!-- <ul id="sideNavParent">
          <li>
            <a href="Default.html">
              <span class="hidden-xs">Home</span>
              <i class="glyphicon glyphicon-home visible-xs"></i>
            </a>
          </li>
          ERIC
          <li>
            <a href="#"
            data-toggle="collapse"
            data-target="#ulERIC">
            <span class="hidden-xs">
              ERIC&nbsp;<b class="caret"></b>
            </span>
            <i class="glyphicon glyphicon-globe visible-xs"></i>
          </a>
          <div class="hidden-xs">
            <ul id="ulERIC" class="collapse" data-parent="#sideNavParent">
              <li>
                <a href="#">Issues</a>
              </li>
              <li>
                <a href="#">Jupiter Systems</a>
              </li>
              <li>
                <a href="#">Updates</a>
              </li>
            </ul>
          </div>
        </li>
        Inventory
        <li>
          <a href="#"
          data-toggle="collapse"
          data-target="#ulInventory">
          <span class="hidden-xs">
            Inventory&nbsp;<b class="caret"></b>
          </span>
          <i class="glyphicon glyphicon-list-alt visible-xs"></i>
        </a>
        <div class="hidden-xs">
          <ul id="ulInventory" class="collapse" data-parent="#sideNavParent">
            <li>
              <a href="#">List</a>
            </li>
            <li>
              <a href="#">Suppliers</a>
            </li>
          </ul>
        </div>
              </li>
              Nissan
              <li>
        <a href="#"
        data-toggle="collapse"
        data-target="#ulNissan">
        <span class="hidden-xs">
          Nissan&nbsp;<b class="caret"></b>
        </span>
        <i class="glyphicon glyphicon-list-alt visible-xs"></i>
              </a>
              <div class="hidden-xs">
        <ul id="ulNissan" class="collapse" data-parent="#sideNavParent">
          <li>
            <a href="#">Employees</a>
          </li>
          <li>
            <a href="#">Workstations</a>
          </li>
        </ul>
              </div>
            </li>
          </ul> -->
          <!-- </section> -->
          <!-- Main View -->
          <section class="#">
            <input type="hidden" id="sort" value="asc">
            <table id="mainTable" class="result well table-hover table-custom ">

