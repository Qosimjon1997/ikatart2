<?php
use frontend\assets\FooterAsset;
FooterAsset::register($this);
?>

<!-- Footer Start-->
<section class="footer-section bg-secondary">
  <div class="w-100 p-3 px-5 py-5">
    <div class="row m-0 justify-content-center">
      <div class="col-12 col-sm-6 col-md-4">
        <div class="footer-widget about-widget">
          <img src="/frontend/web/img/footer.jpg">
        </div>
      </div>

      <div class="col-12 col-sm-6 col-md-4">
        <div class="footer-widget contact-widget pt-4">
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
            <p>samren.ikat@gmail.com</p>
          </div>
          <div class="con-info">
            <span><?= Yii::t('app', 'Technical support') ?>:</span>
            <p>-------------</p>
          </div>
          <div class="social-links">
            <a href="https://www.instagram.com/samrenikat/" class="instagram"><i class="fab fa-2x fa-instagram"></i></a>
            <a href="mailto:samren.ikat@gmail.com" class="google-plus"><i class="fab fa-2x fa-google-plus"></i></a>
            <a href="https://www.facebook.com/groups/327580638317938/" class="facebook"><i class="fab fa-2x fa-facebook-square"></i></a>
            <a href="https://www.youtube.com/channel/UCUf9AcbXqlIVwFiAgqOta-Q/?guided_help_flow=5" class="youtube"><i class="fab fa-2x fa-youtube-square"></i></a>
          </div>
        </div>
      </div>

      <div class="col-12 col-md-4 pt-4">
        <div class="footer-widget about-widget ">
          <p><?= Yii::t('app', 'You will never regret choosing our services and you will have the best services and antiques.') ?></p>
          <!-- Yandex Maps -->
          <!-- <div style="position:relative;overflow:hidden;">
            <a href="https://yandex.uz/maps?utm_medium=mapframe&utm_source=maps" style="color:#eee;font-size:12px;position:absolute;top:0px;">Яндекс.Карты</a>
            <a href="https://yandex.uz/maps/10334/samarkand/house/Yk8YfwNlTEcAQF1jfXp0dH1jYQ==/?ll=66.912141%2C39.701138&utm_medium=mapframe&utm_source=maps&z=11.65" style="color:#eee;font-size:12px;position:absolute;top:14px;">Улица Бенькова, 9 — Яндекс.Карты</a>
            <iframe src="https://yandex.uz/map-widget/v1/-/CCQtZFdDwA" width="100%" height="200px" frameborder="0" allowfullscreen="true" style="position:relative;"></iframe>
          </div> -->

          <!-- Google Maps -->
          <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d662.9487545065097!2d66.94416902920155!3d39.65505803123343!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3f4d1954e67633d5%3A0x4fa122f1fd8ab5cc!2sIkat-Art!5e1!3m2!1sru!2s!4v1598389194422!5m2!1sru!2s" width="100%" height="200" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
        </div>
      </div>
    </div>
  </div>
  <div class="social-links-warp bg-dark">
    <div class="container">
      <p class="text-white text-center" style="color: white; margin-top: 10px">
      <!-- <script type="text/javascript" async="" src="/frontend/web/js/analytics.js.download"></script> -->
        <script type="text/javascript">document.write(new Date().getFullYear());</script> IKAT-ART.COM
        <i class="fab fa-1x fa fa-heart" aria-hidden="true"></i> <a href="https://colorlib.com/" target="_blank"></a></p>
      </div>
  </div>
</section>