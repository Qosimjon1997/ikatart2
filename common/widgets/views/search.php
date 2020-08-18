<?php
use frontend\assets\SearchAsset;
SearchAsset::register($this);
?>
<body> 
<div class="container searche">
<li class="list-group-item">Search results </li>
  <br>
  <ul class="list-group" id="myList">
    <li> <div class="blogBox moreBox">
        <div class="slider-box1">
                    <div class="img-box1">
                      <img src="img/load/1.jpg">
                      <p >Uzbek picture</p>
                    </div>
                     <div class="product1">
                      <p>$40.00</p>
                    </div>
                    <div class="icon-panel">
                      <div class="cart1">
                      <a href="#"><i class="fas fa-shopping-cart" ></i></a>
                      </div>
                      <div class="heart1">
                          <a href="#"><i class="far fa-heart" ></i></a>
                      </div>
                      <div class="buy1">
                          <a href="#"> Buy</a>
                        </div>
                     </div>
                    </div>
        </div></li>
    <li><div class="blogBox moreBox">
        <div class="slider-box1">
                    <div class="img-box1">
                      <img src="img/load/1.jpg">
                      <p >Uzbek picture</p>
                    </div>
                     <div class="product1">
                      <p>$40.00</p>
                    </div>
                    <div class="icon-panel">
                      <div class="cart1">
                      <a href="#"><i class="fas fa-shopping-cart" ></i></a>
                      </div>
                      <div class="heart1">
                          <a href="#"><i class="far fa-heart" ></i></a>
                      </div>
                      <div class="buy1">
                          <a href="#"> Buy</a>
                        </div>
                     </div>
                    </div>
        </div></li>
    <li><div class="blogBox moreBox">
        <div class="slider-box1">
                    <div class="img-box1">
                      <img src="img/load/1.jpg">
                      <p >Uzbek picture</p>
                    </div>
                     <div class="product1">
                      <p>$40.00</p>
                    </div>
                    <div class="icon-panel">
                      <div class="cart1">
                      <a href="#"><i class="fas fa-shopping-cart" ></i></a>
                      </div>
                      <div class="heart1">
                          <a href="#"><i class="far fa-heart" ></i></a>
                      </div>
                      <div class="buy1">
                          <a href="#"> Buy</a>
                        </div>
                     </div>
                    </div>
        </div></li>
    <li><div class="blogBox moreBox">
        <div class="slider-box1">
                    <div class="img-box1">
                      <img src="img/load/1.jpg">
                      <p >Uzbek picture</p>
                    </div>
                     <div class="product1">
                      <p>$40.00</p>
                    </div>
                    <div class="icon-panel">
                      <div class="cart1">
                      <a href="#"><i class="fas fa-shopping-cart" ></i></a>
                      </div>
                      <div class="heart1">
                          <a href="#"><i class="far fa-heart" ></i></a>
                      </div>
                      <div class="buy1">
                          <a href="#"> Buy</a>
                        </div>
                     </div>
                    </div>
        </div></li>
    <li><div class="blogBox moreBox">
        <div class="slider-box1">
                    <div class="img-box1">
                      <img src="img/load/1.jpg">
                      <p >Uzbek picture</p>
                    </div>
                     <div class="product1">
                      <p>$40.00</p>
                    </div>
                    <div class="icon-panel">
                      <div class="cart1">
                      <a href="#"><i class="fas fa-shopping-cart" ></i></a>
                      </div>
                      <div class="heart1">
                          <a href="#"><i class="far fa-heart" ></i></a>
                      </div>
                      <div class="buy1">
                          <a href="#"> Buy</a>
                        </div>
                     </div>
                    </div>
        </div></li>
    <li><div class="blogBox moreBox">
        <div class="slider-box1">
                    <div class="img-box1">
                      <img src="img/load/1.jpg">
                      <p >Uzbek picture</p>
                    </div>
                     <div class="product1">
                      <p>$40.00</p>
                    </div>
                    <div class="icon-panel">
                      <div class="cart1">
                      <a href="#"><i class="fas fa-shopping-cart" ></i></a>
                      </div>
                      <div class="heart1">
                          <a href="#"><i class="far fa-heart" ></i></a>
                      </div>
                      <div class="buy1">
                          <a href="#"> Buy</a>
                        </div>
                     </div>
                    </div>
        </div></li>
  </ul>
</div>
<script>
$(document).ready(function(){
  $("#listSearch").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myList li").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script>
</body>