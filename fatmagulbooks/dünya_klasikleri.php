<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DÜNYA KLASİKLERİ</title>
<link rel="stylesheet" href="css/style.css?v=<?php echo time(); ?>">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>
<body>
    <ul>
        <li><a href="index.php"><i class="fa-solid fa-house"></i>ANASAYFA</a></li>
        <li class="icerik-li">
            <a href="dünya_klasikleri.php"><i class="fa-solid fa-book"></i>İÇERİK</a>
            <div id="icerik">
                <ul>
                    <li style="display: block;"><a href="dünya_klasikleri.php">DÜNYA KLASİKLERİ</a></li>
                    <li style="display: block;"><a href="türkedebiyati.php">TÜRK EDEBİYATI</a></li>
                    <li style="display: block;"><a href="#">ÇOCUK KİTAPLARI</a></li>
                    <li style="display: block;"><a href="#">ŞİİR KİTAPLARI</a></li>
                </ul>
            </div>
         </li>
        <li><a href="iletisim.php"><i class="fa-solid fa-address-book"></i>İLETİŞİM</a></li>
        <li><a href="hakkimizda.php"><i class="fa-solid fa-eject"></i>HAKKIMIZDA</a></li>
        <?php
          if(@$_SESSION["kullanici_id"]!=null){
         echo "<li><a href='hesabim.php'><i class='fa-solid fa-user'></i></i>HESABIM</a></li>
           <li><a href='cikis.php'><i class='fa-solid fa-right-to-bracket'></i>ÇIKIŞ YAP</a></li> ";
        }
        else{
            echo " <li><a href='giris.php'><i class='fa-solid fa-right-to-bracket'></i>GİRİS YAP</a></li>";
        }
        ?> 
    </ul>
    <img class="icon" src="resimler/cicek.jpg" alt="resim">
    <div class="baslik"><p><i>DÜNYA KLASİKLERİ:</i></p></div>
    <?php
        $bag=mysqli_connect("localhost","root","","fatmagulbooks");
        $sorgu=mysqli_query($bag,"select * from urunler_tb");
        while($list=mysqli_fetch_array($sorgu)){
            echo "<div class='card-container'>
            <div  class='card'>
                <img  name='resimler'src='.../$list[urun_gorsel]'>
                <div class='card-content'>
                    <h3 name='urun_ad'>$list[urun_ad]</h3>
                    <p name='urun_aciklama'>$list[urun_aciklama]</p>
                     <p name='urun_fiyat'class='para'>FİYAT:$list[urun_fiyat]₺</p>
                     <a href='sipolustur.php' class='btn'>SATIN AL</a>
                    </div>
            </div>
        </div>";
        }
    ?>
   
   
</body>
</html>
