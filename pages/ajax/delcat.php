<?php
include('../db.php');
$imgid = $_GET['bid'];
$dquery = $conn->query("select `fname` from `stkfiles` where `fid`='$imgid'");
list($name) = $dquery->fetch_row();
$file = "../../upload/$name";
unlink($file);
$subquery = "delete from `stkfiles` where `fid`='$imgid'";
$result = $conn->query($subquery);
?>