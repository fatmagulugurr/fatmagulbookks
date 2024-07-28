<?php
@session_start();
$yt= $_SESSION["yonetici_adi"];

if($yt == null){
    header("location: giris.php");
}

?>
<?php
$duzenleid=$_GET["id"];
$bag=mysqli_connect("localhost","root","","fatmagulbooks");
           $kaydet=mysqli_query($bag,"delete from urunler_tb where urun_id=$duzenleid");
            if($kaydet){
                echo "<b>ÜRÜN SİLİNDİ</b>";
                header("location:../yonetimurunler/urunler.php");
            }
            else{
                echo "<b>ÜRÜN SİLİNENMEDİ</b>";
            }
   

?>
 
