<?php
	require('../config/config.php');	//Server Config Data
	require('../lib/db.php');	//DB Library
	session_start();

		$pw_temp = $_POST['pw'];
		$pw = hash("sha256",$pw_temp);
		$conn = db_init($config["host"],$config["duser"],$config["dpw"],$config["dname"]);
		$result = mysqli_query($conn, "SELECT * FROM hash_data");
		$db = "admin_pw";

		$sql = "SELECT hash FROM hash_data WHERE name LIKE '$db'";
		$result = mysqli_query($conn, $sql);
		$row = mysqli_fetch_assoc($result);
		$hash = $row['hash'];

		if ($pw === $hash) {
			$_SESSION['access'] = "admin_review";
			header('Location: ../review.php?ihash='.$_GET['ihash']);
			exit;
	 	} else {
			echo "<script>window.alert('틀린 비밀번호를 입력하셨습니다.');</script>";	//Wrong Password Entered
			echo "<script>window.location=('../review-login.php?ihash=".$_GET['ihash']."');</script>";
		}
?>
