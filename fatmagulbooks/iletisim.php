<?php
session_start();
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>İLETİŞİM</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="css/style.css">
    <style>
        
.container {
    max-width: 400px;
    width: 100%;
    margin: 0 auto;
    position: relative;
}
 
#contact input[type="text"],
#contact input[type="email"],
#contact textarea,
#contact button[type="submit"] {
    font: 500 12px/16px "Roboto", Helvetica, Arial, sans-serif;
}
 
#contact {
    background: #F9F9F9;
    padding: 25px;
    margin: 100px 0;
    box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.2), 0 5px 5px 0 rgba(0, 0, 0, 0.24);
}
 
#contact h2 {
    display: block;
    font-size: 30px;
    font-weight: 300;
    margin-bottom: 15px;
}
 
.form-control{
    border: none !important;
    margin: 0 0 10px;
    min-width: 100%;
    padding: 0;
    width: 100%;
}
 
#contact input[type="text"],
#contact input[type="email"],
#contact textarea {
    width: 100%;
    border: 1px solid #ccc;
    background: #FFF;
    margin: 0 0 5px;
    padding: 10px;
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
    background: #79A7A8;
    color: #FFF;
    margin: 0 0 5px;
    padding: 10px;
    font-size: 15px;
}
 
#contact button[type="submit"]:hover {
    background: #355C7D;
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
    <div class="satanlar"><p><i>İLETİŞİM FORMU</i></p></div>
    <div class="container">
        <form id="contact" method="post" action="<?php $_SERVER['PHP_SELF']?>">
            <div class="form-control">
                <input placeholder="Adınız Soyadınız" type="text" name="kullanici_adi" required autofocus>
            </div>
            <div class="form-control">
                <input placeholder="E-Posta Adresiniz" type="e_mail" name="e_mail" required>
            </div>
            <div class="form-control">
                <input placeholder="Konu" type="text" name="konu" required>
            </div>
            <div class="form-control">
                <textarea placeholder="Lütfen Mesajınızı Buraya Yazın.." name="mesaj" required></textarea>
            </div>
            <div class="form-control">
                <button name="submit" type="submit" id="submit">GÖNDER</button>
            </div>
        </form>
    </div>
  
    <?php
     if($_POST){ 
        $kullanici_adi=$_POST["kullanici_adi"];
        $e_mail=$_POST["e_mail"];
        $konu=$_POST["konu"];
        $mesaj=$_POST["mesaj"];
       }
   
     $baglan=mysqli_connect("localhost","root","","fatmagulbooks");
     $sorgu = mysqli_query($baglan, "insert into iletisim_tb (kullanici_adi,e_mail,konu,mesaj) 
     values('$kullanici_adi','$e_mail','$konu','$mesaj')");
    if($sorgu){
    
        header("Location:index.php;Refresh:1");
    }
    ?>
     
</body>
</html>