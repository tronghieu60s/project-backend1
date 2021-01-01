<?php
$userModel = $this->model("UserModel");
$orderModel = $this->model("OrderModel");
if (isset($_GET['remove'])) {
    $orders = $orderModel->getOrdersWithIdUser($_GET['remove']);
    if($orders == null){
        $check = $userModel->removeUserWithId($_GET['remove']);
        if ($check) $message = "Xóa người dùng thành công!";
        else $message = "Xóa người dùng thất bại!";
    } else $message = "Bạn không thể xóa, có " . count($orders) . " đơn hàng bởi user này.";
    echo "<script>alert('$message');</script>";
    header("Refresh:0; url=users");
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

                    <h1 class="h3 mb-3">Quản Lí Người Dùng</h1>

                    <div class="row">
                        <div class="col-12 my-2">
                            <a href="./admin/users/create">
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
                                            <th style="width:25%;">Id Người Dùng</th>
                                            <th style="width:40%">Username</th>
                                            <th style="width:25%">Quyền Hạn</th>
                                            <th>Hành Động</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($data["users"] as $user) : ?>
                                            <tr>
                                                <td><?= $user["user_id"] ?></td>
                                                <td><?= $user["username"] ?></td>
                                                <td><?= $user["permission"] == 9 ? "Administrator" : "Editor" ?></td>
                                                <td class="table-action">
                                                    <a href="./admin/users/edit?username=<?= $user["username"] ?>"><i class="align-middle" data-feather="edit-2"></i></a>
                                                    <a href="./admin/users?remove=<?= $user["user_id"] ?>"><i class="align-middle" data-feather="trash"></i></a>
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