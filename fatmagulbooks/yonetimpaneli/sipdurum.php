<?php
@session_start();
$yt= $_SESSION["yonetici_adi"];

if($yt == null){
    header("location: giris.php");
}

?>
<?php
@$sip_id=$_GET["id"];

?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="css1/yonetim.css">
    <title>SİPARİŞLERİM</title>
    <style>
            table {
    border-collapse: collapse;
    background-color: #fff;
    margin-top:50px;
    margin-left:100px;

  }
  table tr, table td, table th {
    border: 1px solid #bbb;
    padding: 10px 20px;
   }
   .duzen{
    text-decoration:none;
    border-style:solid;
    border-radius:5px;
    color:black;
    margin-left:2px;
   }
   .duzen:hover{
    background-color: blueviolet;
}
.secim{
    font-size:15px;
    height:40px;
    margin-left:650px;
    margin-top:100px;
    border: 1px solid #bbb;
}
.butonum{
    background-color: aliceblue;
    margin-left:670px;
    color:black;
    font-size: medium;
    font-style: italic;
    width: 150px;
    margin-top: 50px;
    height: 30px;
    margin-bottom: 20px;
    border-style: solid;
    border-radius: 5px;
    text-shadow: 0 3px 6px rgba(0,0,0,0.16),0 3px 6px rgba(0,0,0,0.23)  ;
}
.mesaj{
    text-align:center;
    font-size: large;
}
</style>
</head>
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
    <div class="satanlar"><p><i>SİPARİŞ DURUMU BELİRLE</i></p></div>
    <form method="post" action="<?php $_SERVER['PHP_SELF'] ?>">

    <select name="durum" class="secim">
        <option value="1" class="deger">SİPARİŞ ALINDI </option>
        <option value="2" class="deger">SİPARİŞ YOLDA </option>
        <option value="3" class="deger">SİPARİŞ TESLİM EDİLDİ </option>
        <option value="4" class="deger">SİPARİŞ İPTAL EDİLDİ </option>


    </select>
    <br>
    <input type="submit" value="BELİRLE" class="butonum">

    </form>
 <?php
 if($_POST){
    $durum=$_POST["durum"];
    $baglan = mysqli_connect("localhost", "root", "", "fatmagulbooks");
    $sorgu=mysqli_query($baglan,"update siparislerim_tb set durumu=$durum where siparis_id=$sip_id");
    if($sorgu){
      echo "<p class='mesaj'>SİPARİŞ DURUMU DEĞİŞTİRİLDİ<p>";
        header("refresh:2;url=siparis.php");
    }
 }
 ?>

</body>
</html>