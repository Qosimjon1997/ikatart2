<?php
    use frontend\assets\HeroAsset;
    HeroAsset::register($this);
?>
    <div class="hero-blog m-0 p-0 position-realative">
      <div class="row">
        <div class="col-12 col-md-9 m-0 p-0">
            <div class="hero-slider owl-carousel owl-loaded owl-drag">
              <div class="owl-stage-outer">
                <div class="owl-stage">
                  <div class="owl-item">
                    <div class="hs-item set-bg">
                      <img src="img/hero/1.1.jpg" alt="">
                      <div class="container">
                        <div class="row">
                          <div class="col-12 text-white">
                                <h2 class="text"><?= Yii::t('app', 'Only Natural Materials') ?></h2>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="owl-item active">
                    <div class="hs-item set-bg">
                      <img src="img/hero/1.2.jpg" alt="">
                      <div class="container">
                        <div class="row">
                          <div class="col-12 text-truncatetext-white">
                            <h2 class="text"><?= Yii::t('app', 'Delivery to anywhere in the world') ?></h2>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="owl-item active" >
                    <div class="hs-item set-bg">
                      <img src="img/hero/1.3.jpg" alt="">
                      <div class="container">
                        <div class="row">
                          <div class="col-12 text-truncate text-white">
                            <h2 class="text"><?= Yii::t('app', 'Our craftsmen') ?></h2>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="owl-item active" >
                    <div class="hs-item set-bg">
                      <img src="img/hero/1.4.jpg" alt="">
                      <div class="container">
                        <div class="row">
                          <div class="col-12 text-truncate text-white">
                            <h2 class="text"><?= Yii::t('app', 'Fast delivery service') ?></h2>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-12 col-md-3 row reklama">
            <div class="col-12 col-sm-6 col-md-12 p-0 ml-5 ml-sm-0">
              <img src="img/hero/top/1.jpg" alt="">
            </div>
            <div class="col-12 col-sm-6 col-md-12 d-block p-0 ml-5 ml-sm-0 reklama">
              <img src="img/hero/top/2.jpg" alt="">
            </div>
          </div>
      </div>
  </div>