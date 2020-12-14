<?php
require_once "./components/Base/Head.php";
$productModel = new ProductModel;
?>

<?php
// Pagination
require_once "./mvc/views/pagination.php";
$pagination = new Pagination;
$url = $_SERVER["REQUEST_URI"];
$perPage = isset($_GET['perPage']) ? $_GET['perPage'] : 9;
$page = isset($_GET['page']) ? $_GET['page'] : 1; ?>

<?php
// Sort
$productsSort = $data["products"];
if (isset($_GET['q']))
    $productsSort = $productModel->getProductsWithKeyWord($_GET['q']);

$sort = isset($_GET['sort']) ? $_GET['sort'] : "new";
if ($sort == "name") $productsSort = $data["products-name"];
if ($sort == "price") $productsSort = $data["products-price"];

$products = !is_null($productsSort) ? $pagination->arrSlice($productsSort, $page, $perPage) : null;
$numOfProducts = is_null($productsSort) ? 0 : count($productsSort);
?>

<body class="js">

    <?php
    //include_once "./components/Common/PreLoader.php";
    include_once "./components/Header/Header.php";

    $name_breadcrumb = "Products";
    include_once "./components/Common/Breadcrumbs.php";
    ?>

    <!-- Product Style -->
    <section class="product-area shop-sidebar shop section pt-5">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center mb-4">
                    <h2><?php if (isset($data["prototype"])) echo $data["prototype"]->type_name ?>
                        <?php if (isset($data["manufacture"])) echo $data["manufacture"]->manu_name ?>
                        <?php if (isset($_GET['q'])) echo "Kết quả tìm kiếm cho: " . $_GET['q'] ?></h2>
                </div>
                <div class="col-lg-3 col-md-4 col-12">
                    <div class="shop-sidebar">
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
                                    <li><a href="./products/manufactures/<?php echo $manufacture["manu_id"] ?>">
                                            <?php echo $manufacture["manu_name"] ?></a></li>
                                <?php endforeach ?>
                            </ul>
                        </div>
                        <!--/ End Single Widget -->
                    </div>
                </div>
                <div class="col-lg-9 col-md-8 col-12">
                    <div class="row">
                        <div class="col-12">
                            <!-- Shop Top -->
                            <div class="shop-top">
                                <form class="shop-shorter d-flex align-items-center">
                                    <?php if (isset($_GET["q"])) : ?>
                                        <input class="d-none" name="q" type="text" value="<?php echo $_GET["q"] ?>">
                                    <?php endif ?>
                                    <div class="single-shorter">
                                        <label>Hiển thị :</label>
                                        <select name="perPage">
                                            <?php for ($i = 3; $i <= 15; $i += 3) : ?>
                                                <option <?php echo $perPage == $i ? "selected" : "" ?> value="<?php echo $i ?>">
                                                    <?php echo $i < 10 ? '0' . $i : $i ?>
                                                </option>
                                            <?php endfor ?>
                                        </select>
                                    </div>
                                    <?php if (!isset($_GET['q'])) : ?>
                                        <div class="single-shorter">
                                            <label>Sắp Xếp :</label>
                                            <select name="sort">
                                                <option <?php echo $sort == "new" ? "selected" : "" ?> value="new">Mới Nhất</option>
                                                <option <?php echo $sort == "name" ? "selected" : "" ?> value="name">Tên</option>
                                                <option <?php echo $sort == "price" ? "selected" : "" ?> value="price">Giá</option>
                                            </select>
                                        </div>
                                    <?php endif ?>
                                    <button type="submit" class="btn btn-primary py-2 px-3 border-0">Lọc</button>
                                </form>
                                <ul class="view-mode">
                                    <li class="active"><a href="shop-grid.html"><i class="fa fa-th-large"></i></a></li>
                                    <!-- <li><a href="shop-list.html"><i class="fa fa-th-list"></i></a></li> -->
                                </ul>
                            </div>
                            <!--/ End Shop Top -->
                        </div>
                    </div>
                    <div class="row">
                        <?php if ($numOfProducts > 0) {
                            foreach ($products as $product) : ?>
                                <div class="col-lg-4 col-md-6 col-12">
                                    <?php include "./components/Products/ProductItem.php"; ?>
                                </div>
                            <?php endforeach;
                        } else { ?>
                            <div class="text-center my-5" style="width: 100%;">
                                <h2>Không có sản phẩm nào.</h2>
                            </div>
                        <?php } ?>
                    </div>
                    <div class="row">
                        <div class="w-100 d-flex justify-content-center mt-5">

                            <?php echo $pagination->paginate($url, $numOfProducts, $perPage, $page) ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--/ End Product Style 1  -->

    <?php require_once "./components/Base/Footer.php" ?>
</body>

</html>