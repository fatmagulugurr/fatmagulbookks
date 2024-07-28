<?php
session_start();
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HAKKIMIZDA</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="css/style.css">
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
    <div class="satanlar"><p><i>HAKKIMIZDA</i></p></div>
    <div class="card-container">
        <div  class="card">
            <div class="card-content">
                <p>Şöyle bir düşündüğümüzde, kitap her şeyden önce kültürümüzü artırır, bakış açımızı derinleştirir, ruhumuzu yıkar,
                    kimi zaman iç sıkıntılarımıza çare, bize yol gösteren olur. Onu aramadığımız zaman sitem etmez, aradığımızda da naz etmez.</p>
                   <p>Ülkemizde de çok ilgi gören “Martı” adlı kitabın ABD’li yazarı Richard Bach’ın, yaşamla ilgili olarak, “Hayata başladığımızda
                her birimize bir blok mermer verilir. Onunla heykel yapacak aletler de verilir. Onu ya el değmemiş durumda arkamızda sürükleriz ya
                parçalar çakıl gibi dökeriz ya da görkemli bir biçime sokarız,” şeklinde bir yorumu vardır.</p><p>
                   Umutsuzluğu umuda, çaresizliği çareye, yalnızlığı dostluklara, kötülüğü iyiliğe, cehaleti bilgeliğe dönüştüren kitap hiç sevilmez mi!?..
                Öğreten kitaplar, insanlığın geleceğine ışık tutan birer güneştirler. Bilmediklerimizi öğreten, doğruyu, iyiyi, güzeli bulmamıza yardım
                eden, yazarla okuru arasında bağ kurduran, görmediğimiz, gitmediğimiz yerleri bize tanıtan, yaşamı sevdiren, dünyayı güzelleştiren kitap hiç sevilmez mi!?
                </p>
                <h3>İŞTE TAM DOĞRU ADRESTESİNİZ.</h3>
                </div>
        </div>
    </div>
    <div class="card-container">
        <div  class="card">
            <img src="resimler/kitapokuyanadam.jpg">
            <div class="card-content">
                <h3 style="text-align: center;">KAHVE EŞLİĞİNDE KİTAP OKUYAN OKUYUCUMUZ.</h3></div></div></div>
                <div class="card-container">
                    <div  class="card">
                        <img src="resimler/kutuphane.jpg">
                        <div class="card-content">
                            <h3 style="text-align: center;">MİSAFİRLERİMİZİN KİTAP OKUYACAĞI KONFORLU ALAN.</h3></div></div></div>
                            <div class="card-container">
                                <div  class="card">
                                    <img src="resimler/kutuphanegoruntu.jpg">
                                    <div class="card-content">
                                        <h3 style="text-align: center;">İSTERSENİZ EVDE İSTERSENİZ KİTAPEVİMİZDE KİTAP OKUYABİLECEĞİNİZ KONFORLU ALANLAR KEŞFEDİN.</h3></div></div></div>
                                        <div class="card-container">
                                            <div  class="card">
                                                <img src="resimler/kitapkiz.jpg">
 <div class="card-content">
  <h3 style="text-align: center;">KİTAP OKUMAK RUHU DİNLENDİRİR BAŞARIYA GÖTÜRÜR.</h3></div></div></div>   
</body>
</html>
