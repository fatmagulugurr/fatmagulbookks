<?php
@session_start();
if(@$_SESSION["kullanici_id"]!=null){
    header("location:index.php");
 }

$baglan=mysqli_connect("localhost","root","","fatmagulbooks");
if($_POST){
    $e_mail=$_POST["e_mail"];
    $sifre=$_POST["sifre"];
    $sorgu=mysqli_query($baglan,"select*from kullanicilar_tb where e_mail='$e_mail' and sifre='$sifre'");
    if(mysqli_num_rows($sorgu)>0){ 
     
        $kullanicilist=mysqli_fetch_array($sorgu);
        if($kullanicilist['aktiflik']==true){
            
            $_SESSION["kullanici_id"]=$kullanicilist["kullanici_id"];
       
            echo" 
            <script>  
            alert('KULLANICI BİLGİLERİNİZ DOĞRU ALIŞVERİŞE BAŞLAYABİLİRSİNİZ.'); 
            </script> "; 
            header("Refresh: 1;url=index.php");
        }

        else{
        
            echo " 
            <script>  
            alert('AKTİFLİĞİNİZ GÜNCELLENMEDİ.'); 
            </script> 
            "; 
                header("Refresh: 1;url=index.php");
          }

   
    }
      else{
        
        echo " 
        <script>  
        alert('KULLANICI BİLGİLERİNİZ HATALI.'); 
        </script> 
        "; 
            header("Refresh: 1;url=giris.php");
      }
    
}
    ?>
   <html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GİRİS</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="css/style.css?v=<?php echo time(); ?>">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <style> 
   .wrapper{
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 60vh;
    color: white;
    border-radius: 10px;
    padding: 30px 40px;
    background: transparent;
   } 
   .wrapper .input-box{
    position: relative;
    width: 100%;
    height: 50px;
    margin: 30px;
   }
   .input-box input{
    width: 100%;
    height: 100%;
    border-radius:5px ;
    outline: none;
   }
   .input-box i{
    margin-top: -30px;
    color: black;
    margin-left: -20px;

 
   }
   .wrapper .remember-forgot{
    display: flex;
    justify-content: space-between;
    font-size: 14.5px;
    margin: -15px 0 15px;
   }
   .remember-forgot label input{
    accent-color: white;
    margin-right: 3px;
   }
   .remember-forgot a{
    text-decoration: none;
    color: white;
   }
   .remember-forgot a:hover{
    text-decoration: underline;
   }
   .wrapper .btn2{
    width: 100%;
    height: 45px;
    border: none;
    outline: none;
    border-radius: 40px;
    box-shadow: 0 0 10px rgba(0, 0,0, .1);
    cursor: pointer;
    font-size: 16px;
    font-weight: 600;
   }
   .wrapper .register-link{
    font-size: 14.5px;
    text-align: center;
    margin-top: 20px;
    
   }
   
    </style>

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
                        <li style="display: block;"><a href="#">ŞİİR KİTAPLARI</a></li>
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
        <div class="satanlar"><p><i>GİRİS SAYFASI</i></p></div>
        <div class="wrapper">
            <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
                <div class="input-box">
                    <input type="email" placeholder="E MAİL ADRESİNİZİ GİRİNİZ." name="e_mail" required>
                    <i class='bx bx-user'></i>
                </div>
                <div class="input-box">
                    <input type="password" placeholder="SİFRENİZ" name="sifre" required>
                    <i class='bx bxs-lock-alt' ></i>
                </div>
                <div class="remember-forgot">
                    <label><input type="checkbox">BENİ HATIRLA</label>
                </div>
                <button type="submit" class="btn2">GİRİS</button>
            </form>
        </div>

</body>
</html> 