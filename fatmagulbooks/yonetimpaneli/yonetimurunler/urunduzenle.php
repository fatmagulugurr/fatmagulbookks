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
$sorgu=mysqli_query($bag,"select * from urunler_tb where urun_id=$duzenleid");
$list=mysqli_fetch_assoc($sorgu);
//header("../yonetimurunler/urunler.php");

//ÜRÜN GÜNCELLEME

if($_POST){
    if($_FILES["urun_gorsel"]["name"]>0){
        $baslik=$_POST["baslik"];
        $aciklama=$_POST["aciklama"];
        $fiyat=$_POST["fiyat"];
        $urun_adet=$_POST["urun_adet"];
        $kategori_id=$_POST["kategori_id"];
        $dosyaAdi=$_FILES["urun_gorsel"]["name"];
        $yuklemeyeri=__DIR__ .DIRECTORY_SEPARATOR . "../urun_gorsel/" . DIRECTORY_SEPARATOR . $dosyaAdi;
        if(move_uploaded_file($_FILES["urun_gorsel"]["tmp_name"],$yuklemeyeri)) {
           $kaydet=mysqli_query($bag,"update urunler_tb set urun_ad='$urun_ad',urun_adet='$urun_adet',urun_fiyat='$urun_fiyat',urun_gorsel='../urun_gorsel/$dosyaAdi',urun_aciklama='$urun_aciklama',kategori_id='$kategori_id' where urun_id=$duzenleid");
            if($kaydet){
                $msg="<b>ÜRÜN GÜNCELLENDİ</b>";
            }
            else{
                $msg="<b>ÜRÜN GÜNCELLENMEDİ</b>";
            }
        }
        header("refresh:3");
    }
    else{
        $baslik=$_POST["baslik"];
        $aciklama=$_POST["aciklama"];
        $fiyat=$_POST["fiyat"];
        $urun_adet=$_POST["urun_adet"];
        $kategori_id=$_POST["kategori_id"];
           $kaydet=mysqli_query($bag,"update urunler_tb set urun_ad='$baslik',urun_aciklama='$aciklama',
           urun_fiyat='$fiyat',urun_adet='$urun_adet',kategori_id='$kategori_id' where urun_id=$duzenleid");
            if($kaydet){
                $msg="<b>ÜRÜN GÜNCELLENDİ</b>";
            }
            else{
                $msg="<b>ÜRÜN GÜNCELLENMEDİ</b>";
            }
        
        header("refresh:3");
    }
   
}

?> 
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>URUN EKLE</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="css1/yonetim.css">
    <style>
        .kitap1{
            margin-top:15px;
            font-size:large;
            margin-left:450px;
            border-radius:20px;
            border-top:-200px;
            width:500px;
            text-align:center;

            height:70px;
            
        }
        .kitap12{
            height:100px;
            margin-top:15px;
            text-align:center;
            margin-left:450px;
            border-radius:20px;
            border-top:10px;
            width:500px;
        }
        .buton3{
            height:50px;
            margin-top:15px;
            text-align:center;
            margin-left:550px;
            border-radius:20px;
            border-top:10px;
            width:300px; 
            font-size:large;
            background-color:aliceblue;
        }
        .bitt{
            height:50px;
            margin-top:15px;
            text-align:center;
            margin-left:550px;
            border-radius:20px;
            border-top:10px;
            width:300px; 
            font-size:large;
            background-color:aliceblue;
        }
        .bit{
            height:50px;
            margin-top:15px;
            text-align:center;
            margin-left:550px;
            border-radius:20px;
            border-top:10px;
            width:300px; 
            font-size:large;
            background-color:aliceblue;
        }
    </style>
</head>
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
<form action="<?php $_SERVER["PHP_SELF"] ?>" method="post" enctype="multipart/form-data">
        <input type="text" name="baslik" class="kitap1" placeholder="URUN BAŞLIK" value="<?php echo $list['urun_ad'] ?>"> <br>
        <input type="text" name="aciklama" class="kitap12"placeholder="AÇIKLAMA" value="<?php echo $list['urun_aciklama'] ?>"><br>
        <input type="text" name="fiyat" class="kitap1"placeholder="URUN FİYAT" value="<?php echo $list['urun_fiyat'] ?>"><br>
        <input type="text" name="urun_adet" class="kitap1"placeholder="URUN ADETİ" value="<?php echo $list['urun_adet'] ?>"><br>
        <input type="file" name="urun_gorsel" class="kitap1"placeholder="URUN GORSEL" ><br>
        <?php
        $kategorisor=mysqli_query($bag,"select*from kategoriler_tb");
       echo " <select name='kategori_id' class='bitt'>";
        while($listkategori=mysqli_fetch_array($kategorisor)){ 
            echo "<option value='$listkategori[kategori_id]' class='bit'>$listkategori[kategori_adi]</option>";
        }
        echo " </select>";
        ?>
        
    <input type="submit" value="URUN DUZENLE" class="buton3"><br>
    <?php
    echo @$msg;
    ?>
</form>
</body>
</html>