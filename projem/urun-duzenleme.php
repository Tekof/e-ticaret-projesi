<?php 
require_once "header.php" 
?>
<?php  
if (!isset($_SESSION['userkullanici_mail'])) {
	header("Location:index.php");
	exit;
}
$urunsor=$db->prepare("SELECT * FROM urun where kullanici_id=:kullanici_id and urun_id=:urun_id order by urun_zaman DESC");
$urunsor->execute(array(
	'kullanici_id' => $_SESSION['userkullanici_id'],
	'urun_id' => $_GET['urun_id']
));
$uruncek=$urunsor->fetch(PDO::FETCH_ASSOC);

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
							<h2 class="title-section">Ürün Düzenle</h2>
							<div class="personal-info inner-page-padding"> 
								<div class="form-group">
									<label class="col-sm-3 control-label">Kullanılan Ürün Fotoğrafı</label>
									<div class="col-sm-9">
										<img width="450" src="<?php echo $uruncek['urunfoto_resimyol'] ?> ">
									</div>
								</div>

								<div class="form-group">
									<label class="col-sm-3 control-label">Fotoğrafı Güncelle</label>
									<div class="col-sm-9">
										<input class="form-control" name="urunfoto_resimyol" type="file">
									</div>
								</div>

								<div class="form-group">
									<label class="col-sm-3 control-label">Kategori</label>
									<div class="col-sm-9">
										<div class="custom-select">
											<select name="kategori_id" class='select2'>
												<?php
												$kategorisor=$db->prepare("SELECT * FROM kategori order by kategori_sira ASC");
												$kategorisor->execute();
												while($kategoricek=$kategorisor->fetch(PDO::FETCH_ASSOC)){
													?>
													<option <?php if ($kategoricek['kategori_id']==$uruncek['kategori_id']) { echo "selected"; } ?> value="<?php echo $kategoricek['kategori_id'] ?>"><?php echo $kategoricek['kategori_ad'] ?></option>
												<?php } ?>


											</select>
										</div>
									</div>
								</div>

								<div class="form-group">
									<label class="col-sm-3 control-label">Ürün Adı</label>
									<div class="col-sm-9">
										<input class="form-control" required="" name="urun_ad" value="<?php echo $uruncek['urun_ad']?>" type="text">
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-3 control-label">Ürün Açıklaması</label>
									<div class="col-sm-9">
										<input class="form-control" required="" name="urun_detay" value="<?php echo $uruncek['urun_detay']?>" type="text">
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-3 control-label">Ürün Fiyat</label>
									<div class="col-sm-9">
										<input class="form-control" required="" name="urun_fiyat" value="<?php echo $uruncek['urun_fiyat']?>" type="text">
									</div>
								</div>



								<input type="hidden"name="urun_id" value="<?php echo $uruncek['urun_id']?>">
								<input type="hidden"name="eski_yol" value="<?php echo $uruncek['urunfoto_resimyol']?>">

								<div class="form-group">
									<div align="right" class="col-sm-6">
										<button class="update-btn" name="magazaurunduzenle" id="login-update">Kaydet</button>
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
