<?php
$commentModel = $this->model("CommentModel");
if (isset($_GET['remove'])) {
    $check = $commentModel->deleteCommentWithId($_GET['remove']);
    if ($check) $message = "Xóa thành công!";
    else $message = "Xóa thất bại!";
    echo "<script>alert('$message');</script>";
    header("Refresh:0; url=../admin/comments");
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
                            <h1 class="h3 mb-3">Quản Lí Bình Luận</h1>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <table class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th style="width:15%;">Mã Bình Luận</th>
                                            <th style="width:20%">Tác Giả</th>
                                            <th style="width:20%">Nội Dung</th>
                                            <th style="width:15%">Bài Viết</th>
                                            <th style="width:15%">Đánh Giá</th>
                                            <th style="width:15%">Thời Gian</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($data["comments"] as $comment) : ?>
                                            <tr>
                                                <td>
                                                    <?= $comment["comment_id"] ?>
                                                </td>
                                                <td>
                                                    <?= $comment["username"] ?>
                                                </td>
                                                <td>
                                                    <?= $comment["content"] ?>
                                                </td>
                                                <td>
                                                    <a href="./products/details/<?= $comment["id"] ?>"><?= $comment["name"] ?></a></td>
                                                </td>
                                                <td>
                                                    <?php for ($i = 0; $i < $comment["rating"]; $i++) : ?>
                                                        <i class="fa fa-star" aria-hidden="true" style="color: yellowgreen"></i>
                                                    <?php endfor ?>
                                                </td>
                                                <td>
                                                    <?= $comment["created_at"] ?>
                                                </td>
                                                <td class="table-action">
                                                    <a href="./admin/comments?remove=<?= $comment["comment_id"] ?>">
                                                        <i class="align-middle" data-feather="trash"></i></a>
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