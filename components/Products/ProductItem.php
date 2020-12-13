<div class="single-product">
    <div class="product-img">
        <a href="./products/details/<?php echo $product['id'] ?>">
            <img class="default-img" src="./public/images/products/<?php echo $product['pro_image'] ?>" alt="#">
            <img class="hover-img" src="./public/images/products/<?php echo $product['pro_image'] ?>" alt="#">
            <!-- <span class="out-of-stock">Hot</span> -->
        </a>
        <div class="button-head">
            <div class="product-action">
                <a data-toggle="modal" data-target="#exampleModal" title="Quick View" href="#"><i class=" ti-eye"></i><span>Quick Shop</span></a>
                <a title="Wishlist" href="#"><i class=" ti-heart "></i><span>Add to Wishlist</span></a>
                <a title="Compare" href="#"><i class="ti-bar-chart-alt"></i><span>Add to Compare</span></a>
            </div>
            <div class="product-action-2">
                <a title="Add to cart" href="#">Add to cart</a>
            </div>
        </div>
    </div>
    <div class="product-content">
        <h3><a href="./products/details/<?php echo $product['id'] ?>"><?php echo $product['name'] ?></a></h3>
        <div class="product-price">
            <span><?php echo number_format($product['price']) ?> VND</span>
        </div>
    </div>
</div>