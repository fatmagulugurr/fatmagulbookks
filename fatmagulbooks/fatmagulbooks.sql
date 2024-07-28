# Host: localhost  (Version 5.5.5-10.4.32-MariaDB)
# Date: 2024-05-14 21:55:11
# Generator: MySQL-Front 6.0  (Build 2.13)


#
# Structure for table "iletisim_tb"
#

CREATE TABLE `iletisim_tb` (
  `kullanici_id` int(11) NOT NULL AUTO_INCREMENT,
  `kullanici_adi` varchar(255) DEFAULT NULL,
  `e_mail` varchar(255) DEFAULT NULL,
  `konu` mediumtext DEFAULT NULL,
  `mesaj` mediumtext DEFAULT NULL,
  PRIMARY KEY (`kullanici_id`)
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

#
# Data for table "iletisim_tb"
#

INSERT INTO `iletisim_tb` VALUES (14,'fatmagüll','fatmagul@gmail.com','siparişimle alakalı sorun\n','Siparişim teslim edildi olarak gözüküyor fakat teslim edilmedi.\n\n\n\n'),(32,'','','',''),(33,'','','',''),(34,'','','',''),(35,'','','',''),(36,'','','',''),(37,'','','',''),(38,'','','',''),(39,'','','',''),(40,'','','',''),(41,'','','','');

#
# Structure for table "kategoriler_tb"
#

CREATE TABLE `kategoriler_tb` (
  `kategori_id` int(11) NOT NULL AUTO_INCREMENT,
  `kategori_adi` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`kategori_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

#
# Data for table "kategoriler_tb"
#

INSERT INTO `kategoriler_tb` VALUES (1,'TÜRK EDEBİYATI'),(2,'DÜNYA KLASİKLERİ'),(3,'ÇOCUK KİTAPLARI'),(4,'ŞİİR KİTAPLARI');

#
# Structure for table "kullanicilar_tb"
#

CREATE TABLE `kullanicilar_tb` (
  `kullanici_id` int(11) NOT NULL AUTO_INCREMENT,
  `kullanici_adi` varchar(50) DEFAULT NULL,
  `kullanici_soyadi` varchar(255) DEFAULT NULL,
  `sifre` varchar(50) DEFAULT NULL,
  `e_mail` varchar(255) DEFAULT NULL,
  `tlfno` varchar(11) DEFAULT NULL,
  `adres` varchar(255) DEFAULT NULL,
  `aktiflik` bit(1) DEFAULT NULL,
  PRIMARY KEY (`kullanici_id`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

#
# Data for table "kullanicilar_tb"
#

INSERT INTO `kullanicilar_tb` VALUES (1,'enes','şahin','123','enes@gmail.com','05518467622','söke apartman daire:2 kat:1',b'1'),(2,'fatmagül','uğur','1234','fatmagul@gmail.com','05518467621','toki konutları daire:13 kat:5',b'1'),(3,'yağmur','güzel','123','yagmur@gmail.com','05515446325','pembe konutları kat:7 daire:33',b'1'),(4,'ali arda','yiğit','123','aliarda@gmail.com','05514856932','buca konakları kat:8 daire:45',b'0'),(5,'zeliha','uğur','123','zelaugurr@gmail.com','05010962799','karataş mahallesi toki konutları c:13 kat:5 daire numarası:22',b'1'),(6,'orhan deniz','özdemir','123','orhan@gmail.com','05547896321','atatürk apartman kat:6 daire:25',b'1'),(7,'abdullah','erol','123','apo@gmail.com','05514789632','uzay apartman kat:25 daire:85',b'1'),(8,'büşra','uslu','123','bus@gmail.com','05547896541','kocavilayet konakları kat:3 daire:15',b'1'),(9,' ibrahim can','bitgen','123','ibo@gmail.com','05547896542','ediz inşaat daire:2 kat:1',b'1'),(10,'ali haydar','uğur','123','ali@gmail.com','05425123696','gül apartman daire:15 kat:3',b'1'),(11,'sinemm','özhan','123','sinem@gmail.com','05518465278','toki konutları c-12 kat:11 daire:47',b'0'),(30,'abdurrahman','iskanoğlu','1234','apoo@gmail.com','05518468525','ccdsamöfmasö',b'0'),(31,'emine','erol','123','emine@gmail.com','05518467985','mersin kyk kız yurdu',b'1'),(32,'fatma','uslu','123','fatos@gmail.com','0551845632','mersin kyk kız yurdu',b'1'),(33,'fatmagül uğur','koçyiğit','1234','dfdfddfd','05518465273','mersin kyk kız yurdu',b'0'),(34,'mahmutt','yücel','123','mahmut@gmail.com','0551478965','dsmmfska',b'1');

#
# Structure for table "siparislerim_tb"
#

CREATE TABLE `siparislerim_tb` (
  `siparis_id` int(11) NOT NULL AUTO_INCREMENT,
  `urun_id` int(11) DEFAULT NULL,
  `kullanici_id` int(11) DEFAULT NULL,
  `tarih` date DEFAULT NULL,
  `durumu` tinyint(3) DEFAULT NULL,
  `adres` varchar(255) DEFAULT NULL,
  `urun_fiyat` decimal(10,2) DEFAULT NULL,
  PRIMARY KEY (`siparis_id`)
) ENGINE=InnoDB AUTO_INCREMENT=78 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

#
# Data for table "siparislerim_tb"
#

INSERT INTO `siparislerim_tb` VALUES (1,40,1,'2024-03-28',2,'mkdklfmkf',50.00),(2,40,26,'2024-03-30',4,'dskfslkşmdafmklşfdsa',50.00),(3,38,1,'2024-03-30',1,'mdkmfkslşdmlkfşdsmklfdas',120.00),(4,38,1,'2024-03-30',4,'mdkmfkslşdmlkfşdsmklfdas',120.00),(50,38,2,'2024-03-30',1,'danfjkfnjaslnjasf',120.00),(51,38,2,'2024-03-30',1,'danfjkfnjaslnjasf',120.00),(52,38,2,'2024-03-30',1,'danfjkfnjaslnjasf',120.00),(53,38,2,'2024-03-30',1,'danfjkfnjaslnjasf',120.00),(54,38,2,'2024-03-30',1,'danfjkfnjaslnjasf',120.00),(55,47,1,'2024-03-30',1,'mdkmfkslşdmlkfşdsmklfdas',85.00),(56,47,1,'2024-03-30',1,'mdkmfkslşdmlkfşdsmklfdas',85.00),(57,47,1,'2024-03-30',1,'mdkmfkslşdmlkfşdsmklfdas',85.00),(58,2,1,'2024-03-30',2,'mdkmfkslşdmlkfşdsmklfdas',100.00),(59,55,1,'2024-03-30',1,'mdkmfkslşdmlkfşdsmklfdas',60.00),(60,47,1,'2024-03-30',1,'mdkmfkslşdmlkfşdsmklfdas',85.00),(61,47,1,'2024-03-30',1,'mdkmfkslşdmlkfşdsmklfdas',85.00),(62,47,1,'2024-03-30',1,'mdkmfkslşdmlkfşdsmklfdas',85.00),(63,55,1,'2024-03-30',1,'mdkmfkslşdmlkfşdsmklfdas',60.00),(64,38,2,'2024-03-30',1,'toki konutları daire:13 kat:5',120.00),(65,2,30,'2024-03-30',3,'ccdsamöfmasö',100.00),(66,38,32,'2024-03-30',1,'mersin kyk kız yurdu',120.00),(67,2,32,'2024-03-30',1,'mersin kyk kız yurdu',100.00),(68,2,32,'2024-03-30',1,'mersin kyk kız yurdu',100.00),(69,2,32,'2024-03-30',1,'mersin kyk kız yurdu',100.00),(70,2,32,'2024-03-30',1,'mersin kyk kız yurdu',100.00),(71,2,32,'2024-03-30',1,'mersin kyk kız yurdu',100.00),(72,37,32,'2024-03-30',1,'mersin kyk kız yurdu',99.99),(73,37,32,'2024-03-30',1,'mersin kyk kız yurdu',99.99),(74,37,32,'2024-03-30',1,'mersin kyk kız yurdu',99.99),(75,55,2,'2024-03-30',1,'toki konutları daire:13 kat:5',60.00),(76,8,2,'2024-03-30',4,'toki konutları daire:13 kat:5',123.00),(77,37,34,'2024-03-30',4,'dsmmfska',99.99);

#
# Structure for table "urunler_tb"
#

CREATE TABLE `urunler_tb` (
  `urun_id` int(11) NOT NULL AUTO_INCREMENT,
  `urun_ad` varchar(100) DEFAULT NULL,
  `urun_adet` int(11) DEFAULT NULL,
  `urun_fiyat` decimal(10,2) DEFAULT NULL,
  `urun_gorsel` varchar(255) DEFAULT NULL,
  `urun_aciklama` varchar(5000) DEFAULT NULL,
  `kategori_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`urun_id`)
) ENGINE=InnoDB AUTO_INCREMENT=56 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

#
# Data for table "urunler_tb"
#

INSERT INTO `urunler_tb` VALUES (1,'YER ALTINDAN NOTLAR',3,90.00,'../urun_gorsel/yeraltındannotlar.jpg','Sibirya sürgününden sonra yazdığı romanlarla tekrar eski ününe kavuştu. 1864\'de Vremya dergisinde yayımladığı Yeraltından Notlar gerçek dünyadan kendini soyutlamış bir kişinin iç çatışmalarını ve hezeyanlarını konu alır. Bu roman Dostoyevski\'nin daha sonra yazacağı büyük romanların ipuçlarını taşımaktadır.',2),(2,'BABALAR VE OĞULLAR',-2,100.00,'../urun_gorsel/babalarveogullar.jpg','Babalar ve Oğullar, Rus Edebiyatı\'nın tam anlamıyla yazılmış ilk modern roman örneği olarak kabul edilebilir (Bir diğeri Gogol\'un Ölü Canlar isimli eseridir fakat bu eser zaman zaman şiirsel veya Dante\'nin İlahi Komedya\'sındaki gibi destansı nesir olarak kabul edilmiştir).',2),(3,'SUÇ VE CEZA',2,175.00,'../urun_gorsel/sucveceza.jpg','Suç ve Ceza\'da Dostoyevski, ana karakteri Rodion Romanoviç Raskolnikov\'un kişiliğini yeni anti-radikal ideolojik temalarla birleştirmiştir. Ana konu, \"ideolojik zehirlenme\" sonucu yaşanan bir cinayeti içermektedir ve cinayetten kaynaklanan tüm feci ahlaki ve ruhsal sonuçları tasvir etmektedir.',2),(4,'DON KİŞOT',15,96.00,'../urun_gorsel/donkisot.jpg','Konu. La Mancha ilinde yaşayan 50\'li yaşlarında bir aristokrat olan Alonso Quijano, şövalye kitaplarına takıntılıdır. O kadar çok okur ki, sonunda çıldırır. Fakat sadece şövalyelerle ilgili konularda çıldırmıştır, diğer konularda ise son derece akıllı bir asilzadedir.',2),(5,'ROMEO VE JULİET',45,120.00,'../urun_gorsel/romeojuliet.jpeg','William Shakespeare\'in en sevilen eserlerinden Romeo ve Juliet kitabının konusu, birbirine düşman iki ailenin çocukları arasındaki imkansız aşktır. Ancak Romeo ve Juliet\'in aşkları karşısındaki tek engel aileleri değildir; arka arkaya gelen talihsizlikler de onların kavuşmasına engeldir.',2),(6,'KARAMAZOV KARDEŞLER',25,65.00,'../urun_gorsel/karamazov.jpg','Karamazov Kardeşler kitabının konusu; farklı annelerden ve aynı babadan olan dört erkek kardeşin babalarına duydukları nefreti ve bu uğurda işlenen cinayeti anlatır. En küçük kardeş, babası Fyodor Karamazov\'u öldürür ve suç, babasıyla aynı kadını seven Dimitri\'nin üzerine kalır.',2),(7,'JANE EYRE',25,120.00,'../urun_gorsel/janeyre.jpg','Jane Eyre, Charlotte Brontë\'ın 1847\'de yayımladığı romandır. Victoria dönemi İngilteresinde farklı sınıftan iki kişi arasındaki bir aşkı anlatan roman, toplumda yaşanan dini baskıyı, sınıf ayrımını ve erkek üstünlüğünü gerçekçi bir biçimde yansıtır.',2),(8,'MADAME BOVARY',22,123.00,'../urun_gorsel/madam.jpg','Eser, iyi kalpli ve sıradan bir hayat süren doktor Charles Bovary\'nin yüksek idealleri ve aşırı lüks tutkusu olan karısı Emma Bovary\'nin, yaşamın tekdüzeliğinden sıyrılmak için girdiği durumları ve yaşadığı ilişkileri konu alır. Yazar, karakterlerin iç dünyalarını açıklarken realizmin gözlemci yönünü kullanmıştır.',2),(9,'KIRMIZI VE SİYAH',96,155.00,'../urun_gorsel/kırmızıvesiyah.jpg','Yükselme ihtirası ile yanıp tutuşan bir genç olan Julien Sorel\'in zaman zaman ikiyüzlülüğe kadar varan içten pazarlıklı halini, gerçekten bağlı olduğu dünya görüşünü ve Napolyon hayranlığını saklamaya çalışırken yaşadığı bunalımı anlatan roman bu yönü ile bir psikolojik roman özelliği taşır.',2),(10,'GULLİVERİN GEZİLERİ',6,110.00,'../urun_gorsel/gulliveringezileri.jpg','Araştırmada çalışılan eser Jonathan Swift\'in dört bölüm olarak yazdığı Güliverin Gezileri adlı eseridir. Eserde, adaletin önemine değinilmiştir. İftiranın yanlışlığı ve hükümetin ceza sistemine bağlı olarak haklının ve adaletin yanında olması gerektiği belirtilmektedir',2),(11,'ANNA KARENİNA',45,150.00,'../urun_gorsel/annakare.jpg','Anna Karenina, 19. yüzyıl Rus toplumunun ruhsal dalgalanmalarına çarpıcı bir aşk ve ihanet anlatısıyla ışık tutan bir başyapıt. Güzelliği ve nezaketiyle çevresinde hayranlık uyandıran Anna Karenina\'nın mutsuz ve monoton bir evliliği vardır.',2),(12,'SAVAŞ VE BARIŞ',49,99.00,'../urun_gorsel/savasvebaris.jpg','Dünya edebiyatçılarını ardından sürükleyen, tarihe ışık tutacak betimlemeleri içeren Savaş ve Barış, Napolyan Savaşları da denilen Rus ve Fransız savaşı sırasında çekilen tüm sıkıntılar arasında Bezuhov, Balkonski ve Rostov ailelerinin yaşantıları çerçevesinden savaşın dönemsel etkilerini anlatır',2),(13,'ÖLÜ CANLAR',48,200.00,'../urun_gorsel/olucanlar.jpg','Köleliğin kaldırılmasından önce toprak sahipleri, çalıştırdıkları köylü sayısı kadar vergi ödemek zorunda oldukları gibi devletten para da alabiliyorlardı. Bundan yararlanmak isteyen Çiçikov, ölü canları yani ölmüş köylüleri (köleleri) karşılık göstererek devleti dolandırmaya kalkar.',2),(14,'ÜÇ SİLAHŞÖRLER',85,110.00,'../urun_gorsel/ucsilahsorler.jpg','Üç Silahşorlar, Alexandre Dumas tarafından yazılmış olan tarihi macera romanı. Fransa\'da XIII. Louis döneminde kralın muhafız birliğinde görev yapan Athos, Porthos ve Aramis adlı üç silahşore katılmak üzere Paris\'e giden D\'artagnan Romansı (Dartanyan) adlı gencin maceralarını konu alır.',2),(15,'YÜZYILLIK YALNIZLIK',87,135.00,'../urun_gorsel/yuzyıllıkyanizlik.jpg','Yüzyıllık Yalnızlık, Latin Amerika kimliğinin güçlü bir alegorisini içeriyor. Yüz yıllık bir zaman dilimi içinde, \'güçlü\' lider, maçoluk, isyan, iktidar, hastalıklar ve siyasi şiddet olayları gibi bölgenin önemli sorunlarını ele alıyor.',2),(16,'BÜLBÜLÜ ÖLDÜRMEK',63,125.00,'../urun_gorsel/bulbuluoldurmek.jpg','Bir “zenci”nin haksız yere suçlanması üzerinden gelişen olaylar; önyargılar, riyakârlık, sınıf ve ırk çatışmalarıyla beslenen küçük Amerikan kasabasının sınırlarını aşıp, insanlar arası ilişkide adaletin ve dürüstlüğün önemini anlatan evrensel bir hikâyeye dönüşüyor.',2),(17,'GAZAP ÜZÜMLERİ',65,129.99,'../urun_gorsel/gazapuzumleri.jpg','Bu romanında yazar, Amerika\'da 1930\'lu yılların ekonomik kriz dönemlerini, insanlığın dramını etkileyici bir dille anlatmaktadır. Joad ailesinin özelinden, genele yansıyan bakış açısıyla emekçi insanları konu alan kitap, dünyanın önde gelen ve en çok okunan klasiklerinden biridir.',2),(18,'BÜYÜK UMUTLAR',95,150.00,'../urun_gorsel/buyukumutlar.jpg','Büyük Umutlar (orijinal adıyla Great Expectations), Charles Dickens\'ın kitabı. Pip\'in sürükleyici hayatının anlatıldığı bu roman 19. yüzyılda İngiltere\'deki maden köylerindeki yaşama ayna tutmaktadır. Köyün demircisi olan Joe Gargery\'nin çok zor şartlar altında çalıştığı yine de çok fakir olduğu romanda yansıtılmıştır.',2),(19,'BİN MUHTEŞEM GÜNEŞ',26,200.00,'../urun_gorsel/binmuhtesemgunes.jpg','Afgan asıllı yazar, Uçurtma Avcısı gibi bu romanında da doğduğu toprakların kader çıkmazını konu ediniyor. Yaşamlarının kesişmesi üzerine sıkı dost olan iki kadının anlatıldığı Bin Muhteşem Güneş, yüreklere dokunan öyküsüyle zihinlerde iz bırakıyor.',2),(20,'SEFİLLER',23,155.00,'../urun_gorsel/sefiller.jpg','Victor Hugo\'nun 1862 tarihli başyapıtı Sefiller, ailesine ekmek götürebilmek için hırsızlık yapan ve bu yüzden kürek mahkûmiyetine çarptırılan bir adamın hikâyesi. Aldığı ağır cezanın bedelini ömrü boyunca ödeyen Jean Valjean\'ı merkezine alan roman, yoksulluğu, toplumsal adaleti ve dayanışmayı anlatıyor.',2),(21,'AKLINDAN BİR SAYI TUT',23,250.00,'../urun_gorsel/aklindanbirsayitut.jpg','Aklında Bir Sayı Tut, bir seri katil ile onun peşine düşen bir dedektifin heyecan dolu kovalamacasını konu ediniyor. Bu katilin kurban seçtiği kişilerin ortak bir noktası var. Peki ama ne? Bu romanı okurken merakınıza engel olamayacak ve olayların sonunu asla tahmin edemeyeceksiniz!',2),(22,'AŞK VE GURUR',15,159.99,'../urun_gorsel/askvegurur.jpg','Film, Jane Austen\'in beş kız kardeş, Jane, Elizabeth, Mary, Kitty ve Lydia Bennet\'i anlatan romanından uyarlanmıştır. Hikaye George dönemi İngilteresi\'nde geçer. Ailenin yaşamı, genç ve zengin bir adam olan Bay Bingley\'in ve onun en yakın arkadaşı Bay Darcy\'nin komşu gelişleri ile tepetaklak olur.',2),(37,'KÜRK MANTOLU MADONNA',71,99.99,'../urun_gorsel/kurkmantolumadonna.jpg','Psikolojik bir anlatı olarak da ifade edebileceğimiz roman aslında üç ana tema etrafında şekilleniyor: Aşk, yalnızlık ve yabancılaşma. Kürk Mantolu Madonna, daha çok bir aşk hikayesi olarak görünse de romanda aslında bir insanın yalnızlaşma sürecine ve giderek topluma yabancılaşmasına şahit oluyoruz.',1),(38,'DOKUZUNCU HARİCİYE KOĞUŞU',39,120.00,'../urun_gorsel/dokuzuncuhariciye.jpg','Dokuzuncu Hariciye Koğuşu kitabının konusu 15 yaşındaki bir gencin kemik veremi hastalığa yakalanması sonucu hayata tutunma çabasını anlatır. Dokuzuncu Hariciye Koğuşu kitabının ana fikri insanoğlu kendisine verilen öğütleri her zaman ciddiye almalı ve o öğütlere uymalıdır. Aksi takdirde üzülen taraf olur..',1),(39,'HABABAM SINIFI',62,100.00,'../urun_gorsel/hababamsınıfı.jpg','Özel Çamlıca Lisesi\'ne yeni atanan müdür muavini ve tarih öğretmeni olan Mahmut Hoca (Kel Mahmut) kopya çeken, okuldan kaçıp maçlara giden, hocalarla sürekli kafa bulan öğrencilerle dolu okulun 6-A Edebiyat sınıfını, namıdiğer Hababam Sınıfı\'nı ilginç ve ağır ceza yöntemleriyle disiplin altına almaya çalışır.',1),(40,'DOST YAŞAMASIZ',45,50.00,'../urun_gorsel/dostyasamasız.jpg','Kendini teslim ettiğin an iş işten geçiyor ve keskin kalemiyle her yerin kesik içinde kalıyor. Tevekkeli değil, Semih Gümüş, Kara Anlatı Yazarı isimli kitabı yazmış hakkında. Umudu, narkoz olarak niteleyen yazarımız, mutluluk için bilinç susuncaya değin, belleğinden avuntu çıkarabilenlere özgü olsa gerek, diyor. Elbette, yazınına, yaşamının ağır gölgeleri düşmüş.',1),(41,'BEREKETLİ TOPRAKLAR ÜZERİNDE',12,250.00,'../urun_gorsel/bereketlitopraklar.jpg','Bereketli Topraklar Üzerinde, Orhan Kemal\'in yazdığı, 1954 tarihli romandır. Romanda, para kazanmak umuduyla Sivas\'ın bir köyünden ayrılıp çalışmak üzere Çukurova\'ya göç eden üç arkadaşın başından geçenler anlatılır.',1),(42,'YILANLARIN ÖCÜ',32,150.00,'../urun_gorsel/yilanlarinöcü.jpg','Yılanların Öcü, Fakir Baykurt\'un 1954\'te kaleme aldığı, 1958\'de yayımlanan romanı. Literatür yayınevinden çıkan kitabın kapağı. Konusu, 1950\'li yıllarda Türkiye\'de bir köyde yaşanan toprak kavgasıdır. Eşitsizlikleri dile getiren, güçlü güçsüz- mücadelesini yansıtan bir köy romanıdır.',1),(43,'ÇALIKUŞU',65,85.99,'../urun_gorsel/calikusu.jpg','Romanda, İstanbul köklü bir ailenin kızı olan çocuk ruhlu Feride\'nin çok sevdiği nişanlısı tarafından ihanete uğramasıyla kendini öğretmenlik mesleğine adaması ve hayatını kazanabilmek için Anadolu\'da şehir şehir dolaşması anlatılır.',1),(44,'HANIMIN ÇİFTLİĞİ',78,500.00,'../urun_gorsel/hanımınciftligi.jpg','İnsanın en soylu duygularından biri olan aşkın soysuzlaştığı bir dünyayı anlatan Hanımın Çiftliği, her şeye karşın insanın insanlığına inanan, umut ve aydınlıktan vazgeçmeyen bir yazarın görüşlerini dile getiriyor. Hanımın Çiftliği, büyük yazar Orhan Kemal\'in ustalığının doruklarına ulaştığı bir roman.',1),(45,'TUTUNAMAYANLAR',98,240.00,'../urun_gorsel/tutunamayanlar.jpg','Tutunamayanlar, Türk romanında modernist tekniklerin kullanıldığı, çok katmanlı yapısıyla dikkat çeken ilk romandır. Oğuz Atay, romanında Türk aydınının var olma sorunlarını, yabancılaşmaya yol açan sebepleri ben- zersiz ironisiyle tartışmıştır.',1),(46,'NOHUT ADAM',52,150.00,'../urun_gorsel/nohutadam.jpg','Nohut Adam ise orman halkından çok farklı. Onun hiç saçı yok. Taş gibi göbeği, kısa kolları ve gözlüklerinin arkasına gizlenen masmavi gözleri var. Onu kendilerinden farklı görenlerden, aynalardan ve bir türlü barışamadığı görünümünden kaçıyor.',3),(47,'UZAYA GİDEN TREN',5,85.00,'../urun_gorsel/uzayagidentren.jpg','Birinci kitapta resim yapmak üzerinden kendini tanımanın ve gerçekleştirmenin önemini vurgulayan yazar, yeni kitabında yaratıcı yazarlık sırlarını pratik yaptırarak anlatıyor. Böylelikle okur, kendini kaptırdığı maceranın içinde hikâye yazmayı sırlarıyla öğrenecek.',3),(48,'BENİM ZÜRAFAM UÇABİLİR',32,90.00,'../urun_gorsel/benimzurafam.jpg','İnsanlar nasıl farklıysa hayal dünyalarından çıkan resimlerin de farklı olabileceğini söyleyen öğretmen, Moni\'yi ikna etmeyi başarıyor. Ona, çizdiği zürafanın özel bir zürafa olacağını ve hayal gücü sayesinde zürafayı gerçekleştirebileceğini anlatıyor.',3),(49,'KÜÇÜK PRENS',15,100.00,'../urun_gorsel/kucukprens.jpg','Küçük Prens kitabında bir çocuğun gözünden büyüklerin dünyası ele alınmaktadır. Eser toplamda yirmi yedi bölümden oluşmaktadır. Hikaye Sahra Çölü\'ne düşen bir pilotun Küçük Prens ile karşılaşması ile başlamaktadır. Küçük Prens bu karşılaşmada yazara yaşadığı yeri ve yaşadığı maceraları anlatmaktadır.',3),(50,'DEDEMİN BAKKALI',8,120.00,'../urun_gorsel/DEDEMİNBAKKALI.jpg','Dedemin Bakkalı-Çırak geleceğin girişimcilerine, kahramanlarına, yazarlarına, mucitlerine, yardımseverlerine incelikli bir çıraklık rehberi sunuyor. Tüm cin fikirli çıraklara; yetişkinlere rağmen üretmenin, düşünmenin, hayal kurmanın, yazmanın yollarını anlatıyor.',3),(51,'ÇANTAMDAN FİL ÇIKTI',48,65.00,'../urun_gorsel/CANTAMDANFİL.jpg','Çantamdan Fil Çıktı, çocuklara hayal kurmayı ve hayal gücüyle kendini keşfetmeyi öğretiyor. Oyun oynamanın, birlikte eğlenmenin önemini vurguluyor. Sınıf ortamını sevdirirken arkadaşlığı, paylaşmayı ve sevgiyi ön plana çıkarıyor.',3),(53,'BÜTÜN ŞİİRLER',52,80.00,'../urun_gorsel/butunsiirleri.jpg','Türk şiirinin kuvvetli kıstaslarından olan Orhan Velinin Bütün Şiirleri isimli bu kitabı hazırlanırken, şairin tüm yaşamı, yaşanmışlıkları ele alındı.',4),(54,'YAŞ OTUZ BEŞ',55,50.00,'../urun_gorsel/yasotuzbes.jpg','Bent: İtalyan şair Dante den ilham alınınaral yazılmış olan bir şiirdir. Dante nin bir eseri olan İlahi Komedya yı yazmaya başladığında 35 yaşında ve sürgündeydi. Şair ise otuz beş yaşı hayat yolunun yarısı olduğunu düşünüyor. Bu yaştan sonra bütün canlılığın yavaşça azaldığını ve ölümün yaklaştığını belirtir.',1),(55,'DOKUZA KADAR ON',7,60.00,'../urun_gorsel/dokuzakadaron.jpg','Özdemir Asaf, sanat sanat içindir görüşünü savunmaktadır',4);

#
# Structure for table "yonetici_tb"
#

CREATE TABLE `yonetici_tb` (
  `yonetici_adi` varchar(50) NOT NULL DEFAULT '',
  `yonetici_sifre` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`yonetici_adi`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

#
# Data for table "yonetici_tb"
#

INSERT INTO `yonetici_tb` VALUES ('admin','1234');
