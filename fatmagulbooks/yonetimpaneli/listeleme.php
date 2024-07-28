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
    <title>LİSTELEME</title>
    <style>
            table {
    border-collapse: collapse;
    background-color: #fff;
    margin-top:50px;
    margin-left:10px;

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
    margin: 20px 20px 10px 20px;
   }
   .duzen:hover{
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
    <div class="satanlar"><p><i>LİSTELEMEYE HOŞGELDİNİZ.</i></p></div>
    <form action="$_SERVER[PHP_SELF]" method="post">
    <table border="1"class="tablo">
    <thead>
    <tr> 
    <th>KULLANICI ID:</th>
    <th>KULLANICI ADI:</th>
    <th>KULLANICI SOYADI:</th>
    <th>ŞİFRE:</th>
    <th>E_MAİL:</th>
    <th>TELEFON NUMARASI:</th>
    <th>ADRES:</th>
    <th>AKTİFLİK</th>
    <th>İŞLEM:</th>
     </tr>
    </thead>
      <tbody>
    <?php
     $baglan=mysqli_connect("localhost","root","","fatmagulbooks");
     $sorgu=mysqli_query($baglan,"select * from kullanicilar_tb ");
     while($list=mysqli_fetch_array($sorgu)){
        echo "<tr>
        <td>$list[kullanici_id]</td>
        <td>$list[kullanici_adi]</td>
        <td>$list[kullanici_soyadi]</td>
        <td>$list[sifre]</td>
        <td>$list[e_mail]</td>
        <td>$list[tlfno]</td>
        <td>$list[adres]</td>";
        if($list['aktiflik']==true){
          echo" <td>AKTİF</td>
          <td><a href='./pasif.php?id=$list[kullanici_id]' class='duzen'>PASİF</a>
        </td>";
        }
       else{
        echo" <td>PASİF</td>
        <td><a href='./aktif.php?id=$list[kullanici_id]' class='duzen'>AKTİF</a>
      </td>";
       }
        
       echo"  </tr>";
         }
         if($_POST){ 
            $kullanici_id=$_POST["kullanici_id"];
            $kullanici_adi=$_POST["kullanici_adi"];
            $kullanici_soyadi=$_POST["kullanici_soyadi"];
            $sifre=$_POST["sifre"];
            $e_mail=$_POST["e_mail"];
            $tlfno=$_POST["tlfno"];
            $adres=$_POST["adres"];
            $aktiflik=$_POST["aktiflik"];
            
         }
         ?>
          </tbody>
        </table>
     
        </form>
</body>
</html>