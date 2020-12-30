<?php
$totalRating = 0;
foreach ($data["comments"] as $comment)
    $totalRating += $comment["rating"];

$commentModel = $this->model("CommentModel");
$orderModel = $this->model("OrderModel");
$userModel = $this->model("UserModel");

$confirmUserOrder = array();
if (isset($_SESSION["user"])) {
    $user = $userModel->getUserWithUsername($_SESSION["user"]);
    $confirmUserOrder = $orderModel->getOrderWithProductAndUser($data["product"]->id, $user->user_id);
}

if (
    isset($_POST["name"]) &&
    isset($_POST["rating"]) && isset($_POST["email"]) && isset($_POST["message"])
) {
    $check = $commentModel->createComment(
        $_POST["email"],
        $_POST["name"],
        $_POST["message"],
        $_POST["rating"],
        $data["product"]->id
    );
    if (!$check) echo "<script type='text/javascript'>alert('Có lỗi xảy ra!');</script>";
    header("Refresh:0;");
}
?>

<?php require_once "./client/Base/Head.php" ?>

<body class="js">

    <?php
    include_once "./client/Header/Header.php";

    $name_breadcrumb = $data["product"]->name;
    include_once "./client/Common/Breadcrumbs.php";
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
                                            <li>
                                                <div>
                                                    <?php for ($i = 0; $i < ceil($totalRating / count($data["comments"])); $i++) : ?>
                                                        <i class="fa fa-star" aria-hidden="true" style="color: yellowgreen"></i>
                                                    <?php endfor ?>
                                                    <?php for ($i = 0; $i < 5 - ceil($totalRating / count($data["comments"])); $i++) : ?>
                                                        <i class="fa fa-star-o" aria-hidden="true" style="color: yellowgreen"></i>
                                                    <?php endfor ?>
                                                </div>
                                            </li>
                                            <li class="my-2"><b>Số lượng:</b>
                                                <form action="./cart">
                                                    <input class="ml-2" type="number" name="qty" style="width: 100px;" value="1">
                                                    <input class="d-none" type="text" name="id" value="<?php echo $data["product"]->id ?>">
                                                    <input class="d-none" type="text" name="action" value="increase">
                                                    <button type="submit" class="btn btn-primary border-0">Thêm vào giỏ hàng</button>
                                                </form>
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
                                    <h3 class="comment-title">Bình luận (<?= count($data["comments"]) ?>)</h3>
                                    <?php foreach ($data["comments"] as $comment) : ?>
                                        <div class="single-comment">
                                            <img src="./public/images/user.png" alt="#">
                                            <div class="content">
                                                <div>
                                                    <?php for ($i = 0; $i < $comment["rating"]; $i++) : ?>
                                                        <i class="fa fa-star" aria-hidden="true" style="color: yellowgreen"></i>
                                                    <?php endfor ?>
                                                    <?php for ($i = 0; $i < 5 - $comment["rating"]; $i++) : ?>
                                                        <i class="fa fa-star-o" aria-hidden="true" style="color: yellowgreen"></i>
                                                    <?php endfor ?>
                                                </div>
                                                <h4><?= $comment["username"] ?> <span>At <?= $comment["created_at"] ?></span></h4>
                                                <p><?= $comment["content"] ?></p>
                                            </div>
                                        </div>
                                    <?php endforeach ?>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="reply">
                                    <?php if (count($confirmUserOrder)) { ?>
                                        <div class="reply-head">
                                            <h2 class="reply-title">Để lại bình luận</h2>
                                            <!-- Comment Form -->
                                            <form class="form" method="POST">
                                                <div class="row">
                                                    <?php if (isset($_SESSION["user"])) : ?>
                                                        <p class="mb-3">Bạn đang đăng nhập với tài khoản <b><?= $_SESSION["user"] ?></b>.</p>
                                                    <?php endif ?>
                                                    <div class="col-lg-6 col-md-6 col-12">
                                                        <div class="form-group <?= isset($_SESSION["user"]) ? "d-none" : "" ?>">
                                                            <label>Your Name<span>*</span></label>
                                                            <input type="text" name="name" placeholder="" required value="<?= isset($_SESSION["user"]) ? $_SESSION["user"] : "" ?>">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 col-md-6 col-12">
                                                        <div class="form-group <?= isset($_SESSION["user"]) ? "d-none" : "" ?>">
                                                            <label>Your Email<span>*</span></label>
                                                            <input type="email" name="email" placeholder="" required value="<?= isset($_SESSION["user"]) ? $_SESSION["user"] . "@gmail.com" : "" ?>">
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <label>Đánh Giá</label>
                                                            <input class="ml-5" style="width: auto;" type="number" name="rating" value="5" id="" min="1" max="5" required>
                                                            <i class="fa fa-star" aria-hidden="true" style="color: yellowgreen"></i>
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <label>Your Message<span>*</span></label>
                                                            <textarea name="message" placeholder="" required></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="form-group button">
                                                            <button type="submit" class="btn">Đăng Bình Luận</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                            <!-- End Comment Form -->
                                        </div>
                                    <?php } else { ?>
                                        <h5>Bạn phải mua sản phẩm để được đánh giá và bình luận.</h5>
                                    <?php } ?>
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
                                <?php include "./client/Products/ProductItem.php"; ?>
                            </div>
                        <?php endforeach ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--/ End Blog Single -->

    <?php require_once "./client/Base/Footer.php" ?>
</body>

</html>