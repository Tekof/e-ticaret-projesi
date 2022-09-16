<?php 
ob_start();
session_start();

require_once 'admin/production/fonksiyon.php';
require_once 'admin/netting/baglan.php';
//Belirli veriyi seçme işlemi
$ayarsor=$db->prepare("SELECT * FROM ayar where ayar_id=:id");
$ayarsor->execute(array(
	'id' => 0
));
$ayarcek=$ayarsor->fetch(PDO::FETCH_ASSOC);

//giriş yapan kullanıcının bilgilerinin çekilmesi

if (isset($_SESSION['userkullanici_mail'])) {


  $kullanicisor=$db->prepare("SELECT * FROM kullanici where kullanici_mail=:mail");
  $kullanicisor->execute(array(
    'mail' => $_SESSION['userkullanici_mail']
  ));
  $say=$kullanicisor->rowCount();
  $kullanicicek=$kullanicisor->fetch(PDO::FETCH_ASSOC);

  if (!isset($_SESSION['userkullanici_id'])) {

    $_SESSION['userkullanici_id'] =$kullanicicek['kullanici_id'];
  }

}

?>

<!doctype html>
<html class="no-js" lang="">
<head>
 <meta charset="utf-8">
 <meta http-equiv="x-ua-compatible" content="ie=edge">
 <title> <?php echo $ayarcek['ayar_title']; ?> </title>
 <meta name="description" content=" <?php echo $ayarcek['ayar_description']; ?> ">
 <meta name="keywords" content=" <?php echo $ayarcek['ayar_keywords']; ?> ">
 <meta name="author" content=" <?php echo $ayarcek['ayar_author']; ?> ">
 <meta name="viewport" content="width=device-width, initial-scale=1">

 <!-- Favicon -->
 <link rel="shortcut icon" type="image/x-icon" href="img\Favicon.png">

 <!-- Normalize CSS --> 
 <link rel="stylesheet" href="css\normalize.css">

 <!-- Main CSS -->         
 <link rel="stylesheet" href="css\main.css">

 <!-- Bootstrap CSS --> 
 <link rel="stylesheet" href="css\bootstrap.min.css">

 <!-- Animate CSS --> 
 <link rel="stylesheet" href="css\animate.min.css">

 <!-- Font-awesome CSS-->
 <link rel="stylesheet" href="css\font-awesome.min.css">

 <!-- Owl Caousel CSS -->
 <link rel="stylesheet" href="vendor\OwlCarousel\owl.carousel.min.css">
 <link rel="stylesheet" href="vendor\OwlCarousel\owl.theme.default.min.css">

 <!-- Main Menu CSS -->      
 <link rel="stylesheet" href="css\meanmenu.min.css">

 <!-- Datetime Picker Style CSS -->
 <link rel="stylesheet" href="css\jquery.datetimepicker.css">

 <!-- ReImageGrid CSS -->
 <link rel="stylesheet" href="css\reImageGrid.css">

 <!-- Switch Style CSS -->
 <link rel="stylesheet" href="css\hover-min.css">

 <!-- Select2 CSS -->
 <link rel="stylesheet" href="css\select2.min.css">


 <!-- Custom CSS -->
 <link rel="stylesheet" href="style.css">

 <!-- Modernizr Js -->
 <script src="js\modernizr-2.8.3.min.js"></script>

</head>
<body>
        <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
          <![endif]-->

          <!-- Add your site or application content here -->
          <!-- Preloader Start Here -->
          <div id="preloader"></div>
          <!-- Preloader End Here -->
          <!-- Main Body Area Start Here -->
          <div id="wrapper">
           <!-- Header Area Start Here -->
           <header>                
            <div id="header2" class="header2-area right-nav-mobile">
             <div class="header-top-bar">
              <div class="container">
               <div class="row">                         
                <div class="col-lg-2 col-md-2 col-sm-2 hidden-xs">
                 <div class="logo-area">
                  <a href="index.php"><img class="img-responsive" src="img\logo.png" alt="logo"></a>
                </div>
              </div> 
              <div class="col-lg-10 col-md-10 col-sm-10 col-xs-12">
               <ul class="profile-notification">                                            


                <?php
                if (isset($_SESSION['userkullanici_mail'])) {          

                 ?>

                 <li>
                  <div class="user-account-info">
                    <div class="user-account-info-controler">
                      <div class="user-account-img">
                        <img class="img-responsive" src="<?php echo $kullanicicek['kullanici_magazafoto']?>" alt="profile">
                      </div>
                      <div class="user-account-title">
                        <div class="user-account-name"> <?php echo $kullanicicek['kullanici_ad']." ".substr($kullanicicek['kullanici_soyad'],0,1); ?>.</div>
                        <div class="user-account-balance"></div>
                      </div>
                      <div class="user-account-dropdown">
                        <i class="fa fa-angle-down" aria-hidden="true"></i>
                      </div>
                    </div>
                    <ul>
                      <li><a href="hesabim.php">Hesap Bilgilerim</a></li>
                      <li><a href="adres-bilgileri.php">Adres Bilgilerim</a></li>
                      <li><a href="magaza-basvuru.php">Mağaza Başvuru İşlemleri</a></li>

                    </ul>
                  </div>
                </li>
                <li><a class="apply-now-btn" href="logout.php" id="logout-button">Çıkış Yap</a></li>
              <?php } else { ?>
                <li><a class="apply-now-btn hidden-on-mobile" href="login.php">Giriş Yap</a></li>
                <li><a class="apply-now-btn-color hidden-on-mobile" href="register.php">Kayıt Ol</a></li>


              <?php } ?> 

            </ul>

          </div>                          
        </div>                          
      </div>
    </div>
    <div class="main-menu-area bg-primaryText" id="sticker">
      <div class="container">
       <nav id="desktop-nav">
        <ul>
          <li class="active"><a href="index.php">Anasayfa</a></li>
          <li><a href="acikartirma.php">Açık Artırma</a></li>
          <?php 
          $kategorisor=$db->prepare("SELECT * FROM kategori where kategori_onecikar=:onecikar order by kategori_sira ASC");
          $kategorisor->execute(array(
            'onecikar' => 1
          ));
          while($kategoricek=$kategorisor->fetch(PDO::FETCH_ASSOC)){?>


            <?php 

            $kategorisor=$db->prepare("SELECT * FROM kategori where kategori_onecikar=:onecikar order by kategori_sira ASC");
            $kategorisor->execute(array(
              'onecikar' => 1
            ));

            while($kategoricek=$kategorisor->fetch(PDO::FETCH_ASSOC)) { ?>


              <li><a href="kategoriler-<?=seo($kategoricek['kategori_ad'])."-".$kategoricek['kategori_id'] ?>"><?php echo $kategoricek['kategori_ad'] ?></a></li>

            <?php } ?>

          <?php } ?>
        </ul>
      </nav>
    </div>
  </div>
</div>

</header>