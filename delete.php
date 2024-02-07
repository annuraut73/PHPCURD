<?php
include 'conn.php';
$no = $_GET['no'];
$q="delete from `item` WHERE no=$no";
$res = mysqli_query($con,$q);
header('location:display.php');
?>



