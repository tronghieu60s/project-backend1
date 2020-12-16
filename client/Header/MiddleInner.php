<?php
$productModel = $this->model("ProductModel");
$totalProduct = 0;
$totalMoney = 0;
if (isset($_SESSION['products'])) {
    $totalProduct = count($_SESSION['products']);
}

$search = "";
if (isset($_GET['q'])) $search = $_GET['q'];
?>

<!-- Middle Inner -->
<div class="middle-inner">
    <div class="container">
        <div class="row">
            <div class="col-lg-2 col-md-2 col-12">
                <!-- Logo -->
                <div class="logo">
                    <a href="./"><img src="./public/images/logo.png" alt="logo"></a>
                </div>
                <!--/ End Logo -->
                <!-- Search Form -->
                <div class="search-top">
                    <div class="top-search"><a href="#0"><i class="ti-search"></i></a></div>
                    <!-- Search Form -->
                    <div class="search-top">
                        <form class="search-form" action="./products">
                            <input type="text" placeholder="Search here..." name="q" value="<?php echo $search ?>">
                            <button value="search" type="submit"><i class="ti-search"></i></button>
                        </form>
                    </div>
                    <!--/ End Search Form -->
                </div>
                <!--/ End Search Form -->
                <div class="mobile-nav"></div>
            </div>
            <div class="col-lg-8 col-md-7 col-12">
                <div class="search-bar-top">
                    <div class="search-bar">
                        <form style="width: 100%; text-align: left;" action="./products">
                            <input style="width: 100%; padding-right: 78px;" name="q" placeholder="Tìm kiếm sản phẩm ở đây....." type="search" value="<?php echo $search ?>">
                            <button class="btnn"><i class="ti-search"></i></button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-2 col-md-3 col-12">
                <div class="right-bar">
                    <!-- Search Form -->
                    <!-- <div class="sinlge-bar">
                        <a href="#" class="single-icon"><i class="fa fa-heart-o" aria-hidden="true"></i></a>
                    </div> -->
                    <div class="sinlge-bar">
                        <a href="./user" class="single-icon"><i class="fa fa-user-circle-o" aria-hidden="true"></i></a>
                    </div>
                    <div class="sinlge-bar shopping">
                        <a href="./cart" class="single-icon"><i class="ti-bag"></i> <span class="total-count"><?php echo $totalProduct ?></span></a>
                        <!-- Shopping Item -->
                        <div class="shopping-item">
                            <div class="dropdown-cart-header">
                                <span><?php echo $totalProduct ?> Items</span>
                                <a href="./cart">View Cart</a>
                            </div>
                            <ul class="shopping-list">
                                <?php
                                if (isset($_SESSION['products'])) :
                                    foreach ($_SESSION['products'] as $key => $qty) :
                                        $product = $productModel->getProductsWithId($key);
                                        $totalMoney += $qty * $product->price;
                                ?>
                                        <li>
                                            <a href="./cart?id=<?php echo $product->id ?>&action=remove" class="remove" title="Remove this item"><i class="fa fa-remove"></i></a>
                                            <a class="cart-img" href="#"><img src="./public/images/products/<?php echo $product->pro_image ?>" alt="#"></a>
                                            <h4><a href="./products/details/<?php echo $product->id ?>"><?php echo $product->name ?></a></h4>
                                            <p class="quantity"><?php echo $qty ?>x - <span class="amount"><?php echo number_format($product->price) . " VNĐ" ?></span></p>
                                        </li>
                                <?php endforeach;
                                endif ?>
                            </ul>
                            <div class="bottom">
                                <div class="total">
                                    <span>Total</span>
                                    <span class="total-amount"><?php echo number_format($totalMoney) . " VNĐ" ?></span>
                                </div>
                                <a href="checkout.html" class="btn animate">Checkout</a>
                            </div>
                        </div>
                        <!--/ End Shopping Item -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Middle Inner -->