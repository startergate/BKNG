<?php
	require('../config/config.php');
	require('../lib/db.php');
	session_start();

	if ($_POST['confirm_login']) {
		if (!empty($_POST['pw'])) {
			$pw_temp = $_POST['pw'];

			$pw = hash("sha256",$pw_temp);
			$conn = db_init($config["host"],$config["duser"],$config["dpw"],$config["dname"]);
			$result = mysqli_query($conn, "SELECT * FROM hash_data");
			$db = "admin_pw";

			$sql = "SELECT hash FROM hash_data WHERE name LIKE '$db'";	//user data select
		  $result = mysqli_query($conn, $sql);
			$row = mysqli_fetch_assoc($result);
			$hash = $row['hash'];

		  if ($pw === $hash) {
				$_SESSION['access'] = "admin_togo";
				header('Location: ../admin.php');
		  } else {
				echo $hash;
				echo "<br />";
				echo $pw;
				echo "<br />";
				echo $sql;
				//echo "<script>window.alert('틀린 비밀번호를 입력하셨습니다.');</script>";
				//echo "<script>window.location=('../admin-login.php');</script>";
			}
		} else {
			echo "<script>window.alert('비밀번호가 입력되지 않았습니다.');</script>";
	    echo "<script>window.location=('../register.php');</script>";
	    exit;
		}
	} else {
		header('Location: ./error_confirm.php');
		exit;
	}
?>
