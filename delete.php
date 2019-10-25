<?php

include 'con.php';

$id = $_GET['id'];

$q = " DELETE FROM `office` WHERE id = $id ";

if(mysqli_query($con, $q));

header('location:index.php');

?>