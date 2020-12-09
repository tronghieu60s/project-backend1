<?php require_once "./components/Base/Head.php" ?>

<body class="js">

    <?php
    //include_once "./components/Common/PreLoader.php";
    include_once "./components/Header/Header.php";
    ?>

    <div class="container py-5">
        <div class="row py-5">
            <div class="col"></div>
            <div class="col-10 col-sm-8 col-md-6 col-lg-4">
                <form action="">
                    <div class="form-group">
                        <label for="">Tên Đăng Nhập</label>
                        <input type="text" name="" id="" class="form-control px-2" placeholder="" aria-describedby="helpId">
                    </div>
                    <div class="form-group">
                        <label for="">Mật Khẩu</label>
                        <input type="password" name="" id="" class="form-control px-2" placeholder="" aria-describedby="helpId">
                    </div>
                    <button type="button" class="btn btn-primary border-0">Đăng Nhập</button>
                </form>
            </div>
            <div class="col"></div>
        </div>
    </div>

    <?php require_once "./components/Base/Footer.php" ?>
</body>

</html>