<?php 
require_once 'header.php'; 

$acikartirmasor=$db->prepare("SELECT acikartirma.*,kullanici.* FROM acikartirma INNER JOIN kullanici ON acikartirma.kullanici_id=kullanici.kullanici_id where acikartirma_id=:id and acikartirma_durum=:durum");
$acikartirmasor->execute(array(
  'id' => $_GET['acikartirma_id'],
  'durum' => 1
));

$acikartirmacek=$acikartirmasor->fetch(PDO::FETCH_ASSOC);
?>
<!-- Header Area End Here -->
<!-- Main Banner 1 Area Start Here -->
<div class="inner-banner-area">
    <div class="container">
        <div class="inner-banner-wrapper">
            <h2 style="color:white;"><?php echo $acikartirmacek['acikartirma_ad'] ?></h2>

        </div>
    </div>
</div>
<!-- Main Banner 1 Area End Here --> 
<!-- Inner Page Banner Area Start Here -->
<div class="pagination-area bg-secondary">
    <div class="container">
        <div class="pagination-wrapper">
                   <?php 


        if ($_GET['durum']=="no") {?>

          <div class="alert alert-danger">
            <strong> İşlem Başarısız.</strong>
          </div>

        <?php } elseif ($_GET['durum']=="ok") { ?>

          <div class="alert alert-success">
            <strong> Başarıyla Teklif Yaptınız </strong>
          </div>
          
      <?php } ?>

        </div>
    </div>  
</div> 
<!-- Inner Page Banner Area End Here -->          
<!-- Product Details Page Start Here -->
<div class="product-details-page bg-secondary">                
    <div class="container">
        <div class="row">
            <div class="col-lg-9 col-md-8 col-sm-8 col-xs-12">
                <div class="inner-page-main-body">
                    <div class="single-banner">
                        <img src="<?php echo $acikartirmacek['acikartirma_resim'] ?>" alt="product" class="img-responsive">
                    </div>                                
                    <div class="product-details-tab-area">
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <ul class="product-details-title">
                                    <li class="active"><a href="#description" data-toggle="tab" aria-expanded="false">Ürün Açıklaması</a></li>
                                    

                                </ul>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <div class="tab-content">
                                    <div class="tab-pane fade active in" id="description">
                                     <p><?php echo $acikartirmacek['acikartirma_detay'] ?></p>
                                 </div>


                             </div>
                         </div>
                     </div>
                 </div> 

             </div>
         </div>


         <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
            <div class="fox-sidebar">
                <div class="sidebar-item">
                    <div class="sidebar-item-inner">
                        <h3 class="sidebar-item-title">Yapılan Son Teklif</h3>
                        <div align="center">
                            <b style="font-size:30px;"><?php echo $acikartirmacek['acikartirma_ilkfiyat'] ?><span style="font-size:12px;"> TL</span></b>
                            <hr>

                        </div>
                        <form action="acikartirma-teklifyap.php" method="POST">
                          <ul class="sidebar-product-btn">

                            <input type="hidden" name="acikartirma_id" value="<?php echo $acikartirmacek['acikartirma_id'] ?>">



                            <?php 

                            if (empty($_SESSION['userkullanici_id'])) {?>

                                <li><a href="login.php" class="buy-now-btn" id="buy-button"><i class="fa fa-ban" aria-hidden="true"></i> Giriş Yapın</a></li>

                            <?php }

                            else if ($_SESSION['userkullanici_id']==$acikartirmacek['kullanici_id']) {?>

                                <li><a class="add-to-cart-btn" id="cart-button"><i class="fa fa-ban" aria-hidden="true"></i> Sizin Ürününüz</a></li>

                            <?php  } else {?>


                                <li><button type="submit" class="add-to-cart-btn" id="cart-button"><i class="fa fa-shopping-cart" aria-hidden="true"></i> Teklif Yap</button></li>
                            <?php }
                            ?>

                        </form>
                    </ul>
                </div>
            </div>                                

            <div class="sidebar-item">
                <div class="sidebar-item-inner">
                    <h3 class="sidebar-item-title">Satıcı</h3>
                    <div class="sidebar-author-info">
                        <img style="width: 72px; height: 72px;" src="<?php echo $acikartirmacek['kullanici_magazafoto'] ?>" alt="product" class="img-responsive">
                        <div class="sidebar-author-content">
                            <h3><?php echo $acikartirmacek['kullanici_ad']." ".substr($acikartirmacek['kullanici_soyad'],0,1) ?>.</h3>
                            
                        </div>
                    </div>
                    
                </div>


            </div>
        </div>                        
    </div>
</div>
</div>
<!-- Product Details Page End Here -->


<?php 
require_once 'footer.php'; 
?>
