<?php 
require_once "header.php" 
?>
<?php  
if (!isset($_SESSION['userkullanici_mail'])) {
	header("Location:index.php");
	exit;
}

?>
<!-- Header Area End Here -->

<!-- Inner Page Banner Area Start Here -->
<div class="pagination-area bg-secondary">
	<div class="container">
		<div class="pagination-wrapper">
			<ul>
			</ul>
		</div>
	</div>  
</div> 
<!-- Inner Page Banner Area End Here -->          
<!-- Settings Page Start Here -->
<div class="settings-page-area bg-secondary section-space-bottom">
	<div class="container">
		<div class="row settings-wrapper">
			<?php require_once 'hesap-sidebar.php' ?>
			<div class="col-lg-9 col-md-9 col-sm-8 col-xs-12">
				<?php 


				if ($_GET['durum']=="no") {?>

					<div class="alert alert-danger">
						<strong> İşlem Başarısız.</strong>
					</div>

				<?php } elseif ($_GET['durum']=="ok") { ?>

					<div class="alert alert-success">
						<strong>İşlem Başarıyla Gerçekleşti.</strong>
					</div>
					
				<?php } ?>

				<form action="admin/netting/adminislem.php" method="POST" enctype="multipart/form-data" class="form-horizontal" id="personal-info-form">

					<div class="settings-details tab-content">
						<div class="tab-pane fade active in" id="Personal">
							<h2 class="title-section">Ürün Ekle</h2>
							<div class="personal-info inner-page-padding"> 

								<div class="form-group">
									<label class="col-sm-3 control-label">Ürün Fotoğrafı</label>
									<div class="col-sm-9">
										<input required="" class="form-control" name="urunfoto_resimyol" type="file">
									</div>
								</div>

                            <div class="form-group">
                                <label class="col-sm-3 control-label">Kategori</label>
                                <div class="col-sm-9">
                                    <div class="custom-select">
                                        <select name="kategori_id"  class='select2'>

                                            <?php 
                                            $kategorisor=$db->prepare("SELECT * FROM kategori order by kategori_sira ASC");
                                            $kategorisor->execute();

                                            while($kategoricek=$kategorisor->fetch(PDO::FETCH_ASSOC)) {
                                                ?>
                                                <option value="<?php echo $kategoricek['kategori_id'] ?>"><?php echo $kategoricek['kategori_ad'] ?></option>

                                                <?php } ?>

                                            </select>
                                        </div>
                                    </div>
                                </div>

								<div class="form-group">
									<label class="col-sm-3 control-label">Ürün Adı</label>
									<div class="col-sm-9">
										<input class="form-control" required="" name="urun_ad" placeholder="Ürün Adı" type="text">
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-3 control-label">Ürün Açıklaması</label>
									<div class="col-sm-9">
										<input class="form-control" required="" name="urun_detay" placeholder="Ürün Detayları" type="text">
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-3 control-label">Ürün Fiyat</label>
									<div class="col-sm-9">
										<input class="form-control" required="" name="urun_fiyat" placeholder="Ürün Fiyatı" type="text">
									</div>
								</div>



								<input type="hidden"name="kullanici_id" value="<?php echo $kullanicicek['kullanici_id']?> ">

								<div class="form-group">
									<div align="right" class="col-sm-6">
										<button class="update-btn" name="magazaurunekle" id="login-update">Ürün Ekle</button>
									</div>
								</div>                                        
							</div> 
						</div>                       
					</div> 

				</form> 
			</div>  
		</div>  
	</div>  
</div> 
<!-- Settings Page End Here -->
<?php require_once "footer.php" ?>
