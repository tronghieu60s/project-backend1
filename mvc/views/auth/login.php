<?php
if (isset($_SESSION['user']))
    header('Location: ../');
?>

<?php
$status = null;
$alert = null;
require_once "./mvc/models/UserModel.php";
if (isset($_POST['username']) && isset($_POST['password'])) {
    $userModel = new UserModel;
    $user = $userModel->getUserWithUsername($_POST['username']);
    if ($user == null) {
        $status = "error";
        $alert = "Tên tài khoản hoặc mật khẩu không chính xác.";
    } else {
        if (!password_verify($_POST['password'], $user->password)) {
            $status = "error";
            $alert = "Tên tài khoản hoặc mật khẩu không chính xác.";
        } else {
            $_SESSION["user"] = $_POST['username'];
            header("location:../admin");
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
                        <div class="mb-3"><small>Bạn chưa có tài khoản? <a style="color: #5e72e4" href="./auth/signup">Đăng Kí</a></small></div>
                        <button type="submit" class="btn btn-primary border-0">Đăng Nhập</button>

                        <div class="p-3 mt-5 border">
                            --- TEST ADMINISTRATOR ---<br />
                            Username: admin<br />
                            Password: 12345<br /><br />
                            --- TEST NORMAL USER ---<br />
                            Username: user<br />
                            Password: 12345
                        </div>
                    </form>
                </div>
                <div class="col"></div>
            </div>
        </div>
    </div>

</body>

</html>