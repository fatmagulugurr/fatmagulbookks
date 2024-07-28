<?php
    @session_start();    
 ?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>FATMAGUL BOOKS</title> 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="css/style.css?v=<?php echo time(); ?>">
</head>
<body>
    <ul>
        <li><a href="index.php"><i class="fa-solid fa-house"></i>ANASAYFA</a></li>
        <li class="icerik-li">
            <a href="#"><i class="fa-solid fa-book"></i>İÇERİK</a>
            <div id="icerik">
                <ul>
                    <?php
                     $bag=mysqli_connect("localhost","root","","fatmagulbooks");
                     $kategorisor=mysqli_query($bag,"select*from kategoriler_tb");
                     while($listkategori=mysqli_fetch_array($kategorisor)){ 
                      echo "  <li style='display: block;'><a href='./kategoridetay.php?id=$listkategori[kategori_id]'>$listkategori[kategori_adi]</a></li>";
                    }
                    
                    ?>
                    
                 
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
    <div class="satanlar"><p><i>KİTAPLAR</i></p></div>
    <?php
    $detayid=$_GET["id"];
    $bag=mysqli_connect("localhost","root","","fatmagulbooks");
    $sorgu=mysqli_query($bag,"select * from urunler_tb where kategori_id=$detayid");
    while($liste=mysqli_fetch_array($sorgu)){   
    echo"<div class='card-container'>
    <div  class='card'>
        <img src='.../$liste[urun_gorsel]'>
        <div class='card-content'>
            <h3 name='urun_adi'>$liste[urun_ad]</h3>
            <p name='urun_aciklama'>$liste[urun_aciklama]</p>
             <p class='para'name='urun_fiyat'>FİYAT:$liste[urun_fiyat]₺ </p>";
             
if(@$_SESSION["kullanici_id"]!=null){
   echo " <a href='sipolustur.php?id=$liste[urun_id]' class='btn'>SATIN AL</a>";
 }
 else{
  echo"SATIN ALMA İŞLEMİ İÇİN LÜTFEN GİRİŞ YAPINIZ.";
 }

           echo"
            </div>
    </div>
</div>";
}
    ?>
    


</body>
</html>
