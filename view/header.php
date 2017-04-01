<?php 
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
  <script type="text/javascript" src="<?php echo "http://".$_SERVER['SERVER_NAME']?>/nissan/res/js/interface.js"></script>
  <title>IT Monitoring</title>
</head>
<body>
  <div class="outer-wrap">
    <header class="masthead">
      <div class="centered">
        <div class="site-title">
          <!-- <h1 class="site-title">Nissan Distributors Inc.</h1> -->
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
          <div class="search-box">
            <form class="navbar-form" role="search">
              <div class="input-group add-on">
                <input class="form-control" placeholder="Search" name="srch-term" id="srch-term" type="text" autocomplete="off">
                
                <div class="input-group-btn">
                  <button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
                  
                </div>
              </div>
            </form>
            <div class="result"></div>
          </div>
        </div><!-- main-menu -->
      </header><!-- .masthead -->
      <script type="text/javascript">
        $(document).ready(function() {

          $('.search-box input[type="text"').on("keyup input", function() {
            /*Get input value on change*/
            var inputVal = $(this).val();
            var resultDropdown = $(".result");
            if (inputVal.length) {
              $.get("backend-search.php", {term: inputVal}).done(function(data) {
        // Display the return data in browser
        resultDropdown.html(data);
      }); 
            } else {
              resultDropdown.empty();
            }
          });

  // Set search input value on click of result item
  $(document).on("click", ".result p", function() {
    $(this).parents(".search-box").find('input[type="text"]').val($(this).text());
    $(this).parent(".result").empty();
  });
});
</script>