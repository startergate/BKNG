<!DOCTYPE html>
<?php
  require("./config/config_root.php");
	require("./lib/db.php");
	require("./lib/reviewchk.php");

  $ihash = $_GET['ihash'];
?>
<html>
  <head>
    <meta charset="utf-8">
    <title>BKNG</title>
    <link href="/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  	<link rel="stylesheet" type="text/css" href="./css/style.css?v=9">
    <link rel="stylesheet" type="text/css" href="./css/bg_style.css?v=1">
  	<link rel="stylesheet" type="text/css" href="./css/master.css">
  	<link rel="stylesheet" type="text/css" href="./css/review.css">
  	<link rel="stylesheet" type="text/css" href="/Normalize.css">
    <script src="/bootstrap/js/bootstrap.min.js"></script>
  </head>
  <body>
    <div class="container-fluid" id='padding-erase'>
      <div id="bgi">
        <div class="col-md-3">
          <a href="./index.php" class='btn btn-link middle' id='white'>BKNG</a>
        </div>
        <div class="col-md-9">
          <div class="text-right">
            <a href='./admin-login.php' class='btn btn-link' id='white'>관리자 모드로 전환</a>
          </div>
        </div>
      </div>
    </div>
    <div class="container" id="padding-generate-top">
      <div class="col-md-12">
        <div class="text-center margin-generate">
          <?php
            echo '<h2>거래를 되돌리시겠습니까?</h2>';
            echo "<br />";
            echo "<form class='margin_42_gen' action='./function/revert.php?ihash=".$ihash."' method='post'>";
            echo "<input type='submit' name='confirm_revert' class='btn btn-danger btn-lg' value='확인!'>";
            echo "<a href='./review.php?ihash=".$ihash."' class='btn btn-success btn-lg'>취소!</a>";
            echo "</form>"
          ?>
        </div>
      </div>
    </div>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="/bootstrap/js/bootstrap.min.js"></script>
  </body>
</html>
