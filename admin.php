<!DOCTYPE html>
<?php
  require("./config/config.php");
	require("./lib/db.php");
	require("./lib/adminchk.php");
	$conn = db_init($config["host"],$config["duser"],$config["dpw"],$config["dname"]);
  $result = mysqli_query($conn, "SELECT * FROM account_data");
?>
<html>
  <head>
    <meta charset="utf-8">
    <title>BKNG</title>
    <link href="/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  	<link rel="stylesheet" type="text/css" href="./css/style.css?v=5">
    <link rel="stylesheet" type="text/css" href="./css/bg_style.css?v=1">
  	<link rel="stylesheet" type="text/css" href="./css/master.css">
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
            <a href='./admin_edit.php' class='btn btn-link' id='white'>정보 변경</a>
            <a href='./function/logout.php' class='btn btn-link' id='white'>로그아웃</a>
          </div>
        </div>
      </div>
    </div>
    <div class="container-fluid" id="padding-generate-top">
      <div class="col-md-12">
        <ol class="nav" nav-stacked="" nav-pills="">
          <?php
            while ($row = mysqli_fetch_assoc($result)) {
              echo '<li><a href="./edit.php?user='.$row['pid'].'">'.$row['name']."<div class='text-right'>".$row["value"]."원</div>".'</li></a>'."\n";
              echo "<hr>";
            }
          ?>
          <li><a href="./add_creature.php">생명체 추가하기</li></a>
        </ol>
      </div>
    </div>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="/bootstrap/js/bootstrap.min.js"></script>
  </body>
</html>
