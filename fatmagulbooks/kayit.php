<?php
@session_start();
if(@$_SESSION["kullanici_id"]!=null){
    header("location:index.php");
 }

$baglan=mysqli_connect("localhost","root","","fatmagulbooks");
if($_POST){
    $ad=$_POST["ad"];
    $sad=$_POST["sad"];
    $sifre=$_POST["sifre"];
    $tlf=$_POST["tlf"];
    $email=$_POST["email"];
    $adres=$_POST["adres"];
    $sorgu=mysqli_query($baglan,"select * from kullanicilar_tb where tlfno='$tlf'");
    $liste=mysqli_num_rows($sorgu);
  
    if($liste>0){
        $mesaj=  "<center>Uzgunuz bu uyenin daha once kaydi var</center>";
        header("refresh:2;url=index.php");
    }
    else{
        $yazdir=mysqli_query($baglan,"insert into kullanicilar_tb(kullanici_adi,kullanici_soyadi,sifre,e_mail,tlfno,adres,aktiflik) values('$ad','$sad','$sifre','$email','$tlf','$adres',0)");
            if($yazdir) {
               $mesaj= "<center>UYE KAYDINIZ YAPILDI,ONAY İŞLEMİNDEN SONRA HESABINIZI KULLANABİLİRSİNİZ.</center>";
                header("refresh:2;url=index.php");
            }
            else{
                $mesaj=  "<center>UYE KAYIT SIRASINDA HATA OLUSTU</center>";
                header("refresh:2;url=kayit.php");
            }
    }
   
}
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="css/style.css">
    <title>KAYIT</title>
    <style>
    .girisayfasi{
        border-style: solid -20px;
        background-color: beige;
        color: aliceblue;
        margin-left: 80px;
        padding-left: 400px;
        margin-top: 50px;
        padding-top: 50px;
        padding-bottom: 15px;
        height: 350px;
        width: 850px;
    }
    .ad{
        text-align: center;
        width: 500px;
        margin-top: 20px;
        font-size: large;
        font-family: 'Times New Roman', Times, serif;
        color: black;
    }
    .butongiris{
        text-align: center;
        width: 150px;
        margin-top: 20px;
        margin-left: 150px;
        font-size: large;
        text-shadow: 0 3px 6px rgba(0,0,0,0.16),0 3px 6px rgba(0,0,0,0.23)  ;
        font-family: 'Times New Roman', Times, serif;
        color: black;
        border-radius: 100px;
    }
    </style>
 <!--function isNumberKey(evt) {
    var charCode = (evt.which) ? evt.which : event.keyCode;
    if (charCode > 31 && (charCode < 48 || charCode > 57))
        return;
}
TELEFON İNPUTUNA SADECE RAKAM GİRİŞİ OLACAK HOCAYA SOR
-->
</head>
<body>
    <ul>
        <li><a href="index.php"><i class="fa-solid fa-house"></i>ANASAYFA</a></li>
        <li class="icerik-li">
            <a href="dünya_klasikleri.php"><i class="fa-solid fa-book"></i>İÇERİK</a>
            <div id="icerik">
                <ul>
                    <li style="display: block;"><a href="dünya_klasikleri.php">DÜNYA KLASİKLERİ</a></li>
                    <li style="display: block;"><a href="#">TÜRK EDEBİYATI</a></li>
                    <li style="display: block;"><a href="#">ÇOCUK KİTAPLARI</a></li>
                    <li style="display: block;"><a href="#">DENEME KİTAPLARI</a></li>
                    <li style="display: block;"><a href="#">ŞİİR KİTAPLARI</a></li>
                    <li style="display: block;"><a href="#">GEZİ YAZILARI</a></li>
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
    <div class="satanlar"><p><i>KAYIT FORMUNA HOŞGELDİNİZ.</i></p></div>
    <form  action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
        <div class="girisayfasi">
   <input type="text" name="ad" class="ad" placeholder="ADINIZ:" autofocus required><br>
   <input type="text" name="sad" class="ad" placeholder="SOYADINIZ:" required><br>
   <input type="password" name="sifre" class="ad" placeholder="SİFRE:" required><br>
   <input type="text" name="tlf" class="ad" placeholder="TELEFON NUMARASI:" required onkeypress="return isNumberKey(event)"><br>
   <input type="text" name="email" class="ad" placeholder="E-MAİL:" required><br>
   <input type="text" name="adres" class="ad" placeholder="ADRES:" required><br>
   <input type="submit" name="giris" value="GİRİS" class="butongiris">
</div>
<?php
echo @$mesaj ;
?>
</form>

</body>
</html>