<?php
require "./mvc/helpers/upload.php";
$upload = new Upload;
$target_dir = "./public/images/";
$statusUpload = false;

if (isset($_FILES["fileUploadToLogo"])) {
    $statusUpload = true;
    $uploadResult = $upload->uploadFile($target_dir, $_FILES["fileUploadToLogo"], "logo.png");
}

if (isset($_FILES["fileUploadToBigBanner"])) {
    $statusUpload = true;
    $uploadResult = $upload->uploadFile($target_dir, $_FILES["fileUploadToBigBanner"], "bigbanner.png");
}

if (isset($_FILES["fileUploadToBanner1"])) {
    $statusUpload = true;
    $uploadResult = $upload->uploadFile($target_dir, $_FILES["fileUploadToBanner1"], "banner1.png");
}

if (isset($_FILES["fileUploadToBanner2"])) {
    $statusUpload = true;
    $uploadResult = $upload->uploadFile($target_dir, $_FILES["fileUploadToBanner2"], "banner2.png");
}

if (isset($_FILES["fileUploadToBanner3"])) {
    $statusUpload = true;
    $uploadResult = $upload->uploadFile($target_dir, $_FILES["fileUploadToBanner3"], "banner3.png");
}

if ($statusUpload) {
    if ($uploadResult) $message = "Upload thành công!";
    else $message = "Upload thất bại!";
    echo "<script type='text/javascript'>
        alert('$message');
        window.location.href='../admin/setting?eraseCache=true';
        </script>";
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

                    <h1 class="h3 mb-3">Cài Đặt</h1>

                    <div class="row">
                        <div class="col-12">
                            <div class="card p-5">
                                <div class="row mb-5">
                                    <div class="col-6">
                                        <form method="post" enctype="multipart/form-data">
                                            <div class="form-group">
                                                <label class="form-label w-100">Logo</label>
                                                <input type="file" name="fileUploadToLogo" required>
                                                <small class="form-text text-muted">Chọn hình ảnh để tải lên.</small>
                                            </div>
                                            <button type="submit" class="btn btn-primary">Tải lên</button>
                                        </form>
                                    </div>
                                    <div class="col-6">
                                        <img src="./public/images/logo.png" alt="">
                                    </div>
                                </div>
                                <div class="row mb-5">
                                    <div class="col-6">
                                        <form method="post" enctype="multipart/form-data">
                                            <div class="form-group">
                                                <label class="form-label w-100">Banner Lớn</label>
                                                <input type="file" name="fileUploadToBigBanner" required>
                                                <small class="form-text text-muted">Chọn hình ảnh để tải lên.</small>
                                            </div>
                                            <button type="submit" class="btn btn-primary">Tải lên</button>
                                        </form>
                                    </div>
                                    <div class="col-6">
                                        <img width="100%" src="./public/images/bigbanner.png" alt="">
                                    </div>
                                </div>
                                <div class="row mb-5">
                                    <div class="col-6">
                                        <form method="post" enctype="multipart/form-data">
                                            <div class="form-group">
                                                <label class="form-label w-100">Banner 1</label>
                                                <input type="file" name="fileUploadToBanner1" required>
                                                <small class="form-text text-muted">Chọn hình ảnh để tải lên.</small>
                                            </div>
                                            <button type="submit" class="btn btn-primary">Tải lên</button>
                                        </form>
                                    </div>
                                    <div class="col-6">
                                        <img width="100%" src="./public/images/banner1.png" alt="">
                                    </div>
                                </div>
                                <div class="row mb-5">
                                    <div class="col-6">
                                        <form method="post" enctype="multipart/form-data">
                                            <div class="form-group">
                                                <label class="form-label w-100">Banner 2</label>
                                                <input type="file" name="fileUploadToBanner2" required>
                                                <small class="form-text text-muted">Chọn hình ảnh để tải lên.</small>
                                            </div>
                                            <button type="submit" class="btn btn-primary">Tải lên</button>
                                        </form>
                                    </div>
                                    <div class="col-6">
                                        <img width="100%" src="./public/images/banner2.png" alt="">
                                    </div>
                                </div>
                                <div class="row mb-5">
                                    <div class="col-6">
                                        <form method="post" enctype="multipart/form-data">
                                            <div class="form-group">
                                                <label class="form-label w-100">Banner 3</label>
                                                <input type="file" name="fileUploadToBanner3" required>
                                                <small class="form-text text-muted">Chọn hình ảnh để tải lên.</small>
                                            </div>
                                            <button type="submit" class="btn btn-primary">Tải lên</button>
                                        </form>
                                    </div>
                                    <div class="col-6">
                                        <img width="100%" src="./public/images/banner3.png" alt="">
                                    </div>
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