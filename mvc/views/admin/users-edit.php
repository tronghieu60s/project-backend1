<?php
$usersModel = $this->model("UserModel");
if (!isset($_GET["username"])) header("location: ../users");

$user = $usersModel->getUserWithUsername($_GET["username"]);
if ($user == null) header("location: ../users");

if (isset($_POST["pass"]) && isset($_POST["permission"])) {
    $check = $usersModel->updateUserWithId($user->user_id, password_hash($_POST["pass"], PASSWORD_DEFAULT), $_POST["permission"]);
    if ($check) $message = "Sửa người dùng thành công!";
    else $message = "Sửa người dùng thất bại!";
    echo "<script type='text/javascript'>alert('$message');window.location = '../users'</script>";
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

                    <h1 class="h3 mb-3">Cập Nhật Người Dùng</h1>

                    <div class="row">
                        <div class="col-12 col-6">
                            <div class="card px-5">
                                <div class="card-body">
                                    <form method="POST">
                                        <div class="form-group">
                                            <label class="form-label">Username</label>
                                            <input value="<?= $user->username ?>" disabled name="username" type="text" class="form-control" placeholder="Nhập tên..." required>
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label">Password</label>
                                            <input name="pass" type="password" class="form-control" placeholder="Nhập mật khẩu...">
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label">Quyền Hạn</label>
                                            <select class="form-control" name="permission" id="" required>
                                                <option <?= $user->permission == "1" ? "selected" : ""  ?> value="1">Editor</option>
                                                <option <?= $user->permission == "9" ? "selected" : ""  ?> value="9">Admin</option>
                                            </select>
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