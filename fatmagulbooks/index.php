<?php
    @session_start();    
 ?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>FATMAGUL BOOKS</title> 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="css/style.css?v=<?php echo time(); ?>">
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
    <div class="satanlar"><p><i>EN ÇOK SATANLAR</i></p></div>
    <div class="card-container">
        <div  class="card">
            <img src="resimler/sefiller.jpg">
            <div class="card-content">
                <h3>SEFİLLER</h3>
                <p>Victor Hugo'nun 1862 tarihli başyapıtı Sefiller, ailesine ekmek götürebilmek için hırsızlık yapan ve
                 bu yüzden kürek mahkûmiyetine çarptırılan bir adamın hikâyesi. Aldığı ağır cezanın bedelini ömrü boyunca ödeyen 
                 Jean Valjean'ı merkezine alan roman, yoksulluğu, toplumsal adaleti ve dayanışmayı anlatıyor.</p>
                 <p class="para">FİYATI:260 TL</p>
                 <a href="" class="btn">SATIN AL</a>
                </div>
        </div>
    </div>
    <div class="card-container">
        <div  class="card">
            <img src="resimler/yeraltındannotlar.jpg">
            <div class="card-content">
                <h3>YER ALTINDAN NOTLAR</h3>
                <p>Yeraltından Notlar, gerçek dünyadan kendini soyutlamış veya buna zorunlu kalmış bir kişinin iç çatışmalarını 
                ve hezeyanlarını ana eksen olarak belirler. Yeraltı Adamı'nın monoloğu ve ünlü "Ben hasta bir adamım." ifadesi ile romana giren
                 Dostoyevski
                bu romanıyla sonraki döneminin büyük eserlerine bir giriş yapar.</p>
                 <p class="para">FİYATI:90 TL</p>
                 <a href="" class="btn">SATIN AL</a>
                </div>
        </div>
    </div>
    <div class="card-container">
        <div  class="card">
            <img src="resimler/binmuhtesemgunes.jpg">
            <div class="card-content">
                <h3>BİN MUHTEŞEM GÜNEŞ</h3>
                <p>Kitap, Afganistan'da yaşanan şiddetli rejim değişikliklerinin gölgesinde yaşayan ve sonradan kaderleri birleşen
                iki kadın olan Meryem ve Leyla'nın hayatlarını konu almaktadır.
                </p>
                 <p class="para">FİYATI:100 TL</p>
                 <a href="" class="btn">SATIN AL</a>
                </div>
        </div>
    </div>
    <div class="kargo"><p><i>İNDİRİMDEKİLER</i></p></div>
    <div class="card-container">
        <div  class="card">
            <img src="resimler/vadidekizambak.jpg">
            <div class="card-content">
                <h3>VADİDEKİ ZAMBAK</h3>
                <p>Roman, aile hayatında çeşitli zorluklar yaşayan bir genç olan Félix'in hayatında meydana gelen değişimleri ve mutsuz bir evlilik
                     hayatı yaşayan Henriette'in
                     aralarındaki ilişkiye odaklanırken, 19. yüzyıl Fransası'nda devrim sonrası toplumsal hayat hakkında da ipuçları içermektedir.
                </p>
                 <p class="para">FİYATI:<del>100 TL</del> 75 TL</p>
                 <a href="" class="btn">SATIN AL</a>
                </div>
        </div>
    </div>
    <div class="card-container">
        <div  class="card">
            <img src="resimler/tutunamayanlar.jpg">
            <div class="card-content">
                <h3>TUTUNAMAYANLAR</h3>
                <p>Tutunamayanlar, Türk romanında modernist tekniklerin kullanıldığı, çok katmanlı yapısıyla dikkat çeken ilk romandır.
                 Oğuz Atay, romanında Türk aydınının var olma sorunlarını, yabancılaşmaya yol açan sebepleri ben- zersiz ironisiyle tartışmıştır.
                </p>
                 <p class="para">FİYATI:<del>262 TL</del> 240 TL</p>
                 <a href="" class="btn">SATIN AL</a>
                </div>
        </div>
    </div>
    <div class="card-container">
        <div  class="card">
            <img src="resimler/aklindanbirsayitut.jpg">
            <div class="card-content">
                <h3>AKLINDAN BİR SAYI TUT</h3>
                <p>Aklında Bir Sayı Tut, bir seri katil ile onun peşine düşen bir dedektifin heyecan dolu kovalamacasını konu ediniyor.
                 Bu katilin kurban seçtiği kişilerin ortak bir noktası
                 var. Peki ama ne? Bu romanı okurken merakınıza engel olamayacak ve olayların sonunu asla tahmin edemeyeceksiniz!
                </p>
                 <p class="para">FİYATI:<del>190 TL</del> 150 TL</p>
                 <a href="" class="btn">SATIN AL</a>
                </div>
        </div>
    </div>
    <div class="card-container">
        <div  class="card">
            <img src="resimler/kumarbaz.jpg">
            <div class="card-content">
                <h3>KUMARBAZ</h3>
                <p>Dostoyevski, genç adamın başarısız ilişkileri
                 ve kumara olan düşkünlüğüyle harcanan hayatını anlatırken, onda nesneleştirdiği alınyazısı ve özgürlük ikilemini inceler.
                </p>
                 <p class="para">FİYATI:<del>80 TL</del> 60 TL</p>
                 <a href="" class="btn">SATIN AL</a>
                </div>
        </div>
    </div>
    <div class="card-container">
        <div  class="card">
            <img src="resimler/siyahinci.jpg">
            <div class="card-content">
                <h3>SİYAH İNCİ</h3>
                <p>Özgün adı Black Beauty olan eserde, Siyah İnci adlı bir atın doğumundan ölümüne kadarki yaşadıkları anlatılıyor.
                     Güzel olduğu kadar iyi huylu ve akıllı 
                    bir at olan Siyah İnci, insan ve hayvanlar arasında yüzyıllardır süregelen ilişkiye karşı taraftan bir pencere açıyor.
                </p>
                 <p class="para">FİYATI:<del>100 TL</del> 80 TL</p>
                 <a href="" class="btn">SATIN AL</a>
                </div>
        </div>
    </div>
    <div class="card-container">
        <div  class="card">
            <img src="resimler/hanımınciftligi.jpg">
            <div class="card-content">
                <h3>HANIMIN ÇİFTLİĞİ</h3>
                <p>İnsanın en soylu duygularından biri olan aşkın soysuzlaştığı bir dünyayı anlatan Hanımın Çiftliği, her şeye karşın insanın insanlığına inanan, umut ve aydınlıktan vazgeçmeyen bir yazarın görüşlerini dile getiriyor.
                     Hanımın Çiftliği, büyük yazar Orhan Kemal'in ustalığının doruklarına ulaştığı bir roman.
                </p>
                 <p class="para">FİYATI:<del>180 TL</del> 155 TL</p>
                 <a href="" class="btn">SATIN AL</a>
                </div>
        </div>
    </div>
    <div class="kayitol">
    <p class="sorgu"><i>HALA KAYIT OLMADINIZ MI?&#129395; <br> HEMEN KAYIT OLUP İNDİRİMLERDEN FAYDALANIN.&#129300;&#129300;</i></p><br>

<?php
if(@$_SESSION["kullanici_id"]!=null){
 }
 else{
  echo"  <a href='kayit.php' style='text-decoration: none;' class='buton1'>BU SAYFADAN ÜCRETSİZ KAYIT OLUN</a>";
 }
?>
    </div>
</body>
</html>
