<?php
use frontend\assets\FooterAsset;
FooterAsset::register($this);
?>
   <!-- Footer Start-->
   <section class="footer-section">
    <div class="container">
          <div class="footer-logo text-center">
          <!-- <a href="#"><img src="./img/logo-light.png" alt=""></a> -->
          </div>
    <div class="row">
      <div class="col-lg-3 col-sm-6">
        <div class="footer-widget about-widget">
          <img src="/frontend/web/img/footer.jpg" alt="">
          <!-- <h2>About</h2>
          <p>you will never regret choosing our services and you will have the best services and antiques.</p> -->
          <img src="/frontend/web/img/cards.png" alt="">
        </div>
      </div>
    <div class="col-6">
    <div class="footer-widget about-widget">
             <!-- <h2>About</h2> -->
          <p><?= Yii::t('app', 'You will never regret choosing our services and you will have the best services and antiques.') ?></p>

            </div>
    </div>
    <!-- <div class="col-lg-3 col-sm-6"> -->
        <!-- <div class="footer-widget about-widget"> -->
                          <!-- <h2><?= Yii::t('app', 'Questions') ?></h2> -->
                            <!-- <ul> -->
                            <!-- <li><a href="#"><?= Yii::t('app', 'About Us') ?></a></li> -->
                            <!-- <li><a href="#">Track Orders</a></li> -->
                            <!-- <li><a href="#">Returns</a></li> -->
                            <!-- <li><a href="#">Jobs</a></li> -->
                            <!-- <li><a href="#"><?= Yii::t('app', 'Shipping') ?></a></li> -->
                            <!-- <li><a href="#"><?= Yii::t('app', 'Blog') ?></a></li> -->
                            <!-- </ul> -->

                <!-- </div> -->
        <!-- </div> -->

    <div class="col-lg-3 col-sm-6">
      <div class="footer-widget contact-widget">
      <h2><?= Yii::t('app', 'Contacts') ?></h2>
          <div class="con-info">
            <span><?= Yii::t('app', 'Company') ?>:</span>
            <p>Samarkand-Renaissance</p>
          </div>
          <div class="con-info">
            <span><?= Yii::t('app', 'Address') ?>:</span>
            <p><?= Yii::t('app', 'Samarkand City') ?></p>
          </div>
          <div class="con-info">
          <span><?= Yii::t('app', 'Phone') ?>:</span>
          <p>+998 90 224-43-36</p>
          </div>
          <div class="con-info" style="width: 500px;">
          <span><?= Yii::t('app', 'Email') ?>:</span>
            <p>ikat-art@gmail.com</p>
          </div>
          <div class="con-info">
            <span><?= Yii::t('app', 'Technical support') ?>:</span>
              <p>+998 97 929-18-00</p>
            </div>
      </div>
    </div>
    </div>
</div>
<div class="social-links-warp">
      <div class="container">
              <div class="social-links">
                            <a href="#" class="instagram"><i class="fab fa-2x fa-instagram"></i></a>
                            <a href="#" class="google-plus"><i class="fab fa-2x fa-google-plus"></i></a>
                            <a href="#" class="facebook"><i class="fab fa-2x fa-facebook-square"></i></a>
                            <a href="#" class="youtube"><i class="fab fa-2x fa-youtube-square"></i></a>
              </div>
      <p class="text-white text-center" style="color: white; margin-top: 10px">
        <script type="text/javascript" async="" src="/frontend/web/js/analytics.js.download"></script>
        <script type="text/javascript">document.write(new Date().getFullYear());</script> IKAT-ART.COM
        <i class="fab fa-1x fa fa-heart" aria-hidden="true"></i> <a href="https://colorlib.com/" target="_blank"></a></p>
        </div>
</div>
</section>