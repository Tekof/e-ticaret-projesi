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

				



				<form action="admin/netting/kullanici.php" method="POST" class="form-horizontal" id="personal-info-form">

					<div class="settings-details tab-content">
						<div class="tab-pane fade active in" id="Personal">
							<h2 class="title-section">Mağaza Başvuru Formu</h2>
							<div class="personal-info inner-page-padding"> 
								<?php if ($kullanicicek['kullanici_magaza']==0) {?>
									<div class="form-group">
										<label class="col-sm-3 control-label">Mail Adresi</label>
										<div class="col-sm-9">
											<input class="form-control" disabled="" value="<?php echo $kullanicicek['kullanici_mail']?>" type="text">
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label">Banka Adı</label>
										<div class="col-sm-9">
											<input class="form-control" id="first-name" name="kullanici_banka" value="<?php echo $kullanicicek['kullanici_banka']?>" type="text">
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label">IBAN NO</label>
										<div class="col-sm-9">
											<input class="form-control" id="first-name" name="kullanici_iban" value="<?php echo $kullanicicek['kullanici_iban']?>" type="text">
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label">Ad</label>
										<div class="col-sm-9">
											<input class="form-control" id="first-name" name="kullanici_ad" value="<?php echo $kullanicicek['kullanici_ad']?>" type="text">
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label">Soyad</label>
										<div class="col-sm-9">
											<input class="form-control" id="last-name" name="kullanici_soyad" value="<?php echo $kullanicicek['kullanici_soyad']?>" type="text">
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label">Telefon Numarası</label>
										<div class="col-sm-9">
											<input class="form-control"  name="kullanici_gsm" value="<?php echo $kullanicicek['kullanici_gsm']?>" type="text">
										</div>
									</div>

									<div class="form-group">
										<label class="col-sm-3 control-label">Hesap Türü</label>
										<div class="col-sm-9">
											<div class="custom-select">
												<select name="kullanici_tip"  id="kullanici_tip" class='select2'>
													<option 

													<?php if ($kullanicicek['kullanici_tip']=="PERSONAL") {
														echo "selected";
													} ?>	
													value="PERSONAL">Bireysel</option>
													<option

													<?php if ($kullanicicek['kullanici_tip']=="PRIVATE_COMPANY") {
														echo "selected";
													} ?>

													value="PRIVATE_COMPANY">Kurumsal</option>


												</select>
											</div>
										</div>
									</div>
									<div id="tc">
										<div class="form-group">
											<label class="col-sm-3 control-label">Kullanıcı TC</label>
											<div class="col-sm-9">
												<input class="form-control" name="kullanici_tc" value="<?php echo $kullanicicek['kullanici_tc']?>" type="text">
											</div>
										</div>
									</div>
									<div id="kurumsal" >
										<div class="form-group">
											<label class="col-sm-3 control-label">Firma Adı</label>
											<div class="col-sm-9">
												<input class="form-control" name="kullanici_firmaadi" value="<?php echo $kullanicicek['kullanici_firmaadi']?>" type="text">
											</div>
										</div>
										<div class="form-group">
											<label class="col-sm-3 control-label">Firma V. NO</label>
											<div class="col-sm-9">
												<input class="form-control" name="kullanici_vno" value="<?php echo $kullanicicek['kullanici_vno']?>" type="text">
											</div>
										</div>

									</div>


									<div class="form-group">
										<label class="col-sm-3 control-label">İl</label>
										<div class="col-sm-9">
											<input class="form-control" required="" name="kullanici_il" value="<?php echo $kullanicicek['kullanici_il']?>" type="text">
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label">İlçe</label>
										<div class="col-sm-9">
											<input class="form-control" required="" name="kullanici_ilce" value="<?php echo $kullanicicek['kullanici_ilce']?>" type="text">
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label">Adres</label>
										<div class="col-sm-9">
											<input class="form-control" required="" name="kullanici_adres" value="<?php echo $kullanicicek['kullanici_adres']?>" type="text">
										</div>
									</div>
									<div class="form-group">

										<label class="col-sm-3 control-label">Onay</label>
										<div class="checkbox">
											<div class="col-sm-9">
												<label><input type="checkbox" required="" value=""> <strong>Mağaza Sözleşmesi</strong></label>
												<p>Mağaza Sözleşmesinde geçen bilgileri okudum, Kabul Ediyorum.</p>
											</div>
										</div>
									</div>



									<input type="hidden"name="kullanici_id" value="<?php echo $kullanicicek['kullanici_id']?> ">

									<div class="form-group">
										<div align="right" class="col-sm-6">
											<button class="update-btn" name="musterimagazabasvuru" id="login-update">Başvuruyu Tamamla</button>
										</div>
									</div>
								<?php } else if ($kullanicicek['kullanici_magaza']==1) {?>
									<div class="alert alert-warning">
										<strong>Başvurunuz alındı. Sonucunuz en kısa zamanda ulaştırılacaktır.</strong>
									</div>

								<?php } else if ($kullanicicek['kullanici_magaza']==2) {?>
									<div class="alert alert-success">
										<strong>Mağazanız Onaylanmıştır. Mağaza işlemleri kısmından mağazanızı yönetebilirsiniz.</strong>
									</div>
								<?php } ?>


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

<script type="text/javascript">

	$(document).ready(function(){


		$("#kullanici_tip").change(function(){


			var tip=$("#kullanici_tip").val();

			if (tip=="PERSONAL") {


				$("#kurumsal").hide();
				$("#tc").show();



			} else if (tip=="PRIVATE_COMPANY") {

				$("#kurumsal").show();
				$("#tc").hide();

			}


		}).change();



	});

</script>