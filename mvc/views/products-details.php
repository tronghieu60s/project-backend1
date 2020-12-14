<?php require_once "./components/Base/Head.php" ?>

<body class="js">

    <?php
    //include_once "./components/Common/PreLoader.php";
    include_once "./components/Header/Header.php";

    $name_breadcrumb = $data["product"]->name;
    include_once "./components/Common/Breadcrumbs.php";
    ?>

    <!-- Start Blog Single -->
    <section class="blog-single section">
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-12 order-2 order-md-1">
                    <div class="main-sidebar">
                        <!-- Single Widget -->
                        <div class="single-widget search">
                            <div class="form">
                                <input type="email" placeholder="Search Here...">
                                <a class="button" href="#"><i class="fa fa-search"></i></a>
                            </div>
                        </div>
                        <!--/ End Single Widget -->
                        <!-- Single Widget -->
                        <div class="single-widget category">
                            <h3 class="title">Loại</h3>
                            <ul class="categor-list">
                                <?php foreach ($data["prototypes"] as $prototype) : ?>
                                    <li><a href="./products/categories/<?php echo $prototype["type_id"] ?>">
                                            <?php echo $prototype["type_name"] ?></a></li>
                                <?php endforeach ?>
                            </ul>
                        </div>
                        <!--/ End Single Widget -->
                        <!-- Single Widget -->
                        <div class="single-widget category">
                            <h3 class="title">Nhà Sản Xuất</h3>
                            <ul class="categor-list">
                                <?php foreach ($data["manufactures"] as $manufacture) : ?>
                                    <li><a href="./products/categories/<?php echo $manufacture["manu_id"] ?>">
                                            <?php echo $manufacture["manu_name"] ?></a></li>
                                <?php endforeach ?>
                            </ul>
                        </div>
                        <!--/ End Single Widget -->
                    </div>
                </div>
                <div class="col-md-8 col-12 order-1 order-md-2">
                    <div class="blog-single-main">
                        <div class="row">
                            <div class="col-12">
                                <div class="row">
                                    <div class="col-sm-5">
                                        <img src="./public/images/products/<?php echo $data["product"]->pro_image ?>" alt="#">
                                    </div>
                                    <div class="col-sm-7 mt-5 mt-sm-0">
                                        <h2 class="blog-title m-0"><?php echo $data["product"]->name ?></h2>
                                        <h4 class="blog-title mt-3" style="color: #F7941D;"><?php echo number_format($data["product"]->price); ?> VNĐ</h4>
                                        <ul>
                                            <li class="my-2"><b>Số lượng:</b>
                                                <input class="ml-2" type="number" style="width: 100px;" value="1">
                                                <a href="./cart?id=<?php echo $data["product"]->id ?>&action=increase"><button type="button" class="btn btn-primary border-0">Thêm vào giỏ hàng</button></a>
                                            </li>
                                            <li class="my-2"><b>Khả dụng:</b> Còn Hàng</li>
                                            <li class="my-2"><b>Nhãn hiệu:</b> <?php echo $data["product"]->manu_name ?></li>
                                        </ul>

                                    </div>
                                    <div class="col-12 mt-3">
                                        <div class="content">
                                            <p><?php echo $data["product"]->description ?></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="comments">
                                    <h3 class="comment-title">Comments (3)</h3>
                                    <!-- Single Comment -->
                                    <div class="single-comment">
                                        <img src="https://via.placeholder.com/80x80" alt="#">
                                        <div class="content">
                                            <h4>Alisa harm <span>At 8:59 pm On Feb 28, 2018</span></h4>
                                            <p>Enthusiastically leverage existing premium quality vectors with enterprise-wide innovation collaboration Phosfluorescently leverage others enterprisee Phosfluorescently leverage.</p>
                                            <div class="button">
                                                <a href="#" class="btn"><i class="fa fa-reply" aria-hidden="true"></i>Reply</a>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Single Comment -->
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="reply">
                                    <div class="reply-head">
                                        <h2 class="reply-title">Leave a Comment</h2>
                                        <!-- Comment Form -->
                                        <form class="form" action="#">
                                            <div class="row">
                                                <div class="col-lg-6 col-md-6 col-12">
                                                    <div class="form-group">
                                                        <label>Your Name<span>*</span></label>
                                                        <input type="text" name="name" placeholder="" required="required">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-6 col-12">
                                                    <div class="form-group">
                                                        <label>Your Email<span>*</span></label>
                                                        <input type="email" name="email" placeholder="" required="required">
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label>Your Message<span>*</span></label>
                                                        <textarea name="message" placeholder=""></textarea>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="form-group button">
                                                        <button type="submit" class="btn">Post comment</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                        <!-- End Comment Form -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 order-3 text-center mt-5">
                    <h2>Sản Phẩm Liên Quan</h2>
                    <div class="row">
                        <?php shuffle($data["products-relate"])  ?>
                        <?php foreach (array_slice($data["products-relate"], 0, 8) as $product) : ?>
                            <div class="col-lg-3 col-md-4 col-6">
                                <?php include "./components/Products/ProductItem.php"; ?>
                            </div>
                        <?php endforeach ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--/ End Blog Single -->

    <?php require_once "./components/Base/Footer.php" ?>
</body>

</html>