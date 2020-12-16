<?php
if (isset($_GET["logout"]))
    unset($_SESSION["user"]);
?>

<!-- Topbar -->
<div class="topbar">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-12 col-12">
                <!-- Top Left -->
                <div class="top-left">
                    <ul class="list-main">
                        <li><i class="ti-headphone-alt"></i> +0947306xxx</li>
                        <li><i class="ti-email"></i> tronghieu60s@gmail.com</li>
                    </ul>
                </div>
                <!--/ End Top Left -->
            </div>
            <div class="col-lg-8 col-md-12 col-12">
                <!-- Top Right -->
                <div class="right-content">
                    <ul class="list-main">
                        <li><i class="ti-location-pin"></i> Vị trí cửa hàng</li>
                        <li><i class="ti-alarm-clock"></i> Bão Deal</li>
                        <?php if (isset($_SESSION["user"])) { ?>
                            <li><i class="ti-user"></i> <a href="./user"><?= $_SESSION["user"] ?></a></li>
                            <li><i class="ti-arrow-right"></i> <a href="?logout">Đăng Xuất</a></li>
                        <?php } else { ?>
                            <li><i class="ti-power-off"></i><a href="./auth/login">Đăng Nhập</a></li>
                        <?php } ?>
                    </ul>
                </div>
                <!-- End Top Right -->
            </div>
        </div>
    </div>
</div>
<!-- End Topbar -->