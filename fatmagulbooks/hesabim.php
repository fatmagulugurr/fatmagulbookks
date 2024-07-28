<?php
    @session_start();  
    if(@$_SESSION["kullanici_id"]==null){
        header("location:giris.php");
 
     }

      $kullanici_id = $_SESSION["kullanici_id"];
    $baglanti = mysqli_connect("localhost", "root", "", "fatmagulbooks");

    // Prepared statement kullanarak güvenli sorgu oluşturma
    $sorgu = mysqli_prepare($baglanti, "SELECT * FROM kullanicilar_tb WHERE kullanici_id = ?");
    mysqli_stmt_bind_param($sorgu, "i", $kullanici_id);
    mysqli_stmt_execute($sorgu);
    $kullanicilist = mysqli_fetch_assoc(mysqli_stmt_get_result($sorgu));

    // bilgileri kaydetme
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $kullanici_adi = $_POST["kullanici_adi"];
        $kullanici_soyadi = $_POST["kullanici_soyadi"];
        $e_mail = $_POST["e_mail"];
        $tlfno = $_POST["tlfno"];
        $adres = $_POST["adres"];

        // Prepared statement kullanarak güvenli sorgu oluşturma
        $kaydet = mysqli_prepare($baglanti, "UPDATE kullanicilar_tb SET kullanici_adi=?, kullanici_soyadi=?, e_mail=?, tlfno=?, adres=? WHERE kullanici_id=?");
        mysqli_stmt_bind_param($kaydet, "sssssi", $kullanici_adi, $kullanici_soyadi, $e_mail, $tlfno, $adres, $kullanici_id);
        $sonuc = mysqli_stmt_execute($kaydet);

        if ($sonuc) {
          echo " 
          <script>  
          alert('KULLANICI BİLGİLERİNİZ GÜNCELLENDİ.'); 
          </script> 
          ";
       header("Refresh: 1;url=hesabim.php");
        } 
        else {
          echo " 
          <script>  
          alert('KULLANICI BİLGİLERİNİZ GÜNCELLENMEDİ LÜTFEN BAĞLANTINIZI KONTROL EDİNİZ.'); 
          </script> 
          ";
        }
    }
 ?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="w3.css">
    
    <title>FATMAGUL BOOKS</title> 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="css/style.css?v=<?php echo time(); ?>">
    <style>
body {font-family: Arial;}

 
.tab {
  overflow: hidden;
  border: 1px solid #ccc;
  background-color: #f1f1f1;
}


.tab button {
  background-color: inherit;
  float: left;
  border: none;
  outline: none;
  cursor: pointer;
  padding: 14px 16px;
  transition: 0.3s;
  font-size: 17px;
}


.tab button:hover {
  background-color: #ddd;
}


.tab button.active {
  background-color: #ccc;
}


.tabcontent {
  display: none;
  padding: 6px 12px;
  border: 1px solid #ccc;
  border-top: none;
}

        
        .container {
            max-width: 400px;
            width: 50px;
            margin-top: 10px;
            position: relative;
        }
         
        #contact input[type="text"],
        #contact input[type="e_mail"],
        #contact textarea,
        #contact button[type="submit"] {
            font: 500 12px/16px "Roboto", Helvetica, Arial, sans-serif;
        }
         
        #contact {
            background: #F9F9F9;
            margin-top: -10px;
            padding: 25px;
            margin: 100px 0;
            box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.2), 0 5px 5px 0 rgba(0, 0, 0, 0.24);
        }
         
        #contact h2 {
            display: block;
            font-size: 30px;
            font-weight: 300;
            margin-bottom: 15px;
            margin-top: 10px;
        }
         
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
    margin-left:150px;

  }
  table tr, table td, table th {
    border: 1px solid #bbb;
    padding: 10px 20px;
   }
  
           

</style>
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

    


<div class="tab">
  <button class="tablinks" onclick="openCity(event, 'Hesap')">HESAP AYARLARI</button>
  <button class="tablinks" onclick="openCity(event, 'Siparis')">SİPARİŞLERİM</button>
  <button class="tablinks" onclick="window.location.href='parola.php'">PAROLA AYARLARI</button>
</div>

<div id="Hesap" class="tabcontent">

  <form action="<?php $_SERVER['PHP_SELF'] ?>" id="contact" method="post">
  <h3 class="hesap">HESAP BİLGİLERİM</h3>
                    <div class="form-control">
                        <label class="form-control">ADINIZ:</label>
                        <input type="text" class="form-control" value="<?php echo $kullanicilist["kullanici_adi"]; ?>" name="kullanici_adi" required />
        
                    </div>
                    <div class="form-control">
                        <label class="form-control">SOYADINIZ:</label>
                        <input type="text" class="form-control" value="<?php echo $kullanicilist["kullanici_soyadi"]; ?>"  name="kullanici_soyadi" required />
                  
                    </div>
                    <div class="form-control">
                        <label class="form-control">E-MAİL ADRESİNİZ:</label>
                        <input type="text" class="form-control" value="<?php echo $kullanicilist["e_mail"]; ?>" name="e_mail" maxlength="500  "/>
                    </div>
                    <div class="form-control">
                        <label class="form-control">TELEFON NUMARANIZ:</label>
                        <input type="text" class="form-control" value="<?php echo $kullanicilist["tlfno"]; ?>" name="tlfno" maxlength="500" />
                    </div>
                    <div class="form-control">
                        <label class="form-control">ADRESİNİZ:</label>
                        <input type="text" class="form-control" value="<?php echo $kullanicilist["adres"]; ?>" name="adres" maxlength="500" />
                    </div>
                    <div class="form-control">
                        <button type="submit" class="btn btn-success">Kaydet</button>
                    </div>
                    <?php
                  echo @$mesaj;
                    ?>
                </form>
</div>

<div id="Siparis" class="tabcontent">
  <h3 class="hesap">SİPARİŞ BİLGİLERİM</h3>
  <table border="1"class="tablo">
    <thead>
    <tr> 
    <th>ÜRÜN ADI</th>
    <th>ÜRÜNÜN FİYAT</th>
    <th>SİPARİŞ TARİH</th>
    <th>SİPARİŞ DURUMU</th>
    <th>ADRES</th>
    <th>FATURA</th>
     </tr>
    </thead>

      <tbody>
      <?php
$siparisSorgu=mysqli_query($bag,"select urun_ad,tarih,durumu,adres,s.urun_fiyat from siparislerim_tb s inner join urunler_tb u
on s.urun_id=u.urun_id where s.kullanici_id= $kullanici_id");
while($list=mysqli_fetch_array($siparisSorgu)){
    echo "<tr>
            <td>$list[urun_ad]</td>
            <td>$list[urun_fiyat]</td>
            <td>$list[tarih]</td>
            <td>";
    
    // Sipariş durumuna göre uygun metni yazdırma
    if($list['durumu'] == 1){
        echo 'Sipariş Alındı';
    }
    elseif($list['durumu'] == 2){
        echo 'Sipariş Yolda';
    }
    elseif($list['durumu'] == 3){
        echo 'Sipariş Teslim Edildi';
    }
    elseif($list['durumu'] == 4){
        echo 'Sipariş İptal Edildi';
    }
    
    echo "</td>
            <td>$list[adres]</td>
            <td><a href='./fatura/fatura.png' target='_blank'>FATURA</a></td>
          </tr>";
} 
?>


      </tbody>

    </table>



</div>

<div id="Parola" class="tabcontent">

</div>

<script>
function openCity(evt, cityName) {
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }
  document.getElementById(cityName).style.display = "block";
  evt.currentTarget.className += " active";
}
</script>
  
</body>
</html>
