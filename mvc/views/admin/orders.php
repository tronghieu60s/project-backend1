<?php
$orderModel = $this->model("OrderModel");
if (isset($_GET['remove'])) {
    $check = $orderModel->removeOrderWithId($_GET['remove']);
    if ($check) $message = "Xóa thành công!";
    else $message = "Xóa thất bại!";
    echo "<script>alert('$message');</script>";
    header("Refresh:0; url=../admin/orders");
}

if (isset($_GET['delivered'])) {
    $check = $orderModel->updateOrderDeliveredWithId($_GET['delivered']);
    if ($check) $message = "Giao hàng thành công!";
    else $message = "Giao hàng thất bại!";
    echo "<script>alert('$message');</script>";
    header("Refresh:0; url=../admin/orders");
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
                    <div class="row py-3 mb-3">
                        <div class="col-6">
                            <h1 class="h3 mb-3">Quản Lí Đơn Đặt Hàng</h1>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <table class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th style="width:15%;">Mã Đơn</th>
                                            <th style="width:20%">Tên Sản Phẩm</th>
                                            <th style="width:20%">Tên Người Mua</th>
                                            <th style="width:15%">Giá</th>
                                            <th style="width:15%">Trạng Thái</th>
                                            <th style="width:15%">Thời Gian</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($data["orders"] as $order) : ?>
                                            <tr>
                                                <td>
                                                    <?= $order["order_id"] ?>
                                                </td>
                                                <td>
                                                    <?= $order["name"] ?>
                                                </td>
                                                <td>
                                                    <?= $order["username"] ?>
                                                </td>
                                                <td>
                                                    <?= number_format($order["price"]) ?> VNĐ
                                                </td>
                                                <td>
                                                    <?= $order["status"] == 0 ? "Đang Giao Hàng" : "<span style='color:blue'>Đã Giao Hàng</span>" ?>
                                                </td>
                                                <td>
                                                    <?= $order["created_at"] ?>
                                                </td>
                                                <td class="table-action">
                                                    <?php if ($order["status"] == 0) : ?>
                                                        <a href="./admin/orders?delivered=<?= $order["order_id"] ?>"><i class="align-middle" data-feather="check"></i></a>
                                                    <?php endif ?>
                                                    <a href="./admin/orders?remove=<?= $order["order_id"] ?>"><i class="align-middle" data-feather="trash"></i></a>
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