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


				<div class="settings-details tab-content">
					<div class="tab-pane fade active in" id="Personal">
						<h2 class="title-section">Açık Artırma Ürünlerim</h2>
						<div class="personal-info inner-page-padding"> 
							<table class="table table-striped">
								<thead>
									<tr>
										<th scope="col">#</th>
										<th scope="col">Ürün Eklenme Tarihi</th>
										<th scope="col">Ürün Adı</th>
										<th scope="col">Yapılan Teklif</th>
										<th scope="col"></th>
										<th scope="col"></th>
									</tr>
								</thead>
								<tbody>
									<?php 
									$acikartirmasor=$db->prepare("SELECT * FROM acikartirma where kullanici_id=:kullanici_id and acikartirma.acikartirma_onay=:onay or acikartirma.acikartirma_onay=:onayy order by acikartirma_zaman DESC");
									$acikartirmasor->execute(array(
										'kullanici_id' => $_SESSION['userkullanici_id'],
										'onay' => 0,
										'onayy'=> 1
									));

									$say=0;

									while($acikartirmacek=$acikartirmasor->fetch(PDO::FETCH_ASSOC)) { $say++
										?>
										<tr>
											<th scope="row"><?php echo $say ?> </th>
											<td><?php echo $acikartirmacek['acikartirma_zaman'] ?></td>
											<td><?php echo $acikartirmacek['acikartirma_ad'] ?></td>
											<td><?php echo $acikartirmacek['acikartirma_ilkfiyat'] ?></td>
											<td>
												<?php if ($acikartirmacek['acikartirma_durum']==0) {?>


													<button class="btn btn-warning btn-xs">Onay Bekliyor..</button>
												<?php } else{?>
													<a href="admin/netting/adminislem.php?acikartirma-urunsil=ok&acikartirma_id=<?php echo $acikartirmacek['acikartirma_id']?>&acikartirma_resim=<?php echo $acikartirmacek['acikartirma_resim'] ?>"><button class="btn btn-danger btn-xs">Ürünü Sil</button></a>
												<?php } ?>
											</td>
											<td>
												<?php if ($acikartirmacek['acikartirma_bitir']==0) {?>
													<a href="admin/netting/kullanici.php?acikartirma-bitir=ok&acikartirma_id=<?php echo $acikartirmacek['acikartirma_id']?>&acikartirma_bitir=<?php echo $acikartirmacek['acikartirma_bitir'] ?>&acikartirma_durum=<?php echo $acikartirmacek['acikartirma_durum'] ?>"><button class="btn btn-danger btn-xs">Açık Artırmayı Sonlandır</button></a>
												<?php } else{?>
													<button class="btn btn-warning btn-xs">Açık Artırma Bitti</button>
												<?php } ?>
											</td>
										</tr>
									<?php } ?>

								</tbody>
							</table>





						</div> 
					</div>                       
				</div> 

			</div>  
		</div>  
	</div>  
</div> 
<!-- Settings Page End Here -->
<?php require_once "footer.php" ?>
