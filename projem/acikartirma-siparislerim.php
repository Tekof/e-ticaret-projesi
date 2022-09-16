
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
            <h2 class="title-section">Açık Artırma Siparişlerim</h2>
            <div class="personal-info inner-page-padding"> 
              <strong>Ürünlerin siparişe düşmesi için satıcının açık artırmayı bitirmesini bekleyiniz...</strong>
              <hr>

              <table class="table table-striped">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Sipariş Tarihi</th>
                    <th scope="col">Sipariş Numarası</th>
                    <th scope="col">Detay</th>
                  </tr>
                </thead>
                <tbody>

                  <?php


                  $acikartirmasor=$db->prepare("SELECT * FROM acikartirma where alici_id=:alici_id and acikartirma_bitir=:acikartirma_bitir order by acikartirma_zaman DESC");
                  
                  $acikartirmasor->execute(array(
                    'alici_id' => $_SESSION['userkullanici_id'],
                    'acikartirma_bitir' => 1
                  ));

                  $say=0;

                  while($acikartirmacek=$acikartirmasor->fetch(PDO::FETCH_ASSOC)) { $say++?>
                    

                    <tr>
                      <th scope="row"><?php echo $say ?></th>
                      <td><?php echo $acikartirmacek['acikartirma_zaman'] ?></td>
                      <td><?php echo $acikartirmacek['acikartirma_id'] ?></td>
                      <td><a href="acikartirma-urundetay?acikartirma_id=<?php echo $acikartirmacek['acikartirma_id'] ?>"><button class="btn btn-primary btn-xs">Detay</button></a></td>
                      
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