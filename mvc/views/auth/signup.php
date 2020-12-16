<?php
if (isset($_SESSION['user']))
    header('Location: ../');
?>

<?php
$status = null;
$alert = null;
require_once "./mvc/models/UserModel.php";
if (isset($_POST['username']) && isset($_POST['password']) && isset($_POST['repassword'])) {
    $userModel = new UserModel;
    if ($_POST['password'] != $_POST['repassword']) {
        $status = "error";
        $alert = "Mật khẩu nhập lại không khớp.";
    } else {
        $user = $userModel->getUserWithUsername($_POST['username']);
        if ($user != null) {
            $status = "error";
            $alert = "Tên người dùng đã tồn tại. Vui lòng chọn tên khác";
        }else {
            $userModel->createUser($_POST['username'], password_hash($_POST['password'], PASSWORD_DEFAULT));
            $status = "success";
            $alert = "Tạo tài khoản thành công.";
        }
    }
}
?>

<?php require_once "./client/Base/Head.php" ?>

<body class="js">

    <div style="height: 100vh; display: flex; align-items: center;">
        <div class="container">
            <div class="row">
                <div class="col"></div>
                <div class="col-10 col-sm-8 col-md-6 col-lg-4">
                    <form action="" method="POST">
                        <?php if ($status != null) : ?>
                            <div style="font-size: 12px;" class="text-center alert alert-<?php echo $status == "error" ? "danger" : "success"; ?>" role="alert">
                                <strong><?php echo $alert ?></strong>
                            </div>
                        <?php endif ?>
                        <div class="form-group">
                            <label for="">Tên Đăng Nhập</label>
                            <input type="text" name="username" id="" class="form-control px-2" placeholder="" aria-describedby="helpId">
                        </div>
                        <div class="form-group">
                            <label for="">Mật Khẩu</label>
                            <input type="password" name="password" id="" class="form-control px-2" placeholder="" aria-describedby="helpId">
                        </div>
                        <div class="form-group">
                            <label for="">Nhập Lại Mật Khẩu</label>
                            <input type="password" name="repassword" id="" class="form-control px-2" placeholder="" aria-describedby="helpId">
                        </div>
                        <div class="mb-3"><small>Bạn đã có tài khoản? <a style="color: #5e72e4" href="./auth/login">Đăng Nhập</a></small></div>
                        <button type="submit" class="btn btn-primary border-0">Đăng Kí</button>
                    </form>
                </div>
                <div class="col"></div>
            </div>
        </div>
    </div>

</body>

</html>