
<?php 

require_once 'header.php'; 

if (empty($_SESSION['userkullanici_mail'])) {

  Header("Location:404.php");
  exit;
}


?>



<!-- Header Area End Here -->

<!-- Inner Page Banner Area Start Here -->
<div class="pagination-area bg-secondary">
  <div class="container">
    <div class="pagination-wrapper">

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






        <div class="settings-details tab-content">
          <div class="tab-pane fade active in" id="Personal">
            <h2 class="title-section">Yeni Siparişler</h2>
            <div class="personal-info inner-page-padding"> 

              <table class="table table-striped">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Tarih</th>
                    <th scope="col">Sipariş No</th>
                    <th scope="col">Alıcı</th>
                    <th scope="col">Ürün Ad</th>
                    <th scope="col">Ürün Fiyat</th>
                    <th scope="col">Durum</th>
                  </tr>
                </thead>
                <tbody>

                  <?php 
                  $acikartirmasor=$db->prepare("SELECT acikartirma.*,kullanici.* FROM acikartirma INNER JOIN kullanici ON kullanici.kullanici_id=acikartirma.alici_id where acikartirma.kullanici_id=:kullanici_idsatici and acikartirma.acikartirma_onay=:onay or acikartirma.acikartirma_onay=:onayy order by acikartirma_zaman DESC");

                  $acikartirmasor->execute(array(
                    'kullanici_idsatici' => $_SESSION['userkullanici_id'],
                    'onay' => 0,
                    'onayy' => 1
                  ));



                  while($acikartirmacek=$acikartirmasor->fetch(PDO::FETCH_ASSOC)) { $say++?>


                    <tr>
                      <th scope="row"><?php echo $say ?></th>
                      <td><?php echo $acikartirmacek['acikartirma_zaman'] ?></td>
                      <td><?php echo $acikartirmacek['acikartirma_id'] ?></td>
                      <td><?php echo $acikartirmacek['kullanici_ad']." ".$acikartirmacek['kullanici_soyad'] ?></td>
                      <td><?php echo $acikartirmacek['acikartirma_ad'] ?></td>
                      <td><?php echo $acikartirmacek['acikartirma_ilkfiyat'] ?></td>
                      <td><?php 

                      if ($acikartirmacek['acikartirma_onay']==0) {?>

                        <a href="admin/netting/kullanici.php?acikartirma-urunteslim=ok&acikartirma_id=<?php echo $acikartirmacek['acikartirma_id'] ?>"><button class="btn btn-warning btn-xs"> Teslim Et</button></a>


                      <?php  } else if ($acikartirmacek['acikartirma_onay']==1) {?>

                        <button class="btn btn-success btn-xs"> Alıcıdan Onay Bekliyor</button>


                      <?php  }

                      ?>

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


<?php require_once 'footer.php'; ?>

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