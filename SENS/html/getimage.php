<?php

  $id = $_GET['id'];
  // do some validation here to ensure id is safe

  $link = mysql_connect("localhost", "root", "");
  mysql_select_db("wad");
  $sql = "SELECT rimg FROM restaurant WHERE rid=$id";
  $result = mysql_query("$sql");
  $row = mysql_fetch_assoc($result);
  

  header("Content-type: image/jpeg");
  echo $row['rimg'];
?>