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
    <title>SİPARİŞLERİM</title>
    <style>
            table {
    border-collapse: collapse;
    background-color: #fff;
    margin-top:50px;
    margin-left:50px;

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
.btn {
    text-decoration:none;
    border-style: solid;
    border-radius: 5px;
    color: black;
    margin-left: 2px;
    padding: 8px 16px;
    font-size: 16px;
    font-weight: bold; 
 
}
.duzenn{
    text-decoration:none;
    border-style:solid;
    border-radius:5px;
    color:black;
    margin: 20px 20px 10px 20px;
    height:20px;
    
   }
   .duzenn:hover{
    background-color: blueviolet;
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
    <div class="satanlar"><p><i>SİPARİŞLERİM</i></p></div>
    <form action="$_SERVER[PHP_SELF]" method="post">
    <table border="1"class="tablo">
    <thead>
    <tr> 
    <th>SİPARİŞ ID:</th>
    <th>ÜRÜN İD:</th>
    <th>KULLANICI İD:</th>
    <th>TARİH:</th>
    <th>ADRES:</th>
    <th>ÜRÜN FİYATI:</th>
    <th>ÜRÜN DURUMU:</th>
    <th>SİPARİŞ DURUM BELİRLE:</th>
     </tr>
    </thead>
      <tbody>
    <?php
    $baglan=mysqli_connect("localhost","root","","fatmagulbooks");
    $sorgu=mysqli_query($baglan,"select * from siparislerim_tb ");
    while($list=mysqli_fetch_array($sorgu)){
        echo "<tr>
        <td>$list[siparis_id]</td>
        <td>$list[urun_id]</td>
        <td>$list[kullanici_id]</td>
        <td>$list[tarih]</td>
        <td>$list[adres]</td>
        <td>$list[urun_fiyat]</td>
        <td>";
    
        if($list['durumu'] == 1){
            echo 'SİPARİS ALINDI';
        }
        elseif($list['durumu'] == 2){
            echo 'SİPARİS YOLDA';
        }
        elseif($list['durumu'] == 3){
            echo 'SİPARİS TESLİM EDİLDİ';
        }
        elseif($list['durumu'] == 4){
            echo 'SİPARİŞ İPTAL EDİLDİ';
        }
      echo"  <td><a href='sipdurum.php?id=$list[siparis_id]' class='duzenn'>SİPARİŞ DURUMU</a></td>";
        
    }
    if($_POST){ 
        $siparis_id=$_POST["siparis_id"];
        $urun_id=$_POST["urun_id"];
        $kullanici_id=$_POST["kullanici_id"];
        $tarih=$_POST["tarih"];
        $durumu=$_POST["durumu"];
        $adres=$_POST["adres"];
        $urun_fiyat=$_POST["urun_fiyat"];
    }

    ?>
    </tbody>
    </table>
     
        </form>

</body>
</html>