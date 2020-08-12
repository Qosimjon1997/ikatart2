<?php
use frontend\assets\UserAsset;
use yii\helpers\Html;
use yii\helpers\Url;

UserAsset::register($this);
?>
<div class="header-new">
    <div class="row">
        <div class="col-xl-5 col-lg-4 col-md-2 col-sm-1 col-xs-1">
            <a href="index.html"><img class="logo" src="img/logo/logo.png" alt=""></a>
        </div>
      <div class="header-info col-xl-7 col-lg-8 col-md-10 col-sm-11 col-xs-11">
        <ul>
            <li><a href="#"><i class="fas fa-user" aria-hidden="true" style="margin-right: 5px;" ></i>User name</a></li>
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
