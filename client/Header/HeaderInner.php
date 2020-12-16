<?php
$controller = strtok($_SERVER["REQUEST_URI"], '?');
$link = strtolower(substr($controller, strlen($folderNow), strlen($controller)));

$prototypeModel = $this->model("PrototypeModel");
$manufactureModel = $this->model("ManufactureModel");

$prototypes = $prototypeModel->getPrototypes();
$manufactures = $manufactureModel->getManufactures();

?>

<!-- Header Inner -->
<div class="header-inner">
    <div class="container">
        <div class="cat-nav-head">
            <div class="row">
                <div class="col-12">
                    <div class="menu-area">
                        <!-- Main Menu -->
                        <nav class="navbar navbar-expand-lg">
                            <div class="navbar-collapse">
                                <div class="nav-inner">
                                    <ul class="nav main-menu menu navbar-nav">
                                        <li class="<?php echo $link == "" ? "active" : "" ?>"><a href="./">Trang Chủ</a></li>
                                        <li class="<?php echo $link == "products" ? "active" : "" ?>"><a href="./products">Sản Phẩm</a></li>
                                        <li><a href="#">Hãng Sản Xuất<i class="ti-angle-down"></i><span class="new">New</span></a>
                                            <ul class="dropdown">
                                                <?php foreach ($prototypes as $prototype) : ?>
                                                    <li><a href="./products/categories/<?php echo $prototype["type_id"] ?>">
                                                            <?php echo $prototype["type_name"] ?></a></li>
                                                <?php endforeach ?>
                                            </ul>
                                        </li>
                                        <li><a href="#">Loại Sản Phẩm<i class="ti-angle-down"></i><span class="new">New</span></a>
                                            <ul class="dropdown">
                                                <?php foreach ($manufactures as $manufacture) : ?>
                                                    <li><a href="./products/manufactures/<?php echo $manufacture["manu_id"] ?>">
                                                            <?php echo $manufacture["manu_name"] ?></a></li>
                                                <?php endforeach ?>
                                            </ul>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </nav>
                        <!--/ End Main Menu -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Header Inner -->