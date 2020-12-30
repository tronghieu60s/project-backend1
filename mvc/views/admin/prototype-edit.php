<?php
$prototypesModel = $this->model("PrototypeModel");
if (!isset($_GET["id"])) header("location:../../categories");

if (isset($_POST["name"])) {
    $name = $_POST["name"];
    $check =  $prototypesModel->updatePrototypeWithId($_GET["id"], $name);
    if ($check) $message = "Cập nhật thành công!";
    else $message = "Cập nhật thất bại!";
    echo "<script type='text/javascript'>alert('$message');</script>";
}

$prototype =  $prototypesModel->getPrototypeWithId($_GET["id"]);
if ($prototype == null) header("location:../../categories");
?>

<?php include_once "./admin-content/Base/Head.php" ?>

<body>
    <div class="wrapper">
        <?php include_once "./admin-content/Common/Sidebar.php" ?>

        <div class="main">
            <?php include_once "./admin-content/Common/Navbar.php" ?>

            <main class="content">
                <div class="container-fluid p-0">

                    <h1 class="h3 mb-3">Thêm Loại Sản Phẩm</h1>

                    <div class="row">
                        <div class="col-12 col-6">
                            <div class="card px-5">
                                <div class="card-body">
                                    <form method="POST">
                                        <div class="form-group">
                                            <label class="form-label">Tên Loại Sản Phẩm</label>
                                            <input name="name" type="text" class="form-control" placeholder="Nhập tên..." value="<?= $prototype->type_name ?>">
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