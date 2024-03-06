<?php

require "../config.php";
$id = $_GET["id"];

$query = "DELETE FROM mata_kuliah WHERE id=$id";

$edit = mysqli_query($connect, $query);

header("location:index.php");

?>