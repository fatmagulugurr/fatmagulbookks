<?php
@session_start();

?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="css1/yonetim.css">
    <title>LİSTELEME</title>
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
    margin-left:-150px
   } 
   .wrapper .input-box{
    position: relative;
    width: 100%;
    height: 50px;
    margin: 30px;
    margin-left: 20px;

   }
   .input-box input{
    width: 100%;
    height: 100%;
    border-radius:5px ;
    outline: none;
    margin-left: 20px;

    
   }
   .input-box i{
    margin-top: -30px;
    color: black;
    margin-left: 20px;

 
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
    margin-left: 20px;

   }
   .remember-forgot a{
    text-decoration: none;
    color: white;
    margin-left:-20px;
   }
   .remember-forgot a:hover{
    text-decoration: underline;
   }
   .wrapper .btn2{
    width: 200px;
    height: 45px;
    border: none;
    outline: none;
    border-radius: 40px;
    box-shadow: 0 0 10px rgba(0, 0,0, .1);
    cursor: pointer;
    font-size: 16px;
    font-weight: 600;
    margin-left:100px;
   }
   .wrapper .register-link{
    font-size: 14.5px;
    text-align: center;
    margin-top: 20px;
    
   }

   
    </style>
<body>
<div class="satanlar"><p><i>LÜTFEN YÖNETİCİ ADINIZI VE ŞİFRENİZİ GİRİNİZ.</i></p></div>
    <div class="wrapper">
            <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
                <div class="input-box">
                    <input type="text" placeholder="ADINIZI GİRİNİZ." name="kullanici_adi" >
                    <i class='bx bx-user'></i>
                </div>
                <div class="input-box">
                    <input type="password" placeholder="SİFRENİZİ GİRİNİZ." name="kullanici_sifre" >
                    <i class='bx bxs-lock-alt' ></i>
                </div>
           
                <button type="submit" class="btn2">GİRİS</button>
            </form>
        </div>
<?php
$baglan=mysqli_connect("localhost","root","","fatmagulbooks");
if($_POST){
    $kullanici_adi=$_POST["kullanici_adi"];
    $kullanici_sifre=$_POST["kullanici_sifre"];
    $sorgu=mysqli_query($baglan,"select * from yonetici_tb where yonetici_adi='$kullanici_adi' and yonetici_sifre='$kullanici_sifre'");
if(mysqli_num_rows($sorgu)>0){
    $deger = mysqli_fetch_assoc($sorgu);
    $_SESSION["yonetici_adi"] = $deger["yonetici_adi"];
    header("location:./index.php");
}
else{
    echo "BİLGİLERİNİZ HATALI.";
}
}
?>
 
</body>
</html>