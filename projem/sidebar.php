
<div class="fox-sidebar">
    <div class="sidebar-item">
        <div class="sidebar-item-inner">
            <h3 class="sidebar-item-title">Kategoriler</h3>
            <ul class="sidebar-categories-list">

               <?php 

               $kategorisor=$db->prepare("SELECT * FROM kategori where kategori_durum=:durum order by kategori_sira ASC");
               $kategorisor->execute(array(
                'durum' => 1
            ));

               while($kategoricek=$kategorisor->fetch(PDO::FETCH_ASSOC)) { 

                $kategori_id=$kategoricek['kategori_id'];
                ?>


                <li><a href="kategoriler-<?=seo($kategoricek['kategori_ad'])."-".$kategoricek['kategori_id'] ?>"><?php echo $kategoricek['kategori_ad'] ?><span>

                </span></a></li>

            <?php } ?>
        </ul>
    </div>
</div>
   

</div>
