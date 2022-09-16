<?php require_once 'header.php' ?>
<?php if (isset($_SESSION['userkullanici_mail'])) {
    header("Location:index.php");
    exit;
} ?>

<!-- Registration Page Area Start Here -->
<div class="registration-page-area bg-secondary section-space-bottom">
    <div class="container">
        <h2 class="title-section">Ücretsiz Üye Olun</h2>
        <div class="registration-details-area inner-page-padding">

            <?php 
            //kullanıcı kayıtlarındaki hatalar

            if ($_GET['durum']=="farklisifre") {?>

                <div class="alert alert-danger">
                    <strong>Hata!</strong> Şifreler eşleşmiyor.
                </div>

            <?php } elseif ($_GET['durum']=="eksiksifre") {?>

                <div class="alert alert-danger">
                    <strong>Hata!</strong> Şifreniz minimum 6 karakter uzunluğunda olmalıdır.
                </div>

            <?php } elseif ($_GET['durum']=="varolankayit") {?>

                <div class="alert alert-danger">
                    <strong>Hata!</strong> Kayıtlı kullanıcı.
                </div>

            <?php } elseif ($_GET['durum']=="basarisiz") {?>

                <div class="alert alert-danger">
                    <strong>Hata!</strong> Kayıt Yapılamadı.
                </div>

            <?php }
            ?>


            <form action="admin/netting/kullanici.php" method="POST" id="personal-info-form">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">                                          
                        <div class="form-group">
                            <label class="control-label" for="first-name">Adınız*</label>
                            <input type="text" id="first-name" required="" placeholder="Adınızı Giriniz" name="kullanici_ad" class="form-control">
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">                                          
                        <div class="form-group">
                            <label class="control-label" for="last-name">Soyadınız*</label>
                            <input type="text" id="last-name" required="" placeholder="Soyadınızı Giriniz" name="kullanici_soyad" class="form-control">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">                                          
                        <div class="form-group">
                            <label class="control-label" for="email">Mail Adresiniz*</label>
                            <input type="text" id="email" required="" placeholder="Mailinizi Giriniz" name="kullanici_mail" class="form-control">
                        </div>
                    </div>

                </div>
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">                                          
                        <div class="form-group">
                            <label class="control-label" for="first-name">Şifreniz*</label>
                            <input type="password" id="email" required="" placeholder="Şifrenizi Giriniz" name="kullanici_passwordone" class="form-control">
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">                                          
                        <div class="form-group">
                            <label class="control-label" for="last-name">Şifrenizi Onaylayınız*</label>
                            <input type="password" id="last-name" required="" placeholder="Şifrenizi Tekrar Giriniz" name="kullanici_passwordtwo" class="form-control">
                        </div>
                    </div>
                </div>        

                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">                                           
                        <div class="pLace-order">
                            <button class="update-btn disabled" type="submit" name="musterikaydet">Üye Ol</button>
                        </div>
                    </div>
                </div> 
            </form>                      
        </div> 
    </div>
</div>
<!-- Registration Page Area End Here -->
<?php require_once 'footer.php' ?>