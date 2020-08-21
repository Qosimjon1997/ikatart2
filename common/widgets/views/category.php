<?php
use frontend\assets\CategoryAsset;
use yii\widgets\Pjax;
use yii\helpers\Html;
use yii\helpers\Url;
CategoryAsset::register($this);
?>
    <p style="margin: auto; color: rgb(8, 2, 83); font-size: 30px;
        text-align: center; font-weight: 500; text-shadow: rgb(128, 253, 11);">Works by regions</p>
      <?php Pjax::begin(['enablePushState' => false]); ?>
      <div class="row">
        <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 ml-5 ml-sm-0 blogBox moreBox">
        <div class="slider-box1">
                    <div class="img-box1">
                    <a href="product/view2&id=24">
                      <img src="img/load/1.jpg">
                      <p >Women's Clothing</p>
                    </a>
                    </div>
                     <div class="product1">
                      <p>$40.00</p>
                    </div>
                    <div class="icon-panel">
                      <div class="cart1">
                        <?= Html::a('<i class="fas fa-shopping-cart"></i>', Url::to(['basket/add', 'id' => 3])) ?>
                      </div>
                      <div class="heart1">
                          <a href="#"><i class="far fa-heart" ></i></a>
                      </div>
                      <div class="buy1">
                          <a href="#"> Buy</a>
                        </div>
                     </div>
                    </div>
        </div>
        <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 ml-5 ml-sm-0 blogBox moreBox">
        <div class="slider-box1 c-right">
                    <div class="img-box1">
                    <a href="product/view2&id=24">
                      <img src="img/load/2.jpg">
                      <p >Fabric Ikat
</p>
                      </a>
                    </div>


                     <div class="product1">
                      <p>$40.00</p>
                    </div>
                    <div class="icon-panel">
                      <div class="cart1">
                        <?= Html::a('<i class="fas fa-shopping-cart"></i>', Url::to(['basket/add', 'id' => 4])) ?>
                      </div>
                      <div class="heart1">
                          <a href="#"><i class="far fa-heart" ></i></a>
                      </div>
                      <div class="buy1">
                          <a href="#"> Buy</a>
                        </div>
                     </div>
                  </div>
        </div>
        <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 ml-5 ml-sm-0 blogBox moreBox">
        <div class="slider-box1">
                    <div class="img-box1">
                    <a href="product/view2&id=24">
                      <img src="img/load/3.jpg">
                      <p >Suzani</p>
                      </a>
                    </div>


                     <div class="product1">
                      <p>$40.00</p>
                    </div>
                    <div class="icon-panel">
                      <div class="cart">
                        <a  href="#" id="button"> <i class="fas fa-shopping-cart"></i></a>
                      </div>
                      <div class="heart1">
                          <a href="#"><i class="far fa-heart" ></i></a>
                      </div>
                      <div class="buy1">
                          <a href="#"> Buy </a>
                        </div>
                     </div>
                  </div>
        </div>
        <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 ml-5 ml-sm-0 blogBox moreBox" style="display: none;">
        <div class="slider-box1">
                    <div class="img-box1">
                    <a href="product/view2&id=24">
                      <img src="img/load/4.jpg">
                      <p >Women's bags</p>
                      </a>
                    </div>


                     <div class="product1">
                      <p>$40.00</p>
                    </div>
                    <div class="icon-panel">
                      <div class="cart1">
                        <a  href="#" id="button"> <i class="fas fa-shopping-cart"></i></a>
                      </div>
                      <div class="heart1">
                          <a href="#"><i class="far fa-heart" ></i></a>
                      </div>
                      <div class="buy1">
                          <a href="#"> Buy </a>
                        </div>
                     </div>
                  </div>
        </div>
        <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 ml-5 ml-sm-0 blogBox moreBox" style="display: none;">
        <div class="slider-box1">
                    <div class="img-box1">
                    <a href="product/view2&id=24">
                      <img src="img/load/5.jpg">
                      <p >Men's Clothing </p>
                      </a>
                    </div>


                     <div class="product1">
                      <p>$40.00</p>
                    </div>
                    <div class="icon-panel">
                      <div class="cart1">
                        <a  href="#" id="button"> <i class="fas fa-shopping-cart"></i></a>
                      </div>
                      <div class="heart1">
                          <a href="#"><i class="far fa-heart" ></i></a>
                      </div>
                      <div class="buy1">
                          <a href="#"> Buy </a>
                        </div>
                     </div>
                  </div>
        </div>
        <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 ml-5 ml-sm-0 blogBox moreBox" style="display: none;">
        <div class="slider-box1">
                    <div class="img-box1">
                    <a href="product/view2&id=24">
                      <img src="img/load/6.jpg">
                      <p >Miniature</p>
                      </a>
                    </div>


                     <div class="product1">
                      <p>$40.00</p>
                    </div>
                    <div class="icon-panel">
                      <div class="cart1">
                        <a  href="#" id="button"> <i class="fas fa-shopping-cart"></i></a>
                      </div>
                      <div class="heart1">
                          <a href="#"><i class="far fa-heart" ></i></a>
                      </div>
                      <div class="buy1">
                          <a href="#"> Buy </a>
                        </div>
                     </div>
                  </div>
        </div>

        <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 ml-5 ml-sm-0 blogBox moreBox" style="display: none;">
        <div class="slider-box1">
                    <div class="img-box1">
                    <a href="product/view2&id=24">
                      <img src="img/load/7.jpg">
                      <p >Pillows</p>
                      </a>
                    </div>


                     <div class="product1">
                      <p>$40.00</p>
                    </div>
                    <div class="icon-panel">
                      <div class="cart1">
                        <a  href="#" id="button"> <i class="fas fa-shopping-cart"></i></a>
                      </div>
                      <div class="heart1">
                          <a href="#"><i class="far fa-heart" ></i></a>
                      </div>
                      <div class="buy1">
                          <a href="#"> Buy </a>
                        </div>
                     </div>
                  </div>
        </div>

        <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 ml-5 ml-sm-0 blogBox moreBox" style="display: none;">
        <div class="slider-box1">
                    <div class="img-box1">
                    <a href="product/view2&id=24">
                      <img src="img/load/8.jpg">
                      <p >Paintings</p>
                      </a>
                    </div>


                     <div class="product1">
                      <p>$40.00</p>
                    </div>
                    <div class="icon-panel">
                      <div class="cart1">
                        <a  href="#" id="button"> <i class="fas fa-shopping-cart"></i></a>
                      </div>
                      <div class="heart1">
                          <a href="#"><i class="far fa-heart" ></i></a>
                      </div>
                      <div class="buy1">
                          <a href="#"> Buy </a>
                        </div>
                     </div>
                  </div>
        </div>

        <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 ml-5 ml-sm-0 blogBox moreBox" style="display: none;">
        <div class="slider-box1">
                    <div class="img-box1">
                    <a href="product/view2&id=24">
                      <img src="img/load/9.jpg">
                      <p >Ceramics</p>
                      </a>
                    </div>


                     <div class="product1">
                      <p>$40.00</p>
                    </div>
                    <div class="icon-panel">
                      <div class="cart1">
                        <a  href="#" id="button"> <i class="fas fa-shopping-cart"></i></a>
                      </div>
                      <div class="heart1">
                          <a href="#"><i class="far fa-heart" ></i></a>
                      </div>
                      <div class="buy1">
                          <a href="#"> Buy </a>
                        </div>
                     </div>
                  </div>
        </div>
        <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 ml-5 ml-sm-0 blogBox moreBox" style="display: none;">
        <div class="slider-box1">
                    <div class="img-box1">
                    <a href="product/view2&id=24">
                      <img src="img/load/10.jpg">
                      <p >Carpets</p>
                      </a>
                    </div>


                     <div class="product1">
                      <p>$40.00</p>
                    </div>
                    <div class="icon-panel">
                      <div class="cart1">
                        <a  href="#" id="button"> <i class="fas fa-shopping-cart"></i></a>
                      </div>
                      <div class="heart1">
                          <a href="#"><i class="far fa-heart" ></i></a>
                      </div>
                      <div class="buy1">
                          <a href="#"> Buy </a>
                        </div>
                     </div>
                  </div>
        </div>
        <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 ml-5 ml-sm-0 blogBox moreBox" style="display: none;">
        <div class="slider-box1">
                    <div class="img-box1">
                    <a href="product/view2&id=24">
                      <img src="img/load/11.jpg">
                      <p >Caskets</p>
                      </a>
                    </div>


                     <div class="product1">
                      <p>$40.00</p>
                    </div>
                    <div class="icon-panel">
                      <div class="cart1">
                        <a  href="#" id="button"> <i class="fas fa-shopping-cart"></i></a>
                      </div>
                      <div class="heart1">
                          <a href="#"><i class="far fa-heart" ></i></a>
                      </div>
                      <div class="buy1">
                          <a href="#"> Buy </a>
                        </div>
                     </div>
                  </div>
        </div>
        <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 ml-5 ml-sm-0 blogBox moreBox" style="display: none;">
        <div class="slider-box1">
                    <div class="img-box1">
                    <a href="product/view2&id=24">
                      <img src="img/load/12.jpg">
                      <p >Bijouterie</p>
                      </a>
                    </div>


                     <div class="product1">
                      <p>$40.00</p>
                    </div>
                    <div class="icon-panel">
                      <div class="cart1">
                        <a  href="#" id="button"> <i class="fas fa-shopping-cart"></i></a>
                      </div>
                      <div class="heart1">
                          <a href="#"><i class="far fa-heart" ></i></a>
                      </div>
                      <div class="buy1">
                          <a href="#"> Buy </a>
                        </div>
                     </div>
                  </div>
        </div>
        <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 ml-5 ml-sm-0 blogBox moreBox" style="display: none;">
        <div class="slider-box1">
                    <div class="img-box1">
                    <a href="product/view2&id=24">
                      <img src="img/load/13.jpg">
                      <p >Dried fruits</p>
                      </a>
                    </div>


                     <div class="product1">
                      <p>$40.00</p>
                    </div>
                    <div class="icon-panel">
                      <div class="cart1">
                        <a  href="#" id="button"> <i class="fas fa-shopping-cart"></i></a>
                      </div>
                      <div class="heart1">
                          <a href="#"><i class="far fa-heart" ></i></a>
                      </div>
                      <div class="buy1">
                          <a href="#"> Buy </a>
                        </div>
                     </div>
                  </div>
        </div>
        <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 ml-5 ml-sm-0 blogBox moreBox" style="display: none;">
        <div class="slider-box1">
                    <div class="img-box1">
                    <a href="product/view2&id=24">
                      <img src="img/load/14.jpg">
                      <p >Tea/Spices</p>
                      </a>
                    </div>


                     <div class="product1">
                      <p>$40.00</p>
                    </div>
                    <div class="icon-panel">
                      <div class="cart1">
                        <a  href="#" id="button"> <i class="fas fa-shopping-cart"></i></a>
                      </div>
                      <div class="heart1">
                          <a href="#"><i class="far fa-heart" ></i></a>
                      </div>
                      <div class="buy">
                          <a href="#"> Buy </a>
                        </div>
                     </div>
                  </div>
        </div>
        <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 ml-5 ml-sm-0 blogBox moreBox" style="display: none;">
        <div class="slider-box1">
                    <div class="img-box1">
                    <a href="product/view2&id=24">
                      <img src="img/load/15.jpg">
                      <p >Knives </p>
                      </a>
                    </div>


                     <div class="product1">
                      <p>$40.00</p>
                    </div>
                    <div class="icon-panel">
                      <div class="cart1">
                        <a  href="#" id="button"> <i class="fas fa-shopping-cart"></i></a>
                      </div>
                      <div class="heart1">
                          <a href="#"><i class="far fa-heart" ></i></a>
                      </div>
                      <div class="buy1">
                          <a href="#"> Buy </a>
                        </div>
                     </div>
                  </div>
        </div>
        <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 ml-5 ml-sm-0 blogBox moreBox" style="display: none;">
        <div class="slider-box1">
                    <div class="img-box1">
                    <a href="product/view2&id=24">
                      <img src="img/load/16.jpg">
                      <p >Chasing</p>
                      </a>
                    </div>


                     <div class="product1">
                      <p>$40.00</p>
                    </div>
                    <div class="icon-panel">
                      <div class="cart1">
                        <a  href="#" id="button"> <i class="fas fa-shopping-cart"></i></a>
                      </div>
                      <div class="heart1">
                          <a href="#"><i class="far fa-heart" ></i></a>
                      </div>
                      <div class="buy1">
                          <a href="#"> Buy </a>
                        </div>
                     </div>
                  </div>
        </div>
        <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 ml-5 ml-sm-0 blogBox moreBox" style="display: none;">
        <div class="slider-box1">
                    <div class="img-box1">
                    <a href="product/view2&id=24">
                      <img src="img/load/17.jpg">
                      <p >Scarfs Belts </p>
                      </a>
                    </div>


                     <div class="product1">
                      <p>$40.00</p>
                    </div>
                    <div class="icon-panel">
                      <div class="cart1">
                        <a  href="#" id="button"> <i class="fas fa-shopping-cart"></i></a>
                      </div>
                      <div class="heart1">
                          <a href="#"><i class="far fa-heart" ></i></a>
                      </div>
                      <div class="buy1">
                          <a href="#"> Buy </a>
                        </div>
                     </div>
                  </div>
        </div>
        <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 ml-5 ml-sm-0 blogBox moreBox" style="display: none;">
        <div class="slider-box1">
                    <div class="img-box1">
                    <a href="product/view2&id=24">
                      <img src="img/load/18.jpg">
                      <p >Furniture</p>
                      </a>
                    </div>


                     <div class="product1">
                      <p>$40.00</p>
                    </div>
                    <div class="icon-panel">
                      <div class="cart1">
                        <a  href="#" id="button"> <i class="fas fa-shopping-cart"></i></a>
                      </div>
                      <div class="heart1">
                          <a href="#"><i class="far fa-heart" ></i></a>
                      </div>
                      <div class="buy1">
                          <a href="#"> Buy </a>
                        </div>
                     </div>
                  </div>
        </div>
        <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 ml-5 ml-sm-0 blogBox moreBox" style="display: none;">
        <div class="slider-box1">
                    <div class="img-box1">
                    <a href="product/view2&id=24">
                      <img src="img/load/19.jpg">
                      <p >Woodcarving</p>
                      </a>
                    </div>


                     <div class="product1">
                      <p>$40.00</p>
                    </div>
                    <div class="icon-panel">
                      <div class="cart1">
                        <a  href="#" id="button"> <i class="fas fa-shopping-cart"></i></a>
                      </div>
                      <div class="heart1">
                          <a href="#"><i class="far fa-heart" ></i></a>
                      </div>
                      <div class="buy1">
                          <a href="#"> Buy </a>
                        </div>
                     </div>
                  </div>
        </div>
        <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 ml-5 ml-sm-0 blogBox moreBox" style="display: none;">
        <div class="slider-box1">
                    <div class="img-box1">
                    <a href="product/view2&id=24">
                      <img src="img/load/20.jpg">
                      <p >Yurts</p>
                      </a>
                    </div>


                     <div class="product1">
                      <p>$40.00</p>
                    </div>
                    <div class="icon-panel">
                      <div class="cart1">
                        <a  href="#" id="button"> <i class="fas fa-shopping-cart"></i></a>
                      </div>
                      <div class="heart1">
                          <a href="#"><i class="far fa-heart" ></i></a>
                      </div>
                      <div class="buy1">
                          <a href="#"> Buy </a>
                        </div>
                     </div>
                  </div>
        </div>
        <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 ml-5 ml-sm-0 blogBox moreBox" style="display: none;">
        <div class="slider-box1">
                    <div class="img-box1">
                    <a href="product/view2&id=24">
                      <img src="img/load/21.jpg">
                      <p >Uzbek picture</p>
                      </a>
                    </div>


                     <div class="product1">
                      <p>$40.00</p>
                    </div>
                    <div class="icon-panel">
                      <div class="cart1">
                        <a  href="#" id="button"> <i class="fas fa-shopping-cart"></i></a>
                      </div>
                      <div class="heart1">
                          <a href="#"><i class="far fa-heart" ></i></a>
                      </div>
                      <div class="buy1">
                          <a href="#"> Buy </a>
                        </div>
                     </div>
                  </div>
        </div>
        <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 ml-5 ml-sm-0 blogBox moreBox" style="display: none;">
        <div class="slider-box1">
                    <div class="img-box1">
                    <a href="product/view2&id=24">
                      <img src="img/load/18.jpg">
                      <p >Uzbek picture</p>
                      </a>
                    </div>


                     <div class="product1">
                      <p>$40.00</p>
                    </div>
                    <div class="icon-panel">
                      <div class="cart1">
                        <a  href="#" id="button"> <i class="fas fa-shopping-cart"></i></a>
                      </div>
                      <div class="heart1">
                          <a href="#"><i class="far fa-heart" ></i></a>
                      </div>
                      <div class="buy1">
                          <a href="#"> Buy </a>
                        </div>
                     </div>
                  </div>
        </div>
        <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 ml-5 ml-sm-0 blogBox moreBox" style="display: none;">
        <div class="slider-box1">
                    <div class="img-box1">
                    <a href="product/view2&id=24">
                      <img src="img/load/19.jpg">
                      <p >Uzbek picture</p>
                      </a>
                    </div>


                     <div class="product1">
                      <p>$40.00</p>
                    </div>
                    <div class="icon-panel">
                      <div class="cart1">
                        <a  href="#" id="button"> <i class="fas fa-shopping-cart"></i></a>
                      </div>
                      <div class="heart1">
                          <a href="#"><i class="far fa-heart" ></i></a>
                      </div>
                      <div class="buy1">
                          <a href="#"> Buy </a>
                        </div>
                     </div>
                  </div>
        </div>
        <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 ml-5 ml-sm-0 blogBox moreBox" style="display: none;">
        <div class="slider-box1">
                    <div class="img-box1">
                    <a href="product/view2&id=24">
                      <img src="img/load/20.jpg">
                      <p >Uzbek picture</p>
                      </a>
                    </div>


                     <div class="product1">
                      <p>$40.00</p>
                    </div>
                    <div class="icon-panel">
                      <div class="cart1">
                        <a  href="#" id="button"> <i class="fas fa-shopping-cart"></i></a>
                      </div>
                      <div class="heart1">
                          <a href="#"><i class="far fa-heart" ></i></a>
                      </div>
                      <div class="buy1">
                          <a href="#"> Buy </a>
                        </div>
                     </div>
                  </div>
        </div>
        <!-- <div id="loadMore" style="margin: -30px 0; display: inline-block">
          <a href="#">Load More</a>
        </div> -->
      </div>
      <?php Pjax::end()?>
  <script>
    $(document).ready(function () {
      $(".moreBox").slice(0, 24).show();
      if ($(".blogBox:hidden").length != 0) {
        $("#loadMore").show();
      }
      $("#loadMore").on('click', function (e) {
        e.preventDefault();
        $(".moreBox").slice(0, 20).slideDown();
        if ($(".blogBox:hidden").length != 0) {
          $("#loadMore").show();
        }
        $("#loadMore").on('click', function (e) {
          e.preventDefault();
          $(".moreBox").slice(0, 20).slideDown();
          if ($(".blogBox:hidden").length != 0) {
            $("#loadMore").show();
          }
          $("#loadMore").on('click', function (e) {
            e.preventDefault();
            $(".moreBox").slice(0, 21).slideDown();
            if ($(".blogBox:hidden").length != 0) {
              $("#loadMore").show();
            }
          });
        });
      });
    });
  </script>