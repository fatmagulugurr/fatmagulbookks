<?php
    @session_start();  
     if(@$_SESSION["kullanici_id"]==null){
        header("location:giris.html");
     }
    $kullanici_id= $_SESSION["kullanici_id"];
   
    $bag=mysqli_connect("localhost","root","","fatmagulbooks");
    

    if ($_POST) {
      $eski_parola = $_POST["eski_parola"];
      $yeni_parola = $_POST["yeni_parola"];
      $kullanici_id = $_SESSION["kullanici_id"];
  
      $eskiparola = mysqli_query($bag, "SELECT * FROM kullanicilar_tb WHERE kullanici_id = '$kullanici_id' AND sifre='$eski_parola'");
      if (mysqli_num_rows($eskiparola) > 0) {
          $parolaguncel = mysqli_query($bag, "UPDATE kullanicilar_tb SET sifre='$yeni_parola' WHERE kullanici_id = '$kullanici_id'");
          $mesaj = "ŞİFRENİZ GÜNCELLENDİ";
      } else {
          $mesaj = "ESKİ ŞİFRENİZ HATALI!";
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
    <link rel="stylesheet" href="css/style.css">
    <style>
body {font-family: Arial;}

/* Style the tab */
.tab {
  overflow: hidden;
  border: 1px solid #ccc;
  background-color: #f1f1f1;
}

/* Style the buttons inside the tab */
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

/* Change background color of buttons on hover */
.tab button:hover {
  background-color: #ddd;
}

/* Create an active/current tablink class */
.tab button.active {
  background-color: #ccc;
}

/* Style the tab content */
.tabcontent {
  display: none;
  padding: 6px 12px;
  border: 1px solid #ccc;
  border-top: none;
}
.container {
    max-width: 400px;
    width: 200px; /* Örnek olarak 300px genişliği ayarlayabilirsiniz */
    margin-top: 10px;
    position: relative;
}

#contact {
    background: #F9F9F9;
    margin-top: -10px;
    padding: 25px;
    margin: 100px 0;
    margin-left:500px;
    width:500px;
    box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.2), 0 5px 5px 0 rgba(0, 0, 0, 0.24);
}

.form-control {
    border: none !important;
    margin-top: 10px;
    width: 100%;
}

#contact input[type="text"],
#contact input[type="email"],
#contact textarea {
    width: calc(100% - 20px); /* Kenar boşlukları düşülerek hesaplama yapılıyor */
    border: 1px solid #ccc;
    background: #FFF;
    margin-top: 0 0 5px;
    padding: 10px;
    margin-top: 10px;
}

#contact button[type="submit"] {
    cursor: pointer;
    width: calc(100% - 20px); /* Kenar boşlukları düşülerek hesaplama yapılıyor */
    border: none;
    background: black;
    color: #FFF;
    margin: 0 0 5px;
    padding: 10px;
    font-size: 15px;
}

#contact h2 {
    display: block;
    font-size: 20px; /* Örnek olarak 20px boyutu ayarlayabilirsiniz */
    font-weight: 300;
    margin-bottom: 15px;
    margin-top: 10px;
}

.hesap {
    text-decoration: none;
    text-align: center;
    text-shadow: 0 3px 6px rgba(0, 0, 0, 0.16), 0 3px 6px rgba(0, 0, 0, 0.23);
}
.p{
  text-decoration: none;
    text-align: center;
    font-size:40px;
    
    text-shadow: 0 3px 6px rgba(0, 0, 0, 0.16), 0 3px 6px rgba(0, 0, 0, 0.23);
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
           <li><a href='cikis.php'><i class='fa-thin fa-arrow-up-left-from-circle'></i></i>ÇIKIŞ YAP</a></li> ";
        }
        else{
            echo " <li><a href='giris.php'><i class='fa-solid fa-arrow-right-from-bracket'></i>GİRİS YAP</a></li>";
        }
        ?>
        
       
    </ul>
    <img class="icon" src="resimler/cicek.jpg" alt="resim">
    

<div class="tab">
  <button class="tablinks" onclick="window.location.href='hesabim.php'">HESAP AYARLARI</button>
  <button class="tablinks" onclick="window.location.href='hesabim.php'">SİPARİŞLERİM</button>
  <button class="tablinks" onclick="openCity(event, 'Parola')">PAROLA AYARLARI</button>
</div>



<div id="Parola" class="tabcontent">
  <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post" id="contact">
  <h2 class="p"><b>PAROLA AYARLARI</b></h2>
  <div class="form-control">
                        <label class="form-control">ESKİ PAROLANIZ:</label>
                        <input type="password" class="form-control"  name="eski_parola" required />

                    </div>
                    <div class="form-control">
                        <label class="form-control">YENİ PAROLANIZ:</label>
                        <input type="password" class="form-control"   name="yeni_parola" required />

                    </div>
                   
                    <div class="form-control">
                        <button type="submit" class="btn btn-success">GÜNCELLE</button>
                    </div>
                </form>
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
