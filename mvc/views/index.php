<?php $prototypes = array_slice($data["prototypes"], 0, 5) ?>
<?php require_once "./client/Base/Head.php" ?>

<body class="js">

    <?php
    include_once "./client/Header/Header.php";
    include_once "./client/Common/Slider.php";
    ?>

    <!-- Start Small Banner  -->
    <section class="small-banner section">
        <div class="container-fluid">
            <div class="row">
                <?php
                $image = "banner1.png";
                include "./client/Home/SingleBanner.php";

                $image = "banner2.png";
                include "./client/Home/SingleBanner.php";

                $image = "banner3.png";
                include "./client/Home/SingleBanner.php"

                ?>
            </div>
        </div>
    </section>
    <!-- End Small Banner -->

    <div class="product-area section pb-0">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title">
                        <h2>Thịnh Hành</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="product-info">
                        <div class="nav-main">
                            <!-- Tab Nav -->
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <?php
                                $active = true;
                                foreach ($prototypes as $prototype) : ?>
                                    <li class="nav-item">
                                        <a class="nav-link <?php echo $active ? "active" : "" ?>" data-toggle="tab" href="#<?php echo strtolower($prototype["type_id"]) ?>" role="tab">
                                            <?php echo $prototype["type_name"] ?>
                                        </a>
                                    </li>
                                <?php
                                    $active = false;
                                endforeach ?>
                            </ul>

                            <!--/ End Tab Nav -->
                        </div>
                        <div class="tab-content" id="myTabContent">
                            <?php
                            $active = true;
                            foreach ($prototypes as $prototype) : ?>
                                <!-- Start Single Tab -->
                                <div class="tab-pane fade <?php echo $active ? "show active" : "" ?>" id="<?php echo strtolower($prototype["type_id"]) ?>" role="tabpanel">
                                    <div class="tab-single">
                                        <div class="row">
                                            <?php
                                            foreach ($data["products"] as $product) :
                                                if ($product["type_id"] == $prototype["type_id"]) :
                                            ?>
                                                    <div class="col-xl-3 col-lg-4 col-md-4 col-6">
                                                        <?php include "./client/Products/ProductItem.php"
                                                        ?>
                                                    </div>
                                            <?php
                                                endif;
                                            endforeach
                                            ?>
                                        </div>
                                    </div>
                                </div>
                                <!--/ End Single Tab -->
                            <?php
                                $active = false;
                            endforeach  ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php
    //include_once "./client/Home/MidiumBanner.php";
    ?>

    <div class="product-area most-popular section pb-0">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title">
                        <h2>Sản phẩm yêu thích</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="owl-carousel popular-slider">
                        <?php
                        shuffle($data["products"]);
                        foreach (array_slice($data["products"], 0, 8) as $product) :
                            include "./client/Products/ProductItem.php";
                        endforeach
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="product-area section pb-0">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title">
                        <h2>PHỤ KIỆN GIÁ RẺ</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="product-info">
                        <div class="tab-content" id="myTabContent">
                            <!-- Start Single Tab -->
                            <div class="tab-pane fade show active">
                                <div class="tab-single">
                                    <div class="row">
                                        <?php foreach (array_slice($data["products-price"], 0, 8) as $product) : ?>
                                            <div class="col-xl-3 col-lg-4 col-md-4 col-6">
                                                <?php include "./client/Products/ProductItem.php"
                                                ?>
                                            </div>
                                        <?php endforeach ?>
                                    </div>
                                </div>
                            </div>
                            <!--/ End Single Tab -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="product-area section pb-0">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title">
                        <h2>LAPTOP NỔI BẬT NHẤT</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="product-info">
                        <div class="tab-content" id="myTabContent">
                            <!-- Start Single Tab -->
                            <div class="tab-pane fade show active">
                                <div class="tab-single">
                                    <div class="row">
                                        <?php foreach (array_slice($data["products-prototypes"], 0, 8) as $product) : ?>
                                            <div class="col-xl-3 col-lg-4 col-md-4 col-6">
                                                <?php include "./client/Products/ProductItem.php"
                                                ?>
                                            </div>
                                        <?php endforeach ?>
                                    </div>
                                </div>
                            </div>
                            <!--/ End Single Tab -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php
    //include "./client/Home/SingleListSection.php" 
    //include "./client/Home/CountDown.php"
    //include "./client/Home/Blog.php" 
    ?>

    <section class="shop-services section home mt-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-12">
                    <!-- Start Single Service -->
                    <div class="single-service">
                        <i class="ti-rocket"></i>
                        <h4>Miễn phí Ship</h4>
                        <p>Giao dịch trên 50,000 VND</p>
                    </div>
                    <!-- End Single Service -->
                </div>
                <div class="col-lg-3 col-md-6 col-12">
                    <!-- Start Single Service -->
                    <div class="single-service">
                        <i class="ti-reload"></i>
                        <h4>Miễn phí trả hàng</h4>
                        <p>Trong vòng 30 ngày</p>
                    </div>
                    <!-- End Single Service -->
                </div>
                <div class="col-lg-3 col-md-6 col-12">
                    <!-- Start Single Service -->
                    <div class="single-service">
                        <i class="ti-lock"></i>
                        <h4>Bảo mật thanh toán</h4>
                        <p>100% thanh toán an toàn</p>
                    </div>
                    <!-- End Single Service -->
                </div>
                <div class="col-lg-3 col-md-6 col-12">
                    <!-- Start Single Service -->
                    <div class="single-service">
                        <i class="ti-tag"></i>
                        <h4>Giá cả tốt nhất</h4>
                        <p>Đảm bảo chất lượng</p>
                    </div>
                    <!-- End Single Service -->
                </div>
            </div>
        </div>
    </section>

    <?php //include "./client/Home/Newsletter.php" 
    ?>

    <?php require_once "./client/Base/Footer.php" ?>
</body>

</html>