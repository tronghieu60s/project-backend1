<?php $controller = strtok($_SERVER["REQUEST_URI"], '?');
$link = strtolower(substr($controller, strlen($folderNow), strlen($controller))); ?>

<!-- Header Inner -->
<div class="header-inner">
    <div class="container">
        <div class="cat-nav-head">
            <div class="row">
                <div class="col-12">
                    <div class="menu-area">
                        <!-- Main Menu -->
                        <nav class="navbar navbar-expand-lg">
                            <div class="navbar-collapse">
                                <div class="nav-inner">
                                    <ul class="nav main-menu menu navbar-nav">
                                        <li class="<?php echo $link == "" ? "active" : "" ?>"><a href="./">Trang Chủ</a></li>
                                        <li class="<?php echo $link == "products" ? "active" : "" ?>"><a href="./products">Sản Phẩm</a></li>
                                        <!-- <li><a href="#">Shop<i class="ti-angle-down"></i><span class="new">New</span></a>
                                            <ul class="dropdown">
                                                <li><a href="shop-grid.html">Shop Grid</a></li>
                                                <li><a href="cart.html">Cart</a></li>
                                                <li><a href="checkout.html">Checkout</a></li>
                                            </ul>
                                        </li> -->
                                    </ul>
                                </div>
                            </div>
                        </nav>
                        <!--/ End Main Menu -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Header Inner -->