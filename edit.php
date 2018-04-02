<!DOCTYPE html>
<?php
  require("./config/config.php");
	require("./lib/db.php");
	require("./lib/adminchk.php");
	$conn = db_init($config["host"],$config["duser"],$config["dpw"],$config["dname"]);
  $pid = $_GET['user'];
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
          <a href="./admin.php" class='btn btn-link middle' id='white'>BKNG</a>
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
        <?php
          $sql = "SELECT name FROM account_data WHERE pid='".$pid."'";
          $result = mysqli_query($conn, $sql);
          $row = mysqli_fetch_assoc($result);
          $name = $row['name'];
          echo '<form action="./function/edit.php?user='.$pid.'" method="post">'
        ?>
          <div class="form-group">
            <label for="form-title">이름</label>
            <?php
              echo '<input type="text" class="form-control" name="name" id="form-title" placeholder='.$name.'>';
            ?>
          </div>
          <div class="form-group">
            <label for="form-title">변경할 금액</label>
            <input class="form-control" name="amount" id="form-title" placeholder="변경할 양을 적어주세요."></input>
          </div>
          <input type="submit" name="additional" value="적용" class="btn btn-default btn-lg">
        </form>
      </div>
    </div>
		<script src="/jquery/jquery-3.3.1.min.js"></script>
    <script src="/bootstrap/js/bootstrap.min.js"></script>
  </body>
</html>
