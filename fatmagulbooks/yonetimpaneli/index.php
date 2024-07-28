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
    <title>YONETİCİ PANELİ</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="css1/yonetim.css">
</head>
<style>
.card {
  box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
  transition: 0.3s;
  border-radius: 5px; /* 5px rounded corners */
  margin-bottom:200px;
  margin-left:250px;
  float:left; 
  flex-direction: column;
}

/* Add rounded corners to the top left and the top right corner of the image */
img {
  border-radius: 5px 5px 0 0;
  margin-left:10px;
  
}
.duzenle{
  text-align:center;
}
.danger {
  background-color: #ffdddd;
  border-left: 6px solid #f44336;
}
</style>
<body>
    <ul>
    <li><a href="index.php"><i class="fa-solid fa-house"></i>ANASAYFA</a></li>
        <li><a href="siparis.php"><i class="fa-solid fa-cart-plus"></i></i>SİPARİŞLER</a></li>
        <li><a href="iletisim.php"><i class="fa-solid fa-address-book"></i>İLETİŞİM</a></li>
        <li><a href="yonetimurunler/urunler.php"><i class="fa-solid fa-landmark"></i>ÜRÜNLER</a></li>
        <li><a href="listeleme.php"><i class="fa-solid fa-list"></i>KULLANICILAR</a></li>
        <?php
          if(@$_SESSION["yonetici_adi"]!=null){
         echo "
           <li><a href='cikis.php'><i class='fa-solid fa-right-to-bracket'></i>ÇIKIŞ YAP</a></li> ";
        }
    
        ?>

    </ul>
    <img class="icon" src="resimler/cicek.jpg" alt="resim">
    <div class="satanlar"><p><i>YÖNETİM PANELİNE HOŞGELDİNİZ.</i></p></div><br><br><br><br><br>
 

    <div class="card">
  <img src="resimler/vesikalik.jpeg" class="img">
  <div class="container">
    <h4  class="duzenle"><b>FATMA GÜL UĞUR</b></h4>
    <p  class="duzenle">BİLGİSAYAR PROGRAMCILIĞI</p>
    <p  class="duzenle">22720700049</p>
  </div>
  <div class="danger">
  <p><strong>YÖNETİCİ:   </strong>BACKEND DEVELOPER</p>
</div>
</div>
<div class="card">
  <img src="resimler/busra.jpeg" class="img">
  <div class="container">
    <h4  class="duzenle"><b>BÜŞRA USLU</b></h4>
    <p  class="duzenle">BİLGİSAYAR PROGRAMCILIĞI</p>
    <p  class="duzenle">22720700012</p>
  </div> 


  <div class="danger">
  <p><strong>YÖNETİCİ:  </strong>FRONTEND DEVELOPER</p>
</div> 
</body>
</html>