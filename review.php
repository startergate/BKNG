<!DOCTYPE html>
<?php
  require("./config/config_root.php");
	require("./lib/db.php");
	require("./lib/reviewchk.php");

  $ihash = $_GET['ihash'];
	$conn = db_init($config["host"],$config["duser"],$config["dpw"],$config["dname"]);
  $result = mysqli_query($conn, "SELECT name FROM hash_data WHERE hash LIKE '".$ihash."'");
  $row = mysqli_fetch_assoc($result);
  $data = explode("_", $row['name']);
  $pid = $data[2];

  $result = mysqli_query($conn, "SELECT amount, edittime, status FROM ".$pid."_data WHERE hash LIKE '".$ihash."'");
  $row = mysqli_fetch_assoc($result);
  $amount = $row['amount'];
  $time = $row['edittime'];
  $status = $row['status'];

  $result = mysqli_query($conn, "SELECT name FROM account_data WHERE pid LIKE '".$pid."'");
  $row = mysqli_fetch_assoc($result);
  $name = $row['name'];
?>
<html>
  <head>
    <meta charset="utf-8">
    <title>BKNG</title>
    <link href="/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  	<link rel="stylesheet" type="text/css" href="./css/style.css?v=8">
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
    <div class="container-fluid" id="padding-generate-top">
      <div class="col-md-12">
        <div class="title">거래 정보</div>
        <br />
        <div class="review-margin-minus">
          <?php
            echo $name."님의 거래 로그입니다.";
          ?>
        </div>
        <br />
        <div class="text">거래 일시: <?php echo $time; ?></div>
        <br />
        <div class="text">거래 금액: <?php echo $amount."원"; ?></div>
        <?php if (!empty($status)) {
          echo '<br />';
          echo "최초 거래입니다.";
        } ?>
        <br />
        <?php
          echo "<br />";
          echo "<a href='./revert.php?ihash=".$ihash."' class='btn btn-danger btn-lg'>거래 취소</a>";
        ?>
      </div>
    </div>
		<script src="/jquery/jquery-3.3.1.min.js"></script>
    <script src="/bootstrap/js/bootstrap.min.js"></script>
  </body>
</html>
