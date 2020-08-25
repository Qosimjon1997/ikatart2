<?php
use frontend\assets\NavigationAsset;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use frontend\models\Search;

$search = new Search();

NavigationAsset::register($this);
?>

<header class="men">
       <div class="header-area">
            <div class="main-header ">
               <div class="header-bottom">
                    <div class="row m-auto justify-content-between d-block">
                        <div class="d-block col-4 d-md-none row">
                            <div class="col-12">
                                <div class="navbar">
                                    <i class="fa fa-bars" aria-hidden="true" style="margin-right: -20px;" ></i><a href=""><?= Yii::t('app', 'Category') ?></a>
                                    <div class="navbar1 row col-12">
                                        <a href="">Interior Decorating Items</a>
                                        <a href="">Handmade Carpets</a>
                                        <a href="">Decorative fabric</a>
                                        <a href="">Souvenirs and Accessories</a>
                                        <a href="">Oriental clothing</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-7 col-md-6 col-sm-4 col-xl-8 main-menu" id="nav" >
                                <div class="main-menu">
                                    <nav>
                                        <ul id="navigation">
                                            <li><a href="#">Interior Decorating Items</a>
                                                <ul class="submenu" id="nav">
                                                    <table class="sub-tab">
                                                        <tr>
                                                            <td>
                                                    <li><a href="ikat-art.html">Vases and Jugs</a></li>
                                                    <li><a href="ikat-art.html">Decorative Candle Holders</a></li>
                                                    <li><a href="ikat-art.html">Hookahs</a></li>
                                                    <li><a href="ikat-art.html">Uzbek Ceramic Plates</a></li>
                                                    <li><a href="ikat-art.html">Oriental Miniature</a></li>
                                                             </td>
                                                        <td>
                                                        <li><a href="ikat-art.html">Woodcarving Goods</a></li>
                                                        <li><a href="ikat-art.html">Ikat Pillows</a></li>
                                                         <li><a href="ikat-art.html">Roller Pillows</a></li>
                                                        <li><a href="ikat-art.html">Uzbek Pouffes</a></li>
                                                        <li><a href="ikat-art.html">Suzani Pillows</a></li>
                                                    </td>
                                                    <td>
                                                    <li>
                                                        <div class="sub-cart">
                                                            <a href="#"> <div class="sub-cat" style="background: url('/frontend/web/img/menu/1.jpg');"></div></a>
                                                           <div class="sub-name"> <p>Uzbek Pillows</p></div>
                                                            <div class="product1">
                                                                    <p>$40.00</p>
                                                                </div>
                                                                <div class="icon-panel1">
                                                                <div class="cart1">
                                                                    <a  href="#" id="button"> <i class="fas fa-shopping-cart"></i></a>
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
                                                    </li>
                                                    </td>
                                                    <td>
                                                    <li>
                                                        <div class="sub-cart">
                                                            <a href="#"> <div class="sub-cat" style="background: url('/frontend/web/img/menu/2.jpg');"></div> </a>
                                                            <div class="sub-name"> <p>Uzbek Pillows</p></div>
                                                            <div class="product1">
                                                                    <p>$40.00</p>
                                                                </div>
                                                                <div class="icon-panel1">
                                                                <div class="cart1">
                                                                    <a  href="#" id="button"> <i class="fas fa-shopping-cart"></i></a>
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
                                                    </li>
                                                    </td>
                                                    <td>
                                                    <li>
                                                        <div class="sub-cart">
                                                            <a href="#">
                                                                <div class="sub-cat" style="background: url('/frontend/web/img/menu/3.jpg');"></div></a>
                                                                <div class="sub-name"> <p>Uzbek Pillows</p></div>
                                                                <div class="product1">
                                                                    <p>$40.00</p>
                                                                </div>
                                                                <div class="icon-panel1">
                                                                <div class="cart1">
                                                                    <a  href="#" id="button"> <i class="fas fa-shopping-cart"></i></a>
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
                                                    </li>
                                                    </td>
                                                    </tr>
                                                    </table>
                                                </ul>
                                            </li>
                                        </ul>
                                    </nav>
                                </div>

                            </div>
                            <div  class="col-lg-5 col-md-6 col-sm-8 col-xl-4 col-xs-10">
                                <ul class="header-right">
                                 <div class="row">
                                    <li>

                                     </li>
                                    <li>
                                        <div class="favorit-items" style="top: 5px">

                                        </div>
                                    </li>
                                    <li>
                                        <div class="shopping-card" style="top: 5px">
                                            <a href="cart.html"><i class="fas fa-shopping-cart" style="background: rgb(255, 255, 255);"></i></a>
                                        </div>
                                    </li>
                                 </div>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
       </div>
     </header>

