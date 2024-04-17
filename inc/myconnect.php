<?php
$conn=mysqli_connect("localhost","root","","ql_dong_ho");
// Check connection
if ($conn->connect_error)
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
  $conn->set_charset("utf8")
?>