<?php
  // connect to db
  $cnx = mysqli_connect("localhost","root","root","snow");
  if (mysqli_connect_errno()) {
    die("Cannot connect: ".mysqli_connect_error());
  }
?>