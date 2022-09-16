﻿
<?php 

require_once 'header.php'; 

if (empty($_SESSION['userkullanici_mail'])) {
  
  Header("Location:404.php");
  exit;
}

?>
<head>
  <style type="text/css">

    input {

      margin-left: 20px !important;

    }


  </style>
</head>


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
            <h2 class="title-section"><?php echo $_GET['siparis_id'] ?> numaralı sipariş detayı</h2>
            <div class="personal-info inner-page-padding"> 

              <table class="table table-striped">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Ürün Adı</th>
                    <th scope="col">Satıcı</th>
                    <th scope="col">Fiyat</th>
                    <th scope="col">Onay Durumu</th>
                  </tr>
                </thead>
                <tbody>

                  <?php 
                  $siparissor=$db->prepare("SELECT urun.*,kullanici.*,siparis.*,siparis_detay.*  FROM siparis INNER JOIN siparis_detay ON siparis.siparis_id=siparis_detay.siparis_id INNER JOIN urun ON urun.urun_id=siparis_detay.urun_id INNER JOIN kullanici ON kullanici.kullanici_id=siparis_detay.kullanici_idsatici where siparis.siparis_id=:siparis_detay_id ");

                  $siparissor->execute(array(
                    'siparis_detay_id' => $_GET['siparis_id']
                  ));

                  $say=0;

                  while($sipariscek=$siparissor->fetch(PDO::FETCH_ASSOC)) { $say++;


                    $siparisdetay_onay=$sipariscek['siparisdetay_onay'];
                    $urun_id=$sipariscek['urun_id'];

                    ?>


                    <tr>
                      <th scope="row"><?php echo $say ?></th>
                      <td><?php echo $sipariscek['urun_ad'] ?></td>
                      <td><?php echo $sipariscek['kullanici_ad']." ".$sipariscek['kullanici_soyad'] ?></td>
                      <td><?php echo $sipariscek['urun_fiyat'] ?></td>
                      <td><?php 

                      if ($sipariscek['siparisdetay_onay']==1) {?>

                        <a href="admin/netting/kullanici.php?urunonay=ok&siparisdetay_id=<?php echo $sipariscek['siparisdetay_id'] ?>&siparis_id=<?php echo $sipariscek['siparis_id'] ?>"><button class="btn btn-warning btn-xs"> Onay Ver</button></a>

                      <?php  } else if ($sipariscek['siparisdetay_onay']==2) {?>

                        <button class="btn btn-success btn-xs"> Onaylandı</button>

                      <?php  } else if ($sipariscek['siparisdetay_onay']==0) {?>

                      <button class="btn btn-warning btn-xs"> Teslim Edilmesi Bekleniyor</button>  


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