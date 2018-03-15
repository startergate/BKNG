<?php
  require("../config/config_root.php");
  require("../lib/db.php");
  require("../lib/adminchk2.php");
  $conn = db_init($config["host"],$config["duser"],$config["dpw"],$config["dname"]);
  $sql = "SELECT hash FROM hash_data WHERE name LIKE 'admin_pw'";
  $result = mysqli_query($conn, $sql);
  $row = mysqli_fetch_assoc($result);
  $conn = db_init($config["host"],$config["duser"],$config["dpw"],$config["dname"]);
  $pbf = $_POST['password_bef'];
  $paf = $_POST['password_aft'];
  $pbf_hash = hash("sha256",$pbf);
  $paf_hash = hash("sha256",$paf);
  if (empty($pbf)) {
    echo "<script>window.alert('이전 비밀번호가 입력되지 않았습니다.');</script>";
    echo "<script>window.location=('../admin_edit.php');</script>";
    exit;
  }
  if (empty($paf)) {
    echo "<script>window.alert('변경할 비밀번호가 입력되지 않았습니다.');</script>";
    echo "<script>window.location=('../admin_edit.php');</script>";
    exit;
  }

  if ($row['hash'] === $pbf_hash) {
    $sql = "UPDATE hash_data SET hash='$paf_hash' WHERE name='admin_pw'";
    $result = mysqli_query($conn, $sql);
    header('Location: ./comp_ch.php');
  } else {
    echo $row['hash'];
    echo ";표시됨";
    //echo "<script>window.alert('비밀번호가 틀렸습니다.');</script>";
    //echo "<script>window.location=('../admin_edit.php');</script>";
    exit;
  }
?>
