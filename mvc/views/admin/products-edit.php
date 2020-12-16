<?php
$productsModel = $this->model("ProductModel");
$target_dir = "./public/images/products/";

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
        $message = "File của bạn không phải file ảnh, vui lòng chọn file khác!";
        $uploadOk = 0;
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
        $check =  $productsModel->createProduct($name,  $manu_id, $type_id, $price, $pro_image, $description, $feature);
        if ($check) $message = "Thêm sản phẩm thành công!";
        else $message = "Thêm sản phẩm thất bại!";
        echo "<script type='text/javascript'>alert('$message');</script>";
    }

    //header("location:../");
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
                                            <input name="name" type="text" class="form-control" placeholder="Nhập tên..." required>
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label">Hãng Sản Xuất</label>
                                            <select class="form-control" name="manu_id" id="">
                                                <?php foreach ($data["manuFactures"] as $manuFacture) : ?>
                                                    <option value="<?= $manuFacture["manu_id"] ?>"><?= $manuFacture["manu_name"] ?></option>
                                                <?php endforeach ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label">Loại Hàng</label>
                                            <select class="form-control" name="type_id" id="">
                                                <?php foreach ($data["prototypes"] as $prototype) : ?>
                                                    <option value="<?= $prototype["type_id"] ?>"><?= $prototype["type_name"] ?></option>
                                                <?php endforeach ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label">Mô Tả</label>
                                            <textarea name="description" class="form-control" placeholder="Nhập mô tả ở đây..." rows="3"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label">Giá</label>
                                            <input name="price" type="number" class="form-control" required>
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label">Feature</label>
                                            <select class="form-control" name="feature" id="">
                                                <option value="1">On</option>
                                                <option value="0" selected>Off</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label w-100">Hình ảnh</label>
                                            <input type="file" name="fileToUpload" required>
                                            <small class="form-text text-muted">Chọn hình ảnh cho sản phẩm của bạn.</small>
                                        </div>
                                        <button type="submit" class="btn btn-primary">Submit</button>
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