<?php
class Products extends Controller
{
    function Index()
    {
        $productModel = $this->model("ProductModel");
        $prototypeModel = $this->model("PrototypeModel");
        $manufactureModel = $this->model("ManufactureModel");

        $products = $productModel->getProducts();
        $productsSortPrice = $productModel->getProductsSort("price");
        $productsSortName = $productModel->getProductsSort("name");

        $prototypes = $prototypeModel->getPrototypes();
        $manufactures = $manufactureModel->getManufactures();

        $this->view("products", [
            "products" => $products,
            "products-price" => $productsSortPrice,
            "products-name" => $productsSortName,
            "prototypes" => $prototypes,
            "manufactures" => $manufactures
        ]);
    }

    function Categories($id = null)
    {
        if (is_null($id) || !is_numeric($id)) return $this->view("page404");

        $productModel = $this->model("ProductModel");
        $prototypeModel = $this->model("PrototypeModel");
        $manufactureModel = $this->model("ManufactureModel");

        $prototypes = $prototypeModel->getPrototypes();
        $prototype = $prototypeModel->getPrototypeWithId((int)$id);
        if (is_null($prototype)) return $this->view("page404");

        $products = $productModel->getProductsWithPrototypes((int)$id);
        $productsSortPrice = $productModel->getProductsWithPrototypesSort((int)$id, "price");
        $productsSortName = $productModel->getProductsWithPrototypesSort((int)$id, "name");
        $manufactures = $manufactureModel->getManufactures();

        $this->view("products", [
            "products" => $products,
            "products-price" => $productsSortPrice,
            "products-name" => $productsSortName,
            "prototype" => $prototype,
            "prototypes" => $prototypes,
            "manufactures" => $manufactures
        ]);
    }

    function ManuFactures($id = null)
    {
        if (is_null($id) || !is_numeric($id)) return $this->view("page404");

        $productModel = $this->model("ProductModel");
        $prototypeModel = $this->model("PrototypeModel");
        $manufactureModel = $this->model("ManufactureModel");

        $manufactures = $manufactureModel->getManufactures();
        $manufacture = $manufactureModel->getManufacturesWithId((int)$id);
        if (is_null($manufacture)) return $this->view("page404");

        $products = $productModel->getProductsWithManufactures((int)$id);
        $productsSortPrice = $productModel->getProductsWithManufacturesSort((int)$id, "price");
        $productsSortName = $productModel->getProductsWithManufacturesSort((int)$id, "name");
        $prototypes = $prototypeModel->getPrototypes();

        $this->view("products", [
            "products" => $products,
            "products-price" => $productsSortPrice,
            "products-name" => $productsSortName,
            "manufacture" => $manufacture,
            "prototypes" => $prototypes,
            "manufactures" => $manufactures
        ]);
    }

    function Details($id = null)
    {
        if (is_null($id) || !is_numeric($id)) return $this->view("page404");

        $productModel = $this->model("ProductModel");
        $prototypeModel = $this->model("PrototypeModel");
        $manufactureModel = $this->model("ManufactureModel");

        $product = $productModel->getProductsWithId($id);
        if (is_null($product)) return $this->view("page404");
        
        $productsRelate = $productModel->getProductsWithPrototypes($product->type_id);
        $prototypes = $prototypeModel->getPrototypes();
        $manufactures = $manufactureModel->getManufactures();
        
        $this->view("products-details", [
            "product" => $product,
            "products-relate" => $productsRelate,
            "prototypes" => $prototypes,
            "manufactures" => $manufactures
        ]);
    }

    function Search()
    {
        $productModel = $this->model("ProductModel");
        $prototypeModel = $this->model("PrototypeModel");
        $manufactureModel = $this->model("ManufactureModel");

        $products = $productModel->getProducts();
        $productsSortPrice = $productModel->getProductsSort("price");
        $productsSortName = $productModel->getProductsSort("name");

        $prototypes = $prototypeModel->getPrototypes();
        $manufactures = $manufactureModel->getManufactures();
        
        $this->view("products", [
            "products" => $products,
            "products-price" => $productsSortPrice,
            "products-name" => $productsSortName,
            "prototypes" => $prototypes,
            "manufactures" => $manufactures
        ]);
    }
}
