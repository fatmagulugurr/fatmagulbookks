<?php
@session_start();
$yt= $_SESSION["yonetici_adi"];

if($yt == null){
    header("location: giris.php");
}

$kullanici_id=$_GET["id"];
 $baglan=mysqli_connect("localhost","root","","fatmagulbooks");
 $sorgu=mysqli_query($baglan,"update kullanicilar_tb set aktiflik=1 where kullanici_id=$kullanici_id ");
 if($sorgu){
    header("location:./listeleme.php");
 }
?>