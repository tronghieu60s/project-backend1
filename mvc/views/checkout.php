<?php
if (!isset($_SESSION["user"])) header("location: ./auth/login");

$orderModel = $this->model("OrderModel");
$userModel = $this->model("UserModel");
$user = $userModel->getUserWithUsername($_SESSION["user"]);

if (isset($_SESSION['products'])) {
    if (count($_SESSION['products']) > 0) {
        $orderSuccess = true;
        foreach ($_SESSION['products'] as $key => $qty) {
            $check = $orderModel->createOrder($key, $user->user_id, $qty);
            if (!$check) $orderSuccess = false;
        }
        if ($orderSuccess) {
            unset($_SESSION['products']);
            $message = "Đặt hàng thành công";
        } else $message = "Đặt hàng không thành công. Có lỗi xảy ra.";

        echo "<script>window.alert('$message');
            window.location.href='./user';</script>";
    }
}
