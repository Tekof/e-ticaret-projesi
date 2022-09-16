<?php 

require_once 'header.php'; 

$acikartirmasor=$db->prepare("SELECT acikartirma.*,kullanici.* FROM acikartirma INNER JOIN kullanici ON acikartirma.kullanici_id=kullanici.kullanici_id where acikartirma_id=:id and acikartirma_durum=:durum");
$acikartirmasor->execute(array(
    'id' => $_POST['acikartirma_id'],
    'durum' => 1
));

$acikartirmacek=$acikartirmasor->fetch(PDO::FETCH_ASSOC);
?>
<!-- Header Area End Here -->
<!-- Main Banner 1 Area Start Here -->
<div class="inner-banner-area">
    <div class="container">
        <div class="inner-banner-wrapper">
            <h2 style="color:white;">Ödeme Yapılacak Ürün: <?php echo $acikartirmacek['acikartirma_ad'] ?></h2>

        </div>
    </div>
</div>
<!-- Main Banner 1 Area End Here --> 
<!-- Inner Page Banner Area Start Here -->
<div class="pagination-area bg-secondary">
    <div class="container">
        <div class="pagination-wrapper">

        </div>
    </div>  
</div> 
<!-- Inner Page Banner Area End Here -->          
<!-- Product Details Page Start Here -->
<div class="product-details-page bg-secondary">                
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="inner-page-main-body">
                    <div class="single-banner">
                        <form action="admin/netting/kullanici.php" method="POST">
                            <table id="cart" class="table table-hover table-condensed">
                                <thead>
                                    <tr>
                                        <th style="width:50%">Ürün Bilgisi</th>
                                        <th style="width:10%">Fiyat</th>
                                        <th style="width:22%" class="text-center">Satıcı</th>
                                        <th style="width:10%">Teklif</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <tr>
                                        <td data-th="Product">
                                            <div class="row">
                                                <div  class="col-sm-2 hidden-xs"><img style="width: 60px; height: 60px; " src="<?php echo $acikartirmacek['acikartirma_resim'];?>" alt="<?php echo $acikartirmacek['acikartirma_ad'];?>" class="img-responsive"/></div>
                                                <div class="col-sm-10">
                                                    <h4 class="nomargin"><?php echo $acikartirmacek['acikartirma_ad'];?></h4>
                                                    <p><?php echo mb_substr($acikartirmacek['acikartirma_detay'], 0,150,'UTF-8');?></p>
                                                </div>
                                            </div>
                                        </td>

                                        <td data-th="Price"><?php echo $acikartirmacek['acikartirma_ilkfiyat']; ?> TL</td>

                                        <td data-th="Subtotal" class="text-center"><?php echo $acikartirmacek['kullanici_ad']." ".$acikartirmacek['kullanici_soyad'] ?></td>

                                        <td><input type="number" min="<?php echo $acikartirmacek['acikartirma_ilkfiyat']  ?>" name="acikartirma_ilkfiyat" value="<?php echo $acikartirmacek['acikartirma_ilkfiyat']  ?>"> </td>
                                        
                                    </tr>
                                </tbody>
                                

                                <tfoot>
                                    <tr class="visible-xs">
                                        <td class="text-center"></td>
                                    </tr>
                                    <tr>
                                        <td><button onclick="geridon()" class="btn btn-warning"><i class="fa fa-angle-left"></i> Geri Dön</button></td>
                                        <td colspan="2" class="hidden-xs"></td>


                                        

                                        <input type="hidden" name="kullanici_idsatici" value="<?php echo $acikartirmacek['kullanici_id'] ?>">
                                        <input type="hidden" name="acikartirma_id" value="<?php echo $acikartirmacek['acikartirma_id']  ?>">
                                        


                                        <td><button name="teklifyap" type="submit"  class="btn btn-success btn-block">Teklif Yap <i class="fa fa-angle-right"></i></button></td>

                                        
                                    </tr>
                                    
                                </tfoot>



                            </table>
                        </form>
                    </div>                                




                </div>
            </div>



        </div>
    </div>
    <!-- Product Details Page End Here -->


    <?php 
    require_once 'footer.php'; 
    ?>

    <script type="text/javascript">

        function geridon(){

            window.history.back();
        }

    </script>