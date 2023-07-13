<?php

require_once './dbcon.php';

//$Id = (isset($_GET['Id']) ? $_GET['Id'] : '');


$id = $_GET['id'];

//$id = isset($_GET['Id']) ? $_GET['Id'] : '';



mysqli_query($link, "DELETE FROM `users_info` WHERE `Id` = '$id'");

header("location: index.php");


 ?>
