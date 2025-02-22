<?php
include("../dbcon.php");
$id=$_GET["id"];
$query="DELETE FROM `students` WHERE id=$id";
$result=$conn->query($query);
$result->execute();
header("location:view.php");
?>