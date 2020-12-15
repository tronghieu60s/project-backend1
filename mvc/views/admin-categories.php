<?php
$productModel = $this->model("ProductModel");
$prototypeModel = $this->model("PrototypeModel");
$manufactureModel = $this->model("ManufactureModel");
$check = false;
if (isset($_GET['remove']) && isset($_GET['type'])) {
    $id = $_GET['remove'];
    if ($_GET['type'] == "manufacture") {
        $products = $productModel->getProductsWithManufactures($id);
        if (count($products) <= 0) {
            $check = $manufactureModel->removeManufactureWithId($_GET['remove']);
        } else {
            $message = "Không thể xóa được, còn " . count($products) . " sản phẩm";
            echo "<script type='text/javascript'>alert('$message');</script>";
        }
    }

    if ($_GET['type'] == "prototype") {
        $products = $productModel->getProductsWithPrototypes($id);
        if (count($products) <= 0) {
            $check = $prototypeModel->removePrototypeWithId($_GET['remove']);
        } else {
            $message = "Không thể xóa được, còn " . count($products) . " sản phẩm";
            echo "<script type='text/javascript'>alert('$message');</script>";
        }
    }

    if ($check) $message = "Xóa thành công!";
    else $message = "Xóa thất bại!";
    echo "<script>alert('$message');</script>";
    header("Refresh:0; url=categories");
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

                    <h1 class="h3 mb-3">Quản Lí Hãng Và Loại</h1>

                    <div class="row">
                        <div class="col-12 col-xl-6">
                            <div class="card">
                                <table class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th style="width:25%;">Mã Hãng</th>
                                            <th style="width:50%">Tên Hãng</th>
                                            <th>Hành Động</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($data["manufactures"] as $manufacture) : ?>
                                            <tr>
                                                <td><?= $manufacture["manu_id"] ?></td>
                                                <td><?= $manufacture["manu_name"] ?></td>
                                                <td class="table-action">
                                                    <a href="#"><i class="align-middle" data-feather="edit-2"></i></a>
                                                    <a href="./admin/categories?remove=<?= $manufacture["manu_id"] ?>&type=manufacture">
                                                        <i class="align-middle" data-feather="trash"></i></a>
                                                </td>
                                            </tr>
                                        <?php endforeach ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <div class="col-12 col-xl-6">
                            <div class="card">
                                <table class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th style="width:25%;">Mã Loại</th>
                                            <th style="width:50%">Tên Loại</th>
                                            <th>Hành Động</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($data["prototypes"] as $prototype) : ?>
                                            <tr>
                                                <td><?= $prototype["type_id"] ?></td>
                                                <td><?= $prototype["type_name"] ?></td>
                                                <td class="table-action">
                                                    <a href="#"><i class="align-middle" data-feather="edit-2"></i></a>
                                                    <a href="./admin/categories?remove=<?= $prototype["type_id"] ?>&type=prototype"><i class="align-middle" data-feather="trash"></i></a>
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