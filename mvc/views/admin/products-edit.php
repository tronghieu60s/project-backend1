<?php
$productsModel = $this->model("ProductModel");
$target_dir = "./public/images/products/";

if (!isset($_GET["id"])) header("location:../");

$product = $productsModel->getProductsWithId($_GET["id"]);
if ($product == null)
    header("location:../");

if (isset($_POST["name"]) && isset($_FILES["fileToUpload"]["name"])) {
    $nameFile = strtotime("now") . $_FILES["fileToUpload"]["name"];
    $target_file = $target_dir . basename($nameFile);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    if ($_FILES["fileToUpload"]["size"] > 500000) {
        $message = "File quá lớn, vui lòng sử dụng file nhẹ hơn!";
        $uploadOk = 0;
    }

    if (
        $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif"
    ) {
        $nameFile = $product->pro_image;
    }


    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "<script type='text/javascript'>alert('$message');</script>";
        // if everything is ok, try to upload file
    } else move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file);


    if ($uploadOk == 1) {
        $name = $_POST["name"];
        $manu_id = $_POST["manu_id"];
        $type_id = $_POST["type_id"];
        $price = $_POST["price"];
        $pro_image = $nameFile;
        $description = $_POST["description"];
        $feature = $_POST["feature"];
        $check =  $productsModel->updateProductWithId($_GET["id"], $name, $manu_id, $type_id, $price, $pro_image, $description, $feature);
        if ($check) $message = "Sửa sản phẩm thành công!";
        else $message = "Sửa sản phẩm thất bại!";
        echo "<script type='text/javascript'>alert('$message');</script>";
    }

    $product = $productsModel->getProductsWithId($_GET["id"]);
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

                    <h1 class="h3 mb-3">Thêm sản phẩm</h1>

                    <div class="row">
                        <div class="col-12 col-6">
                            <div class="card px-5">
                                <div class="card-body">
                                    <form method="POST" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <label class="form-label">Tên</label>
                                            <input value="<?= $product->name ?>" name="name" type="text" class="form-control" placeholder="Nhập tên..." required>
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label">Hãng Sản Xuất</label>
                                            <select class="form-control" name="manu_id" id="">
                                                <?php foreach ($data["manuFactures"] as $manuFacture) : ?>
                                                    <option <?= $product->manu_id == $manuFacture["manu_id"] ? "selected" : ""  ?> value="<?= $manuFacture["manu_id"] ?>"><?= $manuFacture["manu_name"] ?></option>
                                                <?php endforeach ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label">Loại Hàng</label>
                                            <select class="form-control" name="type_id" id="">
                                                <?php foreach ($data["prototypes"] as $prototype) : ?>
                                                    <option <?= $product->type_id == $prototype["type_id"] ? "selected" : ""  ?> value="<?= $prototype["type_id"] ?>"><?= $prototype["type_name"] ?></option>
                                                <?php endforeach ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label">Mô Tả</label>
                                            <textarea name="description" class="form-control" placeholder="Nhập mô tả ở đây..." rows="3">
                                                <?= $product->description ?>
                                            </textarea>
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label">Giá</label>
                                            <input value="<?= $product->price ?>" name="price" type="number" class="form-control" required>
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label">Feature</label>
                                            <select class="form-control" name="feature" id="">
                                                <option value="1" <?= $product->feature == "1" ? "selected" : ""  ?>>On</option>
                                                <option value="0" <?= $product->feature == "0" ? "selected" : ""  ?>>Off</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label w-100">Hình ảnh</label>
                                            <input type="file" name="fileToUpload">
                                            <img width="120" src="./public/images/products/<?= $product->pro_image ?>" alt="">
                                            <small class="form-text text-muted">Chọn hình ảnh cho sản phẩm của bạn.</small>
                                        </div>
                                        <button type="submit" class="btn btn-primary">Cập Nhật</button>
                                    </form>
                                </div>
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