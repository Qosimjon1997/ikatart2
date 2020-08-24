<?php
use frontend\assets\BuyAsset;
BuyAsset::register($this);
?>
<body>

<section class="cart_area section_padding">
    <div class="container">
      <div class="cart_inner">
          <table class="table">
            <thead>
              <tr>
                <th scope="col"><?= Yii::t('app', 'Product') ?></th>
                <th scope="col"><?= Yii::t('app', 'Info') ?></th>
                <th scope="col"><?= Yii::t('app', 'Quantity') ?></th>
                <th></th>
                <th scope="col"><?= Yii::t('app', 'Total') ?></th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td rowspan="2">
                      <div class="easyzoom easyzoom--adjacent">
                        <a href="/frontend/web/img/1.jpg">
                          <img src="/frontend/web/img/1.jpg" alt="" width="243px" height="300px" />
                        </a>
                      </div>
                </td>
                <td rowspan="2">
                  <h3>Uzbek Mebils</h3>
                <p> Ko’zi ojizlar uchun qurilma
                  Biz ko’zi ojizlar uchun qurulma ishlab chiqdik, bu qurilma orqali ko’zi ojizlar yozish ishlarini bajarishlari mumkin, bu qurulmamizga tugmachalar qo’yilgan bo’lib bu orqali hariflarni ajrata olishlari va juda oson tushunishlari mumkin.
                  Bu tugmalarni bosganda harflarni bir biridan farqlash uchun o’zida harxil tovush chiqaradi va bu orqali ko’zi ojizlar oson tushunib olishadi.
                  Ko’zi ojizlar uchun qurilma
                </p>
                </td>
                <td>
                  <h5>$360.00</h5>
                </td>
                <td>
                <div class="product_count">
                    <span class="input-number-decrement"> <i class="ti-minus"></i></span>
                    <input class="input-number" type="text" value="1" min="1" max="10">
                    <span class="input-number-increment"> <i class="ti-plus"></i></span>
                </div>
                </td>
                <td>
                  <h5>$720.00</h5>
                </td>
                </tr>
                <tr>
                  <td colspan="3" style="text-align: center;">
                  <button onclick="oybek()"><?= Yii::t('app', 'Buy') ?></button>
                  <div class="back" id="salom">
                    <div class="login-box">
                      <h2>Excuse me</h2>
                      <a class="close" onclick="oybek1()"><i class="fas fa-times"></i></a>
                      <form>
                        <div class="user-box">
                          <!-- <input type="text" name="" required=""> -->
                          <label><?= Yii::t('app', 'Sorry, our site is currently running in test mode and is not fully finished. If you would like to buy something, please contact the following addresses!') ?></label>
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
                          +998 97 929-18-00
                        </a>
                        <a href="#">
                          <span></span>
                          <span></span>
                          <span></span>
                          <span></span>
                          ueshonqulov652@gmail.com
                        </a>
                        <a href="#">
                          <span></span>
                          <span></span>
                          <span></span>
                          <span></span>
                          ueshonqulov@bk.ru
                        </a>
                      </form>
                    </div>
                  </div>
                  </td>
                </tr>
            </tbody>
          </table>
      </div>
  </section>
            <p style="margin: auto; max-width: 1000px; color: rgb(8, 2, 83); font-size: 30px;
        margin-top: 10px; text-align: center; font-weight: 500; text-shadow: rgb(128, 253, 11);"> New Collection</p>
  <div class="owl-slide owl-carousel owl-theme owl-carousel-blog justify-content-center" style="margin-left: -10px">
                <div class="slider-box">
                    <div class="img-box">
                     <a href="ikat-art.html">
                        <img src="img/slide/1.jpg"></a>
                            <p>Uzbek Plate</p>
                    </div>
                    <div class="product">
                          <p>$40.00</p>
                    </div>
                    <div class="icon-panel">
                      <div class="cart">
                        <a  href="#" id="button"> <i class="fas fa-shopping-cart"></i></a>
                      </div>
                      <div class="heart">
                          <a href="#"><i class="far fa-heart" ></i></a>
                      </div>
                      <div class="buy">
                          <a href="#"> Buy</a>
                        </div>
                     </div>
                   </div>
            <div class="slider-box">
                    <div class="img-box">
                      <img src="img/slide/2.jpg">
                      <p >Uzbek picture</p>
                    </div>


                     <div class="product">
                      <p>$40.00</p>
                    </div>
                    <div class="icon-panel">
                      <div class="cart">
                        <a  href="#" id="button"> <i class="fas fa-shopping-cart"></i></a>
                      </div>
                      <div class="heart">
                          <a href="#"><i class="far fa-heart" ></i></a>
                      </div>
                      <div class="buy">
                          <a href="#"> Buy</a>
                        </div>
                     </div>
                  </div>
            <div class="slider-box">
                <div class="img-box">
                  <img src="img/slide/3.jpg">
                  <p>Women's clothing</p>
                </div>
                <div class="product">
                  <p>$40.00</p>
                </div>
              <div class="icon-panel">
                <div class="cart">
                  <a href="#" id="button"> <i class="fas fa-shopping-cart"></i></a>
                </div>
                <div class="heart">
                  <a href="#"><i class="far fa-heart"></i></a>
                </div>
                <div class="buy">
                  <a href="#"> Buy </a>
                </div>
              </div>
              </div>


            <div class="slider-box">
                <div class="img-box">
                  <img src="img/slide/4.jpg">
                  <p>Uzbek bag</p>
                </div>
                <div class="product">
                  <p>$40.00</p>
                </div>
               <div class="icon-panel">
                <div class="cart">
                  <a  href="#" id="button"> <i class="fas fa-shopping-cart"></i></a>
                </div>
                <div class="heart">
                    <a href="#"><i class="far fa-heart" ></i></a>
                </div>
                <div class="buy">
                    <a href="#"> Buy </a>
                  </div>
               </div>
              </div>


            <div class="slider-box">
                <div class="img-box">
                  <img src="img/slide/5.jpg">
                  <p>Uzbek picture</p>
                </div>
                <div class="product">
                  <p>$40.00</p>
                </div>
               <div class="icon-panel">
                <div class="cart">
                  <a  href="#" id="button"> <i class="fas fa-shopping-cart"></i></a>
                </div>
                <div class="heart">
                    <a href="#"><i class="far fa-heart" ></i></a>
                </div>
                <div class="buy">
                    <a href="#"> Buy </a>
                  </div>
               </div>
              </div>


            <div class="slider-box">
                <div class="img-box">
                  <img src="img/slide/6.jpg">
                  <p>Uzbek Oftobo</p>
                </div>
                <div class="product">
                  <p>$40.00</p>
                </div>
               <div class="icon-panel">
                <div class="cart">
                  <a  href="#" id="button"> <i class="fas fa-shopping-cart"></i></a>
                </div>
                <div class="heart">
                    <a href="#"><i class="far fa-heart" ></i></a>
                </div>
                <div class="buy">
                    <a href="#"> Buy </a>
                  </div>
               </div>
              </div>


            <div class="slider-box">
                <div class="img-box">
                  <img src="img/slide/7.jpg">
                  <p>Uzbek Plate</p>
                </div>
                <div class="product">
                  <p>$40.00</p>
                </div>
               <div class="icon-panel">
                <div class="cart">
                  <a  href="#" id="button"> <i class="fas fa-shopping-cart"></i></a>
                </div>
                <div class="heart">
                    <a href="#"><i class="far fa-heart" ></i></a>
                </div>
                <div class="buy">
                    <a href="#"> Buy </a>
                  </div>
               </div>
              </div>


            <div class="slider-box">
                <div class="img-box">
                  <img src="img/slide/8.jpg">
                  <p>Uzbek Knife</p>
                </div>
                <div class="product">
                  <p>$40.00</p>
                </div>
               <div class="icon-panel">
                <div class="cart">
                  <a  href="#" id="button"> <i class="fas fa-shopping-cart"></i></a>
                </div>
                <div class="heart">
                    <a href="#"><i class="far fa-heart" ></i></a>
                </div>
                <div class="buy">
                    <a href="#"> Buy </a>
                  </div>
               </div>
              </div>


            <div class="slider-box">
                <div class="img-box">
                  <img src="img/slide/9.jpg">
                  <p>Uzbek mebils</p>
                </div>
                <div class="product">
                  <p>$40.00</p>
                </div>
               <div class="icon-panel">
                <div class="cart">
                  <a  href="#" id="button"> <i class="fas fa-shopping-cart"></i></a>
                </div>
                <div class="heart">
                    <a href="#"><i class="far fa-heart" ></i></a>
                </div>
                <div class="buy">
                    <a href="#"> Buy </a>
                  </div>
               </div>
              </div>
              <div class="slider-box">
                <div class="img-box">
                  <img src="img/slide/10.jpg">
                  <p>Uzbek picture</p>
                </div>
                <div class="product">
                  <p>$40.00</p>
                </div>
               <div class="icon-panel">
                <div class="cart">
                  <a  href="#" id="button"> <i class="fas fa-shopping-cart"></i></a>
                </div>
                <div class="heart">
                    <a href="#"><i class="far fa-heart" ></i></a>
                </div>
                <div class="buy">
                    <a href="#"> Buy </a>
                  </div>
               </div>
              </div>

              <div class="slider-box">
                <div class="img-box">
                  <img src="img/slide/11.jpg">
                  <p>Uzbek Plate</p>
                </div>
                <div class="product">
                  <p>$40.00</p>
                </div>
               <div class="icon-panel">
                <div class="cart">
                  <a  href="#" id="button"> <i class="fas fa-shopping-cart"></i></a>
                </div>
                <div class="heart">
                    <a href="#"><i class="far fa-heart" ></i></a>
                </div>
                <div class="buy">
                    <a href="#"> Buy </a>
                  </div>
               </div>
              </div>

              <div class="slider-box">
                <div class="img-box">
                  <img src="img/slide/12.jpg">
                  <p>Men's clothing</p>
                </div>
                <div class="product">
                  <p>$40.00</p>
                </div>
               <div class="icon-panel">
                <div class="cart">
                  <a  href="#" id="button"> <i class="fas fa-shopping-cart"></i></a>
                </div>
                <div class="heart">
                    <a href="#"><i class="far fa-heart" ></i></a>
                </div>
                <div class="buy">
                    <a href="#"> Buy </a>
                  </div>
               </div>
              </div>

              <div class="slider-box">
                <div class="img-box">
                  <img src="img/slide/13.jpg">
                  <p>Uzbek Picture</p>
                </div>
                <div class="product">
                  <p>$40.00</p>
                </div>
               <div class="icon-panel">
                <div class="cart">
                  <a  href="#" id="button"> <i class="fas fa-shopping-cart"></i></a>
                </div>
                <div class="heart">
                    <a href="#"><i class="far fa-heart" ></i></a>
                </div>
                <div class="buy">
                    <a href="#"> Buy </a>
                  </div>
               </div>
              </div>
              <div class="slider-box">
                <div class="img-box">
                  <img src="img/slide/14.jpg">
                  <p>Uzbek ear-ring</p>
                </div>
                <div class="product">
                  <p>$40.00</p>
                </div>
               <div class="icon-panel">
                <div class="cart">
                  <a  href="#" id="button"> <i class="fas fa-shopping-cart"></i></a>
                </div>
                <div class="heart">
                    <a href="#"><i class="far fa-heart" ></i></a>
                </div>
                <div class="buy">
                    <a href="#"> Buy </a>
                  </div>
               </div>
              </div>
        </div>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery-3.2.1.min.js.download" type="text/javascript"></script>
        <script src="js/jquery.slicknav.min.js.download" type="text/javascript"></script>
        <script src="js/owl.carousel.min.js.download" type="text/javascript"></script>
        <script src="js/jquery.nicescroll.min.js.download" type="text/javascript"></script>
        <script src="js/easyzoom.js"></script>
  <script>
    $('.owl-slide').owlCarousel(
      {
                items: 4,
                loop: true,
                rewindNav: false,
                autoplay:true,
                autoplayTimeout:3000,
                autoplayHoverPause: true,
                margin: 20,
                dots: false,
                responsive:{
                    0:{ // breakpoint from 0 up - small smartphones
                        items:1,
                        nav:true
                    },
                    570:{  // breakpoint from 480 up - smartphones // landscape
                        items:2,
                        nav:false
                    },
                    990:{ // breakpoint from 768 up - tablets
                        items:3,
                        nav:true,
                        loop:true
                    },
                    1130:{ // breakpoint from 992 up - desktop
                        items:4,
                        nav:true,
                        loop:true
                    }
                }

    })

  </script>
  	<script>
		var _gaq=[['_setAccount','UA-2508361-9'],['_trackPageview']];
		(function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];
		g.src=('https:'==location.protocol?'//ssl':'//www')+'.google-analytics.com/ga.js';
		s.parentNode.insertBefore(g,s)}(document,'script'));
	</script>
  <script>
  // Instantiate EasyZoom instances
  var $easyzoom = $('.easyzoom').easyZoom();

// Setup thumbnails example
var api1 = $easyzoom.filter('.easyzoom--with-thumbnails').data('easyZoom');

$('.thumbnails').on('click', 'a', function(e) {
  var $this = $(this);

  e.preventDefault();

  // Use EasyZoom's `swap` method
  api1.swap($this.data('standard'), $this.attr('href'));
});

// Setup toggles example
var api2 = $easyzoom.filter('.easyzoom--with-toggle').data('easyZoom');

$('.toggle').on('click', function() {
  var $this = $(this);

  if ($this.data("active") === true) {
    $this.text("Switch on").data("active", false);
    api2.teardown();
  } else {
    $this.text("Switch off").data("active", true);
    api2._init();
  }
});
function oybek(){
  var modal = document.getElementById("salom");
  modal.style.display="block";
}
function oybek1(){
  var modal = document.getElementById("salom");
  modal.style.display="none";
}
</script>
<body>