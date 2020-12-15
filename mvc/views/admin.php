<?php
$productModel = $this->model("ProductModel");
if (isset($_GET['remove'])) {
    $check = $productModel->removeProductWithId($_GET['remove']);
    if($check) $message = "Xóa sản phẩm thành công!";
    else $message = "Xóa sản phẩm thất bại!";
    echo "<script>alert('$message');</script>";
    header("Refresh:0; url=admin");
}
?>

<?php include_once "./admin-content/Base/Head.php" ?>

<body>
    <div class="wrapper">
        <?php include_once "./admin-content/Common/Sidebar.php" ?>

        <div class="main">
            <?php include_once "./admin-content/Common/Navbar.php" ?>

            <main class="content">
                <div class="container-fluid p-0">

                    <h1 class="h3 mb-3">Quản Lí Hàng Hóa</h1>

                    <div class="row">
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
                                        <?php foreach ($data["products"] as $product) : ?>
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
                                                    <a href="#"><i class="align-middle" data-feather="edit-2"></i></a>
                                                    <a href="./admin?remove=<?= $product["id"] ?>"><i class="align-middle" data-feather="trash"></i></a>
                                                </td>
                                            </tr>
                                        <?php endforeach ?>
                                    </tbody>
                                </table>
                            </div>
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