<?php 
require_once 'header.php'; 

?>

<!-- Header Area End Here -->
<div class="inner-banner-area">
    <div class="container">
        <div class="inner-banner-wrapper">
            <h1>Tekinim E-Ticarete Hoşgeldiniz!</h1>
            <p>Türkiyenin Tek'i...</p>
        </div>
    </div>
</div>
<!-- Inner Page Banner Area Start Here -->
<div class="pagination-area bg-secondary">
    <div class="container">
        <div class="pagination-wrapper">

        </div>
    </div>  
</div> 
<!-- Inner Page Banner Area End Here -->          
<!-- Product Page Grid Start Here -->
<div class="product-page-list bg-secondary section-space-bottom">                
    <div class="container">
        <div class="row">                        
            <div class="col-lg-9 col-md-8 col-sm-8 col-xs-12 col-lg-push-3 col-md-push-4 col-sm-push-4">
                <div class="inner-page-main-body">
                    <div class="page-controls">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-8">
                                <div class="page-controls-sorting">
                                    <div class="dropdown">
                                        <!--<button class="btn sorting-btn dropdown-toggle" type="button" data-toggle="dropdown">Default Sorting<i class="fa fa-sort" aria-hidden="true"></i></button>-->
                                        <ul class="dropdown-menu">

                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-4">
                                <div class="layout-switcher">
                                    <ul>
                                        <!--<li><a href="#gried-view" data-toggle="tab" aria-expanded="false"><i class="fa fa-th-large"></i></a></li>-->    
                                        <li class="active"><a href="#list-view" data-toggle="tab" aria-expanded="true"><i class="fa fa-list"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                    
                    <div class="tab-content">
                        <div role="tabpanel" class="tab-pane fade in active clear products-container" id="list-view">
                            <div class="product-list-view">

                                <?php
                                $sorgu=$db->prepare("select * from acikartima ");
                                $sorgu->execute();
                                

                                        //tüm tablo sütunlarının çekilmesi
                                $acikartirmasor=$db->prepare("SELECT acikartirma.*,kullanici.* FROM acikartirma INNER JOIN kullanici ON acikartirma.kullanici_id=kullanici.kullanici_id WHERE acikartirma_durum=:acikartirma_durum  order by acikartirma_zaman ");
                                $acikartirmasor->execute(array(
                                    'acikartirma_durum' => 1
                                ));



                                while($acikartirmacek=$acikartirmasor->fetch(PDO::FETCH_ASSOC)) {                     


                                    ?>

                                    <div class="single-item-list">

                                        <div class="item-img">
                                            <img style="width: 238px; height: 178px;" src="<?php echo $acikartirmacek['acikartirma_resim'] ?>" alt="<?php echo $acikartirmacek['acikartirma_ad'] ?>" class="img-responsive">
                                            <!-- <div class="trending-sign" data-tips="Trending"><i class="fa fa-bolt" aria-hidden="true"></i></div>-->
                                        </div>
                                        <div class="item-content">
                                            <div class="item-info">
                                                <div class="item-title">
                                                    <h3><a href="acikartirma-<?=seo($acikartirmacek['acikartirma_ad'])."-".$acikartirmacek['acikartirma_id'] ?>"><?php echo $acikartirmacek['acikartirma_ad'] ?></a></h3>
                                                    <span><?php echo $acikartirmacek['kategori_ad'] ?></span>
                                                </div>
                                                <div class="item-sale-info">
                                                    <div class="price"><?php echo $acikartirmacek['acikartirma_ilkfiyat'] ?> <span style="font-size:12px;">TL</span></div>
                                                    <div class="sale-qty">Son Teklif</div>
                                                </div>
                                            </div>
                                            <div class="item-profile">
                                                <div class="profile-title">
                                                    <div class="img-wrapper"><img src="<?php echo $acikartirmacek['kullanici_magazafoto']?>" alt="profile" class="img-responsive img-circle"></div>
                                                    <span><?php echo $acikartirmacek['kullanici_ad']." ".substr($acikartirmacek['kullanici_soyad'],0,1) ?>.</span>
                                                </div>
                                                <div class="profile-rating-info">   
                                                </div>
                                            </div>
                                        </div>
                                    </div>



                                <?php } ?>




                            </div>
                        </div>                               
                    </div>                                
                </div>
            </div>



        </div>
    </div>
</div>
<!-- Product Page Grid End Here -->
<?php 
require_once 'footer.php'; 

?>