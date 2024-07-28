<?php
@session_start();
if(@$_SESSION["kullanici_id"]==null){
    header("location:index.php");
   }
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DÜNYA KLASİKLERİ</title>
<link rel="stylesheet" href="css/style.css?v=<?php echo time(); ?>">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>
<style>
.form-control{
            border: none !important;
            margin-top: 10px;
            min-width: 100%;
            padding: 0;
            width: 100%;
        }
         
        #contact input[type="text"],
        #contact input[type="e_mail"],
        #contact textarea {
            width: 100%;
            border: 1px solid #ccc;
            background: #FFF;
            margin-top: 0 0 5px;
            padding: 10px;
            margin-top: 10px;
        }
         
        #contact input[type="text"]:hover,
        #contact input[type="email"]:hover,
        #contact textarea:hover {
            -webkit-transition: border-color 0.4s ease-in-out;
            -moz-transition: border-color 0.4s ease-in-out;
            transition: border-color 0.4s ease-in-out;
            border: 1px solid #aaa;
        }
         
        #contact textarea {
            height: 120px;
            max-width: 100%;
            resize: none;
        }
         
        #contact button[type="submit"] {
            cursor: pointer;
            width: 100%;
            border: none;
            background:black ;
            color: #FFF;
            margin: 0 0 5px;
            padding: 10px;
            font-size: 15px;
        }
         
        #contact button[type="submit"]:hover {
            background: blueviolet;
            -webkit-transition: background 0.4s ease-in-out;
            -moz-transition: background 0.4s ease-in-out;
            transition: background-color 0.4s ease-in-out;
        }
         
        #contact button[type="submit"]:active {
            box-shadow: inset 0 1px 3px rgba(0, 0, 0, 0.5);
        }
         
        #contact input:focus,
        #contact textarea:focus {
            outline: 0;
            border: 1px solid #aaa;
        }
        .hesap{
          text-decoration:none;
          text-align:center;
          text-shadow: 0 3px 6px rgba(0,0,0,0.16),0 3px 6px rgba(0,0,0,0.23)  ;
        }
        table {
    border-collapse: collapse;
    background-color: #fff;
    margin-top:50px;
    margin-left:200px;

  }
  table tr, table td, table th {
    border: 1px solid #bbb;
    padding: 10px 20px;
   }
   .btn{
    background-color: aliceblue;
    color:black;
    font-size: medium;
    font-style: italic;
    width: 170px;
    margin-top: 50px;
    height: 30px;
    margin-bottom: 20px;
    border-style: solid;
    border-radius: 5px;
    text-shadow: 0 3px 6px rgba(0,0,0,0.16),0 3px 6px rgba(0,0,0,0.23)  ;
   }
</style>

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
    <table border="1"class="tablo">
    <thead>
    <tr> 
    <th>ÜRÜN GÖRSELİ:</th>
    <th>ÜRÜNÜN ADI:</th>
    <th>ÜRÜN FİYATI:</th>
    <th>TESLİMAT ADRESİ:</th>
    <th>SİPARİŞ OLUŞTURMA:</th>
     </tr>
    </thead>
      <tbody>
    <?php
    @session_start();  
    //if(@$_SESSION["kullanici_id"]==null){
        //header("location:giris.php");
 
     //}
       @$sip = $_GET["id"];
       $kullanici_id = $_SESSION["kullanici_id"];
       $baglan = mysqli_connect("localhost", "root", "", "fatmagulbooks");
   
       $sorgu = mysqli_query($baglan, "SELECT * FROM urunler_tb WHERE urun_id='$sip'");
       $kulsorgu = mysqli_query($baglan, "SELECT adres FROM kullanicilar_tb WHERE kullanici_id=$kullanici_id");
       $adres = mysqli_fetch_assoc($kulsorgu);
   
       while ($list = mysqli_fetch_array($sorgu)) {
echo "<tr>
                   <td><img name='resimler' src='.../$list[urun_gorsel]'></td>
                   <td>$list[urun_ad]</td>
                   <td>$list[urun_fiyat]</td>
                   <td>$adres[adres]</td>
                   <td>
                       <form action='$_SERVER[PHP_SELF]' method='post'>
                           <input type='hidden' value='$list[urun_id]' name='urun_id'>
                           <input type='hidden' value='$kullanici_id' name='kullanici_id' >
                           <input type='hidden' value='$list[urun_fiyat]' name='urun_fiyat'>
                           <input type='hidden' value='{$adres['adres']}' name='adres'> <!-- Adresi düzgün bir şekilde aktar -->
                           <input type='submit' value='SİPARİŞ OLUŞTUR'class='btn' onclick='cagir()'>
                       </form>
                   </td>
               </tr>";
       }
   ?>
   <?php
       if ($_SERVER["REQUEST_METHOD"] == "POST") { 
           $urun_id = $_POST["urun_id"];
           $kullanici_id = $_POST["kullanici_id"];
           $urun_fiyat = $_POST["urun_fiyat"];
           $adres = $_POST["adres"];
 
   
           $sipariskayit = mysqli_query($baglan, "INSERT INTO siparislerim_tb (urun_id, kullanici_id, tarih, durumu, adres, urun_fiyat) 
           VALUES ('$urun_id', '$kullanici_id', '2024-03-30', '1', '$adres', '$urun_fiyat')");
      if ($sipariskayit) {
        $adetdusur=mysqli_query($baglan,"update  urunler_tb set urun_adet=urun_adet-1 where urun_id=$urun_id ");
        if($adetdusur){
           echo "<script>
           alert('Siparişiniz Oluşturuldu. Hesabım Sayfasına Yönlendiriliyorsunuz');
           window.location.href = './hesabim.php';
       </script>
       ";
        }
    }
    else {
         echo "SİPARİŞ OLUŞTURULAMADI";
        }
          
       }
   ?>
         </tbody>
        </table>
        </body>
    </html>