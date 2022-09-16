			<div class="col-lg-3 col-md-3 col-sm-4 col-xs-12">
				<ul class="settings-title">
					<li class="active"><a href="javascript:void(0)" >ÜYE İŞLEMLERİ</a></li>

					<?php if ($kullanicicek['kullanici_magaza']!=2) {?>

						<li><a href="magaza-basvuru.php">Mağaza Başvuru</a></li>
					<?php } ?>
					<li><a href="siparislerim.php" >Siparişlerim</a></li>
					<li><a href="acikartirma-siparislerim.php" >Açık Artırma Siparişlerim</a></li>
					<li><a href="hesabim.php" >Hesap Bilgilerim</a></li>
					<li><a href="adres-bilgileri.php">Adres Bilgilerim</a></li>

				</ul>

				<?php if ($kullanicicek['kullanici_magaza']==2) {?>
					<hr>
					<ul class="settings-title">
						<li class="active"><a href="javascript:void(0)" >MAĞAZA İŞLEMLERİ</a></li>
						<li><a href="urun-ekle.php">Ürün Ekle</a></li>
						<li><a href="urunlerim.php" >Ürünlerim</a></li>
						<li><a href="yeni-siparisler.php">Yeni Siparişlerim</a></li>
						<li><a href="tamamlanan-siparisler.php">Tamamlanan Siparişler</a></li>
						<li><a href="acikartirma-urun-ekle.php">Açık Artırma Ürünü Ekle</a></li>
						<li><a href="acikartirma-urunlerim.php" >Açık Artırma Ürünlerim</a></li>
						<li><a href="acikartirma-yeni-siparisler.php">A. Yeni Siparişlerim</a></li>
						<li><a href="acikartirma-tamamlanan-siparisler.php">A. Tamamlanan Siparişler</a></li>

					</ul>
				<?php } ?>

			</div>