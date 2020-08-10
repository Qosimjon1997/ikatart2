<?php
use frontend\assets\HeaderAsset;
use yii\helpers\Html;
use yii\helpers\Url;

HeaderAsset::register($this);
?>
<div class="header-new">
    <div class="row">
        <div class="col-xl-5 col-lg-4 col-md-3 col-sm-3 col-xs-3">
            <a href="index.html"><img class="logo" src="img/logo/logo.png" alt=""></a>
        </div>
      <div class="header-info col-xl-7 col-lg-8 col-md-9 col-sm-9 col-xs-9">
        <ul>
            <li><a href="#"><i class="fa fa-sign-in-alt" aria-hidden="true" style="margin-right: 5px;" ></i>Sign in</a></li>
            <li><a href="#"><i class="fa fa-user-plus" aria-hidden="true" style="margin-right: 5px;" ></i>Sign up</a></li>
            <li><a href="#"><i class="fa fa-user-cog" aria-hidden="true" style="margin-right: 5px;" ></i>Operator</a></li>
            <li><a href="#"> <img src="img/mony.png" ></a></li>
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
                    <img src="img/icon/header_icon.png" alt="">
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
