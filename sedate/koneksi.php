<?php 

$koneksi = mysqli_connect("localhost", "root", "" ,"project_tokoonline");
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    die();
}
date_default_timezone_set('Asia/Jakarta');
$error = "";
?>