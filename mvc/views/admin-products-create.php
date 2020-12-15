<?php include_once "./admin-content/Base/Head.php" ?>

<body>
    <div class="wrapper">
        <?php include_once "./admin-content/Common/Sidebar.php" ?>

        <div class="main">
            <?php include_once "./admin-content/Common/Navbar.php" ?>

            <main class="content">
                <div class="container-fluid p-0">

                    <h1 class="h3 mb-3">Thêm sản phẩm</h1>

                    <div class="row">
                        <div class="col-12 col-6">
                            <div class="card px-5">
                                <div class="card-body">
                                    <form>
                                        <div class="form-group">
                                            <label class="form-label">Tên</label>
                                            <input type="text" class="form-control" placeholder="Nhập tên...">
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label">Hãng Sản Xuất</label>
                                            <select class="form-control" name="" id="">
                                                <option></option>
                                                <option></option>
                                                <option></option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label">Loại Hàng</label>
                                            <select class="form-control" name="" id="">
                                                <option></option>
                                                <option></option>
                                                <option></option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label">Mô Tả</label>
                                            <textarea class="form-control" placeholder="Nhập mô tả ở đây..." rows="3"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label">Giá</label>
                                            <input type="number" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label">Feature</label>
                                            <select class="form-control" name="" id="">
                                                <option value="1" selected>On</option>
                                                <option value="0">Off</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label w-100">Hình ảnh</label>
                                            <input type="file">
                                            <small class="form-text text-muted">Chọn hình ảnh cho sản phẩm của bạn.</small>
                                        </div>
                                        <button type="submit" class="btn btn-primary">Submit</button>
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