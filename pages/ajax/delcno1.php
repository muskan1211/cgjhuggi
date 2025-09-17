<?php
include('../db.php');
$id = $_GET['id'];
$subquery = "delete from `capitalft2` where `cid`='$id'";
$result = $conn->query($subquery);
?>