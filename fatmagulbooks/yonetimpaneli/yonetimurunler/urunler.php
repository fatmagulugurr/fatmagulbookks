<?php
@session_start();
$yt= $_SESSION["yonetici_adi"];

if($yt == null){
    header("location: giris.php");
}

?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="css1/yonetim.css">
    <title>ÜRÜNLER</title>
</head>
<style>
    .ud{
        text-decoration:none;
        border-style:solid;
        margin-top:0px;
        color:black;
        border-radius:0px;
        border-color: rgb(229, 235, 200);
        font-style:italic;
    }
    .udd{
        text-decoration:none;
        border-style:solid;
        color:black;
        border-radius:0px;
        border-color: rgb(229, 235, 200);
        font-style:italic;
        text-align:center;
        height:20px;
        margin-left:30px;
    }
</style>
<body>
<ul>
<li><a href="../index.php"><i class="fa-solid fa-house"></i>ANASAYFA</a></li>
        <li><a href="../siparis.php"><i class="fa-solid fa-cart-plus"></i></i>SİPARİŞLER</a></li>
        <li><a href="../iletisim.php"><i class="fa-solid fa-address-book"></i>İLETİŞİM</a></li>
        <li><a href="../yonetimurunler/urunler.php"><i class="fa-solid fa-landmark"></i>ÜRÜNLER</a></li>
        <li><a href="../listeleme.php"><i class="fa-solid fa-list"></i>KULLANICILAR</a></li>
        <li><a href='cikis.php'><i class='fa-solid fa-right-to-bracket'></i>ÇIKIŞ YAP</a></li>

    </ul>
    <img class="icon" src="resimler/cicek.jpg" alt="resim">
    <div class="satanlar"><p><i>URUNLER</i></p></div>
    <p style="font-size:large;">ÜRÜN EKLEMEK İSTERSENİZ LİNKE TIKLAYINIZ.</p>
    <a href="../yonetimurunler/urunekle.php" style="color:black; font-size: medium;font-style: italic;width:10px;height: 50px;border-radius: 5px; padding-top:10px; margin-top:1000px; margin-left:50px;  background-color:  aliceblue; text-decoration:none; font-size:x-large;">URUN EKLE</a>
    <table border="1"  style="padding:2px; margin-left:10px; margin-top:50px; width:1400px; border-radius:5px; "> 
        <tr style="margin-top:50px; height:20px; text-align:center; width:300px; text-shadow: 0 3px 6px rgba(0,0,0,0.16),0 3px 6px rgba(0,0,0,0.23) ; background-color: aliceblue;">
        <th>URUN İD:</th>
        <th>URUN ADI:</th>
        <th>URUN ADETİ:</th>
        <th>URUN FİYAT:</th>
        <th>URUN GÖRSEL:</th>
        <th>URUN AÇIKLAMA:</th>
        <th>İSLEM </th>

    </tr>
    <?php
    $bag=mysqli_connect("localhost","root","","fatmagulbooks");
    $sorgu=mysqli_query($bag,"select * from urunler_tb");
    while($list=mysqli_fetch_array($sorgu)){
        echo "<tr>
        <td>$list[urun_id]</td>
        <td>$list[urun_ad]</td>
        <td>$list[urun_adet]</td>
        <td>$list[urun_fiyat]</td>
        <td>$list[urun_gorsel]</td>
        <td>$list[urun_aciklama]</td>
        
        <td><a href='../yonetimurunler/urunduzenle.php?id=$list[urun_id]'class='ud'>DÜZENLE</a>
        <a href='../yonetimurunler/urunsil.php?id=$list[urun_id]'class='udd'>SİL</a>
        </td>
        </tr>";

    }
    /* urun adetten her alınan ürün için eksilterek güncelleme yapsın 
    $stokadet=mysqli_query($bag,"update urunler_tb set urun_adet=urun_adet-$list[urun_fiyat] ");
*/
    ?>
</table>
</body>
</html>