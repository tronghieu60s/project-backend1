<?php
class Products extends Controller
{
    function Index()
    {
        $productModel = $this->model("ProductModel");
        $prototypeModel = $this->model("PrototypeModel");
        $manuFactureModel = $this->model("ManuFactureModel");

        $products = $productModel->getProducts();
        $productsSortPrice = $productModel->getProductsSort("price");
        $productsSortName = $productModel->getProductsSort("name");
        $productsPrototypes = $productModel->getProductsWithPrototypes(4);
        $prototypes = $prototypeModel->getPrototypes();
        $manufactures = $manuFactureModel->getManuFactures();

        $this->view("products", [
            "products" => $products,
            "products-price" => $productsSortPrice,
            "products-name" => $productsSortName,
            "products-prototypes" => $productsPrototypes,
            "prototypes" => $prototypes,
            "manufactures" => $manufactures
        ]);
    }
}
