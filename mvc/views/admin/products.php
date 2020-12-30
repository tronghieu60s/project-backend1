<?php
$search = "";
if (isset($_GET['q'])) $search = $_GET['q'];

$productModel = $this->model("ProductModel");
if (isset($_GET['remove'])) {
    $check = $productModel->removeProductWithId($_GET['remove']);
    if ($check) $message = "Xóa sản phẩm thành công!";
    else $message = "Xóa sản phẩm thất bại!";
    echo "<script>alert('$message');</script>";
    header("Refresh:0; url=admin");
}
?>

<?php
// Pagination
require_once "./mvc/helpers/pagination.php";
$pagination = new Pagination;
$perPage = isset($_GET['perPage']) ? $_GET['perPage'] : 6;
$page = isset($_GET['page']) ? $_GET['page'] : 1; ?>

<?php include_once "./admin-content/Base/Head.php" ?>

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

<body>
    <div class="wrapper">
        <?php include_once "./admin-content/Common/Sidebar.php" ?>

        <div class="main">
            <?php include_once "./admin-content/Common/Navbar.php" ?>

            <main class="content">
                <div class="container-fluid p-0">
                    <div class="row py-3 mb-3" style="background-color: #fff;">
                        <div class="col-6">
                            <h1 class="h3 mb-3">Quản Lí Hàng Hóa</h1>
                        </div>
                        <div class="col-6 d-flex justify-content-end">
                            <form action="./admin" class="form-inline d-none d-sm-inline-block">
                                <div class="input-group input-group-navbar">
                                    <input name="q" type="text" class="form-control" placeholder="Search…" aria-label="Search" value="<?php echo $search ?>">
                                    <div class="input-group-append">
                                        <button class="btn" type="submit">
                                            <i class="align-middle" data-feather="search"></i>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12 my-2">
                            <a href="./admin/products/create">
                                <button type="button" class="btn btn-primary">
                                    Thêm
                                </button>
                            </a>
                        </div>
                        <div class="col-12">
                            <div class="card">
                                <table class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th style="width:25%;"></th>
                                            <th style="width:15%;">Mã Hàng</th>
                                            <th style="width:25%">Tên Hàng</th>
                                            <th style="width:10%">Hãng</th>
                                            <th style="width:10%">Loại</th>
                                            <th style="width:25%">Giá</th>
                                            <th style="width:25%">Feature</th>
                                            <th style="width:25%">Thời Gian</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if ($numOfProducts > 0) : foreach ($products as $product) : ?>
                                                <tr>
                                                    <td><img style="width: 100%;" src="./public/images/products/<?= $product["pro_image"] ?>" alt=""></td>
                                                    <td><?= $product["id"] ?></td>
                                                    <td><?= $product["name"] ?></td>
                                                    <td><?= $product["manu_name"] ?></td>
                                                    <td><?= $product["type_name"] ?></td>
                                                    <td><?= number_format($product["price"]) ?></td>
                                                    <td><?= $product["feature"] ?></td>
                                                    <td><?= $product["created_at"] ?></td>
                                                    <td class="table-action">
                                                        <a href="./admin/products/edit?id=<?= $product["id"] ?>"><i class=" align-middle" data-feather="edit-2"></i></a>
                                                        <a href="./admin?remove=<?= $product["id"] ?>"><i class="align-middle" data-feather="trash"></i></a>
                                                    </td>
                                                </tr>
                                        <?php endforeach;
                                        endif ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="col-12 d-flex justify-content-center">
                            <nav aria-label="Page navigation example">
                                <ul class="pagination pagination-sm">
                                    <?php echo $pagination->paginate($_SERVER["REQUEST_URI"], $numOfProducts, $perPage, $page) ?>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </main>

            <?php include_once "./admin-content/Base/Footer.php" ?>
        </div>
    </div>

    <?php include_once "./admin-content/Base/Script.php" ?>

</body>

</html>