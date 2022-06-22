<?php
    session_start();
    function acakCaptcha() {
        $kode = "abcdefghijklmnopqrstuwxyzABCDEFGHIJKLMNOPQRSTUWXYZ0123456789";
    
        $pass = array(); 

        $panjangkode = strlen($kode) - 2; 
        for ($i = 0; $i < 5; $i++) {
            $n = rand(0, $panjangkode);
            $pass[] = $kode[$n];
        }
    
        return implode($pass); 
    }
    
    //hasil kode acak disimpan di $code
    $code = acakCaptcha();

    //kode acak disimpan di dalam session agar data dapat dipassing ke halaman lain
    $_SESSION["code"] = $code;
    
    

    //membuat background
    $width = 85; //Ukuran lebar
    $height = 35; //Tinggi
    $wh = imagecreate($width, $height);
    $bgc = imagecolorallocate($wh, 0, 0, 0);

    //menambahkan titik2 gambar / noise
    $bgR = mt_rand(100, 200); $bgG = mt_rand(100, 200); $bgB = mt_rand(100, 200);
    $noise_color = imagecolorallocate($wh, abs(255 - $bgR), abs(255 - $bgG), abs(255 - $bgB));
    for($i = 0; $i < ($width*$height) / 3; $i++) {
        imagefilledellipse($wh, mt_rand(0,$width), mt_rand(0,$height), 3, rand(2,5), $noise_color);
    }
    
    //membuat text warna 
    $fc = imagecolorallocate($wh, 240, 240, 240);
    $rand_x = rand(0, $width - 50);
    $rand_y = rand(0, $height - 15);
    
    imagestring($wh, 12, $rand_x, $rand_y, $code, $fc);

    //membuat gambar
    header('content-type: image/jpg');

    imagejpeg($wh);

    imagedestroy($wh);
?>