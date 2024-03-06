<?php

require "../config.php";
$id = $_GET["id"];

$query = "DELETE FROM pengajar WHERE id=$id";

$edit = mysqli_query($connect, $query);

header("location:index.php");

?>