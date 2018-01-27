<?php
  $hash = hash("sha256",$_POST['text']);
  echo($hash);
?>
