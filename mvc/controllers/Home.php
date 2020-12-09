<?php
class Home extends Controller
{
    function Index()
    {
        $productModel = $this->model("ProductModel");
        $prototypeModel = $this->model("PrototypeModel");

        $products = $productModel->getProducts();
        $productsSortPrice = $productModel->getProductsSort("price");
        $productsPrototypes = $productModel->getProductsWithPrototypes(4);
        $prototypes = $prototypeModel->getPrototypes();

        $this->view("index", [
            "products" => $products,
            "products-price" => $productsSortPrice,
            "products-prototypes" => $productsPrototypes,
            "prototypes" => $prototypes
        ]);
    }
}
