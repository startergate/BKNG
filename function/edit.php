<?php
  require("../config/config_root.php");
  require("../lib/db.php");
  require("../lib/adminchk2.php");
  $pid = $_GET['user'];
  $conn = db_init($config["host"],$config["duser"],$config["dpw"],$config["dname"]);

  if (!empty($_POST['name'])) {
    $name = $_POST['name'];
    $sql = "UPDATE account_data SET name='$name' WHERE pid='$pid'";
    $result = mysqli_query($conn, $sql);
  }

  if (!empty($_POST['amount'])) {
    $change_amount = $_POST['amount'];
    $udb = $pid.'_data';

    $sql = "SELECT value FROM account_data WHERE pid='$pid'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    $now_amount = $row['value'];

    $amount = $now_amount+$change_amount;
    $sql = "UPDATE account_data SET value='$amount' WHERE pid='$pid'";
    $result = mysqli_query($conn, $sql);

    $sql = "INSERT INTO $udb (amount,edittime,hash) VALUES ('$change_amount',now(),'temp')";
    $result = mysqli_query($conn, $sql);

    $sql = "SELECT amount,edittime FROM $udb WHERE hash='temp'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    $hash1 = $row['amount'];
    $hash2 = $row['edittime'];
    $hash3 = $hash1.$hash2;
    $hash4 = hash("sha256",$hash3);

    $sql = "UPDATE $udb SET hash='$hash4' WHERE hash='temp'";
    $result = mysqli_query($conn, $sql);

    $hash_name = $hash2."_edit_".$pid;
    $sql = "INSERT INTO hash_data (hash,name) VALUES ('$hash4','$hash_name')";
    $result = mysqli_query($conn, $sql);

    echo $change_amount;
    echo '<br />1';
    echo $now_amount;
    echo '<br />2';
    echo $amount;
    //echo "<script>window.alert('수정이 완료되었습니다..');</script>";
    //echo "<script>window.location=('../admin.php');</script>";
    //exit;
  } else {
    echo "<script>window.alert('값이 입력되지 않았습니다.');</script>";
    echo "<script>window.location=('../edit.php?user=".$_GET['user']."');</script>";
    exit;
  }
?>
