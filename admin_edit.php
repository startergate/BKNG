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
            <a href='./function/logout.php' class='btn btn-link' id='white'>로그아웃</a>
          </div>
        </div>
      </div>
    </div>
    <div class="container-fluid" id="padding-generate-top">
      <div class="col-md-12">
        <form action="./function/pw_edit.php" method="post">
          <div class="form-group">
            <label for="form-title">현재 비밀번호</label>
            <input type="password" class="form-control" name="password_bef" id="form-title" placeholder="현재 비밀번호를 입력하세요.">
          </div>
          <div class="form-group">
            <label for="form-title">변경할 비밀번호</label>
            <input type="password" class="form-control" name="password_aft" id="form-title" placeholder="변경할 비밀번호를 입력하세요."></input>
          </div>
          <input type="submit" name="additional" value="적용" class="btn btn-default btn-lg">
        </form>
      </div>
    </div>
		<script src="/jquery/jquery-3.3.1.min.js"></script>
    <script src="/bootstrap/js/bootstrap.min.js"></script>
  </body>
</html>
