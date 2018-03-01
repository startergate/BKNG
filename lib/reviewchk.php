<?php
  ob_start();
  session_start();
  if (empty($_SESSION['access'])) {
    echo "<script>window.alert('비정상적인 접근입니다.');</script>";
    echo "<script>window.location=('./index.php');</script>";
  exit;
  }
?>
