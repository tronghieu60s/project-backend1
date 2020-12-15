<!-- Breadcrumbs -->
<div class="breadcrumbs">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="bread-inner">
                    <ul class="bread-list">
                        <li><a href="./">Home<i class="ti-arrow-right"></i></a></li>
                        <li class="active"><a href="<?php echo $_SERVER["REQUEST_URI"]; ?>">
                                <?php if (isset($name_breadcrumb)) echo $name_breadcrumb ?></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Breadcrumbs -->