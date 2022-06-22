<?php
include('koneksi.php');
$name = $_POST['name'];
$email = $_POST['email'];
$message = $_POST['message'];

$input = mysqli_query($koneksi, "INSERT INTO contactus (name,email,message,created_date) VALUES('" . $name . "','" . $email . "','" . $message . "','" . date('Y-m-d') . "')");
if(!$input ){
    echo "<script>alert('Tidak bisa mengirim pesan');window.location='index.php'</script>";
    } else{
    echo "<script>alert('Terimakasih telah mengirim kami pesan');window.location='index.php'</script>";
    }
?>