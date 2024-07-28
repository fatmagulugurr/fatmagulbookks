<?php
@session_start();
$yt= $_SESSION["yonetici_adi"];

if($yt == null){
    header("location: giris.php");
}

?>
<?php
$bag=mysqli_connect("localhost","root","","fatmagulbooks");
if($_POST){
    $urun_ad=$_POST["urun_ad"];
    $urun_adet=$_POST["urun_adet"];
    $urun_fiyat=$_POST["urun_fiyat"];
    $urun_aciklama=$_POST["urun_aciklama"];
    $kategori_id=$_POST["kategori_id"];
    $dosyaAdi=$_FILES["urun_gorsel"]["name"];
    $yuklemeyeri=__DIR__ .DIRECTORY_SEPARATOR . "../urun_gorsel/" . DIRECTORY_SEPARATOR . $dosyaAdi;
    if(move_uploaded_file($_FILES["urun_gorsel"]["tmp_name"],$yuklemeyeri)) {
        $kaydet=mysqli_query($bag,"insert into urunler_tb(urun_ad,urun_adet,urun_fiyat,urun_gorsel,urun_aciklama,kategori_id)
        values('$urun_ad','$urun_adet','$urun_fiyat','../urun_gorsel/$dosyaAdi','$urun_aciklama','$kategori_id')");
        if($kaydet){
            $msg="<b>ÜRÜN EKLENDİ</b>";
        }
        else{
            $msg="<b>ÜRÜN EKLENMEDİ</b>";
        }
    }
    header("refresh:3");
}
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>URUN EKLE</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="css1/yonetim.css">
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
<form action="<?php $_SERVER["PHP_SELF"] ?>" method="post" enctype="multipart/form-data" style="margin-top:30px; margin-left:500px; padding:10px;" >
        <input type="text" name="urun_ad" class="kitap1" placeholder="URUN BAŞLIK" style="margin-top:30px; height:50px; text-align:center; width:300px; text-shadow: 0 3px 6px rgba(0,0,0,0.16),0 3px 6px rgba(0,0,0,0.23) ; background-color: aliceblue;"> <br>
        <input type="text" name="urun_adet" class="kitap1"placeholder="URUN ADET" style="margin-top:30px; height:50px; text-align:center; width:300px; text-shadow: 0 3px 6px rgba(0,0,0,0.16),0 3px 6px rgba(0,0,0,0.23) ; background-color: aliceblue;"><br>
        <input type="text" name="urun_fiyat" class="kitap1"placeholder="URUN FİYAT" style="margin-top:30px; height:50px; text-align:center; width:300px; text-shadow: 0 3px 6px rgba(0,0,0,0.16),0 3px 6px rgba(0,0,0,0.23) ; background-color: aliceblue;"><br>
        <input type="file" name="urun_gorsel" class="kitap1"placeholder="URUN GORSEL" style="margin-top:30px; height:50px; text-align:center; width:300px; text-shadow: 0 3px 6px rgba(0,0,0,0.16),0 3px 6px rgba(0,0,0,0.23) ; background-color: aliceblue;"><br>
        <input type="text" name="urun_aciklama" class="kitap1"placeholder="URUN ACİKLAMA" style="margin-top:30px; height:50px; text-align:center; width:300px; text-shadow: 0 3px 6px rgba(0,0,0,0.16),0 3px 6px rgba(0,0,0,0.23) ; background-color: aliceblue;"><br>
        <?php
        $kategorisor=mysqli_query($bag,"select*from kategoriler_tb");
       echo " <select name='kategori_id'>";
        while($listkategori=mysqli_fetch_array($kategorisor)){ 
            echo "<option value='$listkategori[kategori_id]'>$listkategori[kategori_adi]</option>";
        }
        echo " </select>";
        ?>
        
        <input type="submit" value="URUN EKLE" class="buton3" style="color:black; font-size: medium;font-style: italic;width:200px;height: 50px;border-radius: 5px; margin-top:20px; margin-left:50px;"><br>
    <?php
    echo @$msg;
    ?>
</form>

</body>
</html>