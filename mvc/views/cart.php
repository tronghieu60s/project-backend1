<?php
$productModel = $this->model("ProductModel");
$totalMoney = 0;
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    if (!isset($_SESSION['products'][$id]))
        $_SESSION['products'][$id] = 0;

    $qty = 1;
    if (isset($_GET['qty'])) $qty = (int)$_GET['qty'];

    if (isset($_GET['action'])) {
        if ($_GET['action'] == 'increase') {
            $_SESSION['products'][$id] += $qty;
        }
        if ($_GET['action'] == 'reduction') {
            $_SESSION['products'][$id] -= $qty;
            if ($_SESSION['products'][$id] <= 0) unset($_SESSION['products'][$id]);
        }
        if ($_GET['action'] == 'remove')
            unset($_SESSION['products'][$id]);
    }
    header('location: ./cart');
}
?>

<?php
if (isset($_GET["checkout"])) {
    if (!isset($_SESSION["user"])) header("location: ./auth/login");

    $orderModel = $this->model("OrderModel");
    $userModel = $this->model("UserModel");
    $user = $userModel->getUserWithUsername($_SESSION["user"]);

    if (isset($_SESSION['products'])) {
        if (count($_SESSION['products']) > 0) {
            $orderSuccess = true;
            foreach ($_SESSION['products'] as $key => $qty) {
                $check = $orderModel->createOrder($key, $user->user_id, $qty);
                if (!$check) $orderSuccess = false;
            }
            if ($orderSuccess) {
                unset($_SESSION['products']);
                $message = "Đặt hàng thành công";
            } else $message = "Đặt hàng không thành công. Có lỗi xảy ra.";

            echo "<script>window.alert('$message');
            window.location.href='./user';</script>";
        }
    }
}
?>

<?php
require_once "./client/Base/Head.php";
?>

<body class="js">

    <?php
    include_once "./client/Header/Header.php";
    $name_breadcrumb = "Cart";
    include_once "./client/Common/Breadcrumbs.php";
    ?>

    <!-- Shopping Cart -->
    <div class="shopping-cart section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <!-- Shopping Summery -->
                    <table class="table shopping-summery">
                        <thead>
                            <tr class="main-hading">
                                <th>SẢN PHẨM</th>
                                <th>TÊN</th>
                                <th class="text-center">ĐƠN GIÁ</th>
                                <th class="text-center">SỐ LƯỢNG</th>
                                <th class="text-center">TỔNG</th>
                                <th class="text-center"><i class="ti-trash remove-icon"></i></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if (isset($_SESSION['products'])) :
                                foreach ($_SESSION['products'] as $key => $qty) :
                                    $product = $productModel->getProductsWithId($key);
                                    $totalMoney += $qty * $product->price;
                            ?>
                                    <tr>
                                        <td class="image" data-title="No"><img src="./public/images/products/<?php echo $product->pro_image ?>" alt="#"></td>
                                        <td class="product-des" data-title="Description">
                                            <p class="product-name"><a href="./products/details/<?php echo $product->id ?>">
                                                    <?php echo $product->name ?>
                                                </a></p>
                                            <p class="product-des"><?php echo substr($product->description, 0, 70) . "..." ?></p>
                                        </td>
                                        <td class="price" data-title="Price"><span><?php echo number_format($product->price) . " VNĐ" ?></span></td>
                                        <td class="qty" data-title="Qty">
                                            <!-- Input Order -->
                                            <div class="input-group">
                                                <div class="button minus">
                                                    <a href="./cart?id=<?php echo $product->id ?>&action=reduction"><button type="button" class="btn btn-primary btn-number" disabled="disabled" data-type="minus" data-field="quant[1]">
                                                            <i class="ti-minus"></i>
                                                        </button></a>
                                                </div>
                                                <input type="text" name="quant[1]" class="input-number" data-min="1" data-max="100" disabled value="<?php echo $qty ?>">
                                                <div class="button plus">
                                                    <a href="./cart?id=<?php echo $product->id ?>&action=increase"><button type="button" class="btn btn-primary btn-number" data-type="plus" data-field="quant[1]">
                                                            <i class="ti-plus"></i>
                                                        </button></a>
                                                </div>
                                            </div>
                                            <!--/ End Input Order -->
                                        </td>
                                        <td class="total-amount" data-title="Total"><span><?php echo number_format($product->price * $qty) . " VNĐ" ?></span></td>
                                        <td class="action" data-title="Remove"><a href="./cart?id=<?php echo $product->id ?>&action=remove"><i class="ti-trash remove-icon"></i></a></td>
                                    </tr>
                            <?php endforeach;
                            endif ?>
                        </tbody>
                    </table>
                    <!--/ End Shopping Summery -->
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <!-- Total Amount -->
                    <div class="total-amount">
                        <div class="row">
                            <div class="col-lg-8 col-md-5 col-12">
                            </div>
                            <div class="col-lg-4 col-md-7 col-12">
                                <?php if (isset($_SESSION["products"])) {
                                    if (count($_SESSION["products"]) > 0) { ?>
                                        <div class="right">
                                            <ul>
                                                <li>Tổng giỏ hàng<span><?php echo number_format($totalMoney) . " VNĐ" ?></span></li>
                                                <li>Phí vận chuyển<span>Miễn Phí</span></li>
                                                <!-- <li>You Save<span>$20.00</span></li> -->
                                                <li class="last">Bạn trả<span><?php echo number_format($totalMoney) . " VNĐ" ?></span></li>
                                            </ul>
                                            <div class="button5">
                                                <a href="./cart?checkout" class="btn">Đặt hàng</a>
                                                <a href="./products" class="btn">Tiếp tục mua sắm</a>
                                            </div>
                                        </div>
                                <?php }
                                } ?>
                            </div>
                        </div>
                    </div>
                    <!--/ End Total Amount -->
                </div>
            </div>
        </div>
    </div>
    <!--/ End Shopping Cart -->

    <!-- Start Shop Services Area  -->
    <section class="shop-services section mb-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-12">
                    <!-- Start Single Service -->
                    <div class="single-service">
                        <i class="ti-rocket"></i>
                        <h4>Free shiping</h4>
                        <p>Orders over $100</p>
                    </div>
                    <!-- End Single Service -->
                </div>
                <div class="col-lg-3 col-md-6 col-12">
                    <!-- Start Single Service -->
                    <div class="single-service">
                        <i class="ti-reload"></i>
                        <h4>Free Return</h4>
                        <p>Within 30 days returns</p>
                    </div>
                    <!-- End Single Service -->
                </div>
                <div class="col-lg-3 col-md-6 col-12">
                    <!-- Start Single Service -->
                    <div class="single-service">
                        <i class="ti-lock"></i>
                        <h4>Sucure Payment</h4>
                        <p>100% secure payment</p>
                    </div>
                    <!-- End Single Service -->
                </div>
                <div class="col-lg-3 col-md-6 col-12">
                    <!-- Start Single Service -->
                    <div class="single-service">
                        <i class="ti-tag"></i>
                        <h4>Best Peice</h4>
                        <p>Guaranteed price</p>
                    </div>
                    <!-- End Single Service -->
                </div>
            </div>
        </div>
    </section>
    <!-- End Shop Newsletter -->

    <footer class="footer">
        <!-- Footer Top -->
        <div class="footer-top section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-5 col-md-6 col-12">
                        <!-- Single Widget -->
                        <div class="single-footer about">
                            <div class="logo">
                                <a href="index.html"><img src="./public/images/logo2.png" alt="#"></a>
                            </div>
                            <p class="text">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Saepe illum asperiores dolorum. Veniam temporibus, delectus magnam excepturi doloribus asperiores perspiciatis hic assumenda molestias! Illo id ipsam eveniet dolor sequi pariatur!</p>
                            <p class="call">Có câu hỏi? Gọi cho chúng tôi 24/7<span><a href="tel:123456789">+0123 456 789</a></span></p>
                        </div>
                        <!-- End Single Widget -->
                    </div>
                    <div class="col-lg-2 col-md-6 col-12">
                        <!-- Single Widget -->
                        <div class="single-footer links">
                            <h4>Thông tin</h4>
                            <ul>
                                <li><a href="#">Về chúng tôi</a></li>
                                <li><a href="#">Faq</a></li>
                                <li><a href="#">Điều khoản và điều kiện</a></li>
                                <li><a href="#">Liên hệ</a></li>
                                <li><a href="#">Giúp đỡ</a></li>
                            </ul>
                        </div>
                        <!-- End Single Widget -->
                    </div>
                    <div class="col-lg-2 col-md-6 col-12">
                        <!-- Single Widget -->
                        <div class="single-footer links">
                            <h4>Dịch vụ khách hàng</h4>
                            <ul>
                                <li><a href="#">Phương thức thanh toán</a></li>
                                <li><a href="#">Chính sách hoàn tiền</a></li>
                                <li><a href="#">Trả hàng</a></li>
                                <li><a href="#">Vận chuyển</a></li>
                                <li><a href="#">Chính sách bảo mật</a></li>
                            </ul>
                        </div>
                        <!-- End Single Widget -->
                    </div>
                    <div class="col-lg-3 col-md-6 col-12">
                        <!-- Single Widget -->
                        <div class="single-footer social">
                            <h4>Liên lạc</h4>
                            <!-- Single Widget -->
                            <div class="contact">
                                <ul>
                                    <li>NO. 342 - London Oxford Street.</li>
                                    <li>012 United Kingdom.</li>
                                    <li>tronghieu60s@gmail.com</li>
                                    <li>+0947 306 xxx</li>
                                </ul>
                            </div>
                            <!-- End Single Widget -->
                            <ul>
                                <li><a href="https://fb.me/tronghieu60s"><i class="ti-facebook"></i></a></li>
                                <li><a href="https://instagram.com/tronghieu.60s"><i class="ti-instagram"></i></a></li>
                                <li><a href="mailto:tronghieu60s@gmail.com"><i class="ti-email"></i></a></li>
                                <li><a href="https://github.com/tronghieu60s"><i class="ti-github"></i></a></li>
                            </ul>
                        </div>
                        <!-- End Single Widget -->
                    </div>
                </div>
            </div>
        </div>
        <!-- End Footer Top -->
        <div class="copyright">
            <div class="container">
                <div class="inner">
                    <div class="row">
                        <div class="col-lg-6 col-12">
                            <div class="left">
                                <p>Copyright © 2020 <a href="http://www.wpthemesgrid.com" target="_blank">Wpthemesgrid</a> - All Rights Reserved.</p>
                            </div>
                        </div>
                        <div class="col-lg-6 col-12">
                            <div class="right">
                                <img src="./public/images/payments.png" alt="#">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
</body>

</html>