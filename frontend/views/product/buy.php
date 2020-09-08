<?php
use frontend\assets\BuyAsset;
use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\widgets\ActiveForm;
use yii\helpers\Url;

$val = Yii::$app->language;
BuyAsset::register($this);
?>
<div class="bg-light my-5 w-100 py-5 m-auto">
  <div class="row p-0 m-0">
    <div class="col-12 col-md-6 p-0 text-center">
      <div id="zoom" class="easyzoom easyzoom--adjacent">
        <a id='img-link' href="/backend/web/upimages/<?= $model->images[0]->path ?>">
          <img id='img-zoom' src="/backend/web/upimages/<?= $model->images[0]->path ?>" alt="<?= $model->name ?>" class="zoom-image">
        </a>
      </div>
      <div class="row p-1">
        <?php
        foreach ($model->images as $img) {
          echo '<div class="col-6">';
          echo Html::img('/backend/web/upimages/' . $img->path, ['class' => 'rest-img', 'alt' => $img->path, ]);
          echo '</div>';
        }
        ?>
      </div>
    </div>
    <div class="col-12 col-md-6">
      <?php
        $info;
        $product_name;
        foreach($model->productnamelanguages as $name_lan) {
          if($name_lan->language->shortname == $val) {
            $product_name = $name_lan->name;
          }
        }

        foreach($model->productlanguages as $info_lan) {
          if($info_lan->language->shortname == $val) {
            $info = $info_lan->name;
          }
        }
      ?>
      <h1><?= $product_name ?></h1>
      <p class="text-justify"><i><?= $info ?></i></p>
      <div class="row m-0 p-0 justify-content-between">
        <div class="col-6 m-0 p-0">
          <div><i class="text-danger"><?= Yii::t('app', 'Price') ?>: </i><b id=productPrice><?= $model->price ?></b>$</div>
          <div><i class="text-danger"><?= Yii::t('app', 'Shipping Price') ?>: </i><b id=shippingPrice>100</b>$</div>
        </div>
        <div class="col-6 m-0 p-0">
          <div class="input-group counter float-right">
            <div class="input-group-prepend">
                <button class="btn btn-outline-danger btn-sm" id="minus-btn"><i class="fa fa-minus"></i></button>
            </div>
            <input type="number" id="qty_input" class="text-center  form-control form-control-sm" value="1" min="1">
            <div class="input-group-prepend">
                <button class="btn btn-outline-success btn-sm" id="plus-btn"><i class="fa fa-plus"></i></button>
            </div>
          </div>
        </div>
      </div>
      <p class="py-4">
        <i class="text-danger"><?= Yii::t('app', 'Total') ?>: </i><b id=totalPrice></b>$
        <?php ?>
      </p>
      <div class="my-4">
        <button class="btn btn-outline-success px-5" onclick="oybek()"><?= Yii::t('app', 'Pay') ?></button>
         <div class="back" id="salom">
                    <div class="login-box">
                      <h2>Excuse me</h2>
                      <a class="close" onclick="oybek1()"><i class="fas fa-times"></i></a>
                      <form>
                        <div class="user-box">
                          <!-- <input type="text" name="" required=""> -->
                          <label>Kechirasiz hozirda saytimiz test rejimda to'lliq tugalanmagan agarda bizdan biror
                            narsa olmoqchi bo'lsangiz quydagi manzillarga murojat qiling</label>
                        </div>
                        <!-- <div class="user-box">
                          <input type="password" name="" required="">
                          <label>Password</label>
                        </div> -->
                        <a href="#">
                          <span></span>
                          <span></span>
                          <span></span>
                          <span></span>
                          +998 (90)-224-43-36
                          +998 (91)-525-14-55
                        </a>
                        <a href="#">
                          <span></span>
                          <span></span>
                          <span></span>
                          <span></span>
                          samren.ikat@gmail.com
                        </a>
                      </form>
                    </div>
                  </div>
      </div>
    </div>
  </div>
</div>

<h2 class="text-blue text-center m-0 pt-3"><?= Yii::t('app', 'Related Products') ?></h2>
<div class="container-fluid p-5 m-auto w-100">
  <div class="owl-slide owl-carousel owl-theme owl-carousel-blog row justify-content-center m-auto">
    <?php foreach ($modelcarusel as $item){
            $name;
            foreach($item->productnamelanguages as $name_lan) {
              if($name_lan->language->shortname == $val) {
                $name = $name_lan->name;
              }
            }
      ?>
    <div class="card-item bg-light">
      <?= Html::a(Html::img('/backend/web/upimages/' . $item->images[0]->path, ['alt' => $name, 'class' => 'card-image']), Url::to(['/product/buy', 'id' => $item->id]), []) ?>
      <div class="card-label p-2">
          <div class="card-name"><?= $name ?></div>
          <div class="card-price text-success"><?= $item->price ?>$</div>
      </div>

      <div class="card-pane m-0">
          <?= Html::a('<i class="fas fa-shopping-cart"></i>', Url::to(['/basket/add', 'id' => $item->id]), ['class' => 'btn btn-block text-center btn-blue']) ?>
      </div>
    </div>
    <?php } ?>
  </div>
</div>
<?php
$script = <<< JS
    $(document).ready(function() {


      $('.owl-slide').owlCarousel(
      {
        items: 5,
        loop: true,
        rewindNav: false,
        autoplay:true,
        autoplayTimeout: 3000,
        autoplayHoverPause: false,
        margin: 30,
        dots: false,
        responsive:{
            0:{ // breakpoint from 0 up - small smartphones
                items:2,
                nav:true,
                loop:true
            },
            570:{  // breakpoint from 480 up - smartphones // landscape
                items:3,
                nav:true,
                loop:true
            },
            990:{ // breakpoint from 768 up - tablets
                items:4,
                nav:true,
                loop:true
            },
            1130:{ // breakpoint from 992 up - desktop
                items:5,
                nav:true,
                loop:true
            }
        }
      });

      var easyzoom = $('.easyzoom').easyZoom();
      var easyzoomAPI = easyzoom.data("easyZoom");
      $('.rest-img').click(function() {
        var src = $(this).attr('src');
        var image = document.getElementById('img-zoom');
        var link = document.getElementById('img-link');
        image.src = src;
        link.href = src;
        easyzoomAPI.swap(image.src, src);
      });

      window.addEventListener('resize', function(event){
        zoomControl();
      });

      $(window).on('load', function(event){
        zoomControl();
        myFunction();
      });

      function zoomControl() {
        var width = $(window).width();
        if(width < 768) {
          $('#zoom').removeClass('easyzoom--adjacent');
          $('#zoom').addClass('easyzoom--overlay');
        } else {
          $('#zoom').addClass('easyzoom--adjacent');
          $('#zoom').removeClass('easyzoom--overlay');
        }
      }

      function myFunction()
      {
        var price = parseInt(document.getElementById('productPrice').innerText);
        var shipPrice=parseInt(document.getElementById("shippingPrice").innerText);
        
        var c = parseInt($('#qty_input').val());
        var t = ((price * c)+shipPrice);


        document.getElementById("totalPrice").innerHTML = (t);
      }

      $('#qty_input').prop('disabled', true);

      $('#plus-btn').click(function(){
        $('#qty_input').val(parseInt($('#qty_input').val()) + 1 );
        myFunction();
      });

      $('#minus-btn').click(function(){
        $('#qty_input').val(parseInt($('#qty_input').val()) - 1 );
        if ($('#qty_input').val() == 0) {
          $('#qty_input').val(1);
        }
        myFunction();
      });
    });

JS;
$this->registerJs($script);
?>

<script type="text/javascript">
  function oybek(){
    var modal = document.getElementById("salom");
    modal.style.display="block";
  }
  function oybek1(){
    var modal = document.getElementById("salom");
    modal.style.display="none";
  }
</script>