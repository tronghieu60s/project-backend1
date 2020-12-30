<?php
$prototypesModel = $this->model("PrototypeModel");
if (isset($_POST["name"])) {
    $name = $_POST["name"];
    $check =  $prototypesModel->createPrototype($name);
    if ($check) $message = "Thêm loại thành công!";
    else $message = "Thêm loại thất bại!";
    echo "<script type='text/javascript'>alert('$message');</script>";
    header("location:../../categories");
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

                    <h1 class="h3 mb-3">Thêm Loại Sản Phẩm</h1>

                    <div class="row">
                        <div class="col-12 col-6">
                            <div class="card px-5">
                                <div class="card-body">
                                    <form method="POST">
                                        <div class="form-group">
                                            <label class="form-label">Tên Loại Sản Phẩm</label>
                                            <input name="name" type="text" class="form-control" placeholder="Nhập tên...">
                                        </div>
                                        <button type="submit" class="btn btn-primary">Tạo Mới</button>
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