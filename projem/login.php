<?php require_once 'header.php' ?>
<?php if (isset($_SESSION['userkullanici_mail'])) {
    header("Location:index.php");
    exit;
} ?>

<!-- Registration Page Area Start Here -->
<div class="registration-page-area bg-secondary section-space-bottom">
    <div class="container">
        <h2 class="title-section">Giriş Yapın</h2>
        <div class="registration-details-area inner-page-padding">

            <?php 
            //kullanıcı kayıtlarındaki hatalar

            if ($_GET['durum']=="hata") {?>

                <div class="alert alert-danger">
                    <strong>Hata!</strong> Giriş Başarısız.
                </div>

            <?php } elseif ($_GET['durum']=="exit") { ?>

             <div class="alert alert-success">
                Çıkış Yapıldı.
            </div>

            <?php } elseif ($_GET['durum']=="kayıtbasarili") { ?>

             <div class="alert alert-success">
                Kayıt Yapıldı.
            </div>

            <?php } ?>

        
        <form action="admin/netting/kullanici.php" method="POST" id="personal-info-form">

            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">                                          
                    <div class="form-group">
                        <label class="control-label" for="email">Mail Adresiniz</label>
                        <input type="text" id="email" required="" placeholder="Mail Adresinizi Giriniz" name="kullanici_mail" class="form-control">
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">                                          
                    <div class="form-group">
                        <label class="control-label" for="last-name">Şifre</label>
                        <input type="password" id="last-name" required="" placeholder="Şifrenizi Giriniz" name="kullanici_password" class="form-control">
                    </div>
                </div>
            </div>        

            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">                                           
                    <div class="pLace-order">
                        <button class="update-btn disabled" type="submit" name="kullanicigiris">Giriş Yap</button>
                    </div>
                </div>
            </div> 
        </form>                      
    </div> 
</div>
</div>
<!-- Registration Page Area End Here -->
<?php require_once 'footer.php' ?>