
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
            <h2 class="title-section">Tamamlanan Siparişler</h2>
            <div class="personal-info inner-page-padding"> 

              <table class="table table-striped">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Sipariş No</th>
                    <th scope="col">Ürün Ad</th>
                    <th scope="col">Ürün Fiyat</th>
                    <th scope="col">Durum</th>
                  </tr>
                </thead>
                <tbody>

                  <?php 
                  $acikartirmasor=$db->prepare("SELECT kullanici.*,acikartirma.* FROM acikartirma INNER JOIN kullanici ON kullanici.kullanici_id=acikartirma.kullanici_id where acikartirma.kullanici_id=:kullanici_idsatici and acikartirma.acikartirma_onay=:onay  order by acikartirma_zaman DESC");

                  $acikartirmasor->execute(array(
                    'kullanici_idsatici' => $_SESSION['userkullanici_id'],
                    'onay' => 2
                   
                  ));


                  while($acikartirmacek=$acikartirmasor->fetch(PDO::FETCH_ASSOC)) { $say++?>


                  <tr>
                    <th scope="row"><?php echo $say ?></th>
                    
                    <td><?php echo $acikartirmacek['acikartirma_id'] ?></td>
                    <td><?php echo $acikartirmacek['acikartirma_ad'] ?></td>
                    <td><?php echo $acikartirmacek['acikartirma_ilkfiyat'] ?></td>
                    <td><button class="btn btn-success btn-xs"> Tamamlandı</button></td>

                  

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