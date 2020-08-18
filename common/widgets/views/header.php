<?php
use frontend\assets\HeaderAsset;
use yii\helpers\Html;
use yii\helpers\Url;

HeaderAsset::register($this);
?>
<div class="header-new m-0 p-0">
    <div class="row  m-0 p-0">
        <div class="col-12 col-md-3">
            <a><img class="logo" src="/frontend/web/img/logo/logo.png" alt="logo"></a>
        </div>
      <div class="header-info col-12 col-md-9">
        <ul>
            <li>
                <?= Html::a('<i class="fa fa-sign-in-alt" aria-hidden="true" style="margin-right: 5px;" ></i>
                    Sign in', ['user/login']) ?>
            </li>
            <li>
                <?= Html::a('<i class="fa fa-user-plus mr-1" aria-hidden="true"></i>Sign up', ['user/signup']) ?>
            </li>
            <li><a href="#"><i class="fa fa-user-cog" aria-hidden="true" style="margin-right: 5px;" ></i>Operator</a></li>
            <li><a href="#"> <img src="/frontend/web/img/mony.png" ></a></li>
            <li>
                <div class="select-this">
                    <form action="#">
                        <div class="select-itms">
                            <select name="select" id="select1" style="background: rgba(185, 185, 192, 0.004); border:0; font-size: 15px">
                                <option value="">$</option>
                                <option value="">€</option>
                                <option value="">₽</option>
                                <option value="">Uz</option>
                            </select>
                        </div>
                    </form>
                </div>
            </li>
            <!-- <li><a href="#">+998 90 224-43-36</a></li> -->
            <li>
                <div class="flag">
                    <img src="/frontend/web/img/icon/header_icon.png" alt="">
                </div>
            </li>
            <li >
                <div class="select-this">
                    <form action="#">
                        <div class="select-itms">
                            <select name="select" id="select1" style="background: rgba(185, 185, 192, 0.004); border:0; font-size: 15px">
                                <option value="">ENG</option>
                                <option value="">FRAN</option>
                                <option value="">RUS</option>
                                <option value="">UZB</option>
                            </select>
                        </div>
                    </form>
                </div>
            </li>
        </ul>

    </div>
  </div>
</div>
