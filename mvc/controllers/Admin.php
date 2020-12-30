<?php

class Admin extends Controller
{

    function __construct()
    {
        $userModel = $this->model("UserModel");
        $permission = false;
        if (isset($_SESSION['user'])) {
            $user = $userModel->getUserWithUsername($_SESSION['user']);
            if ($user == null) {
                $permission = false;
                unset($_SESSION['user']);
            } else {
                if ($user->permission == 9) $permission = true;
            }
        }

        if (!$permission) {
            header("location: $_SERVER[PHP_SELF]");
        }
    }

    function Index()
    {
        $productModel = $this->model("ProductModel");
        $products = $productModel->getProducts();

        $this->view("admin/products", [
            "products" => $products,
        ]);
    }

    function Products($path = null, $id = null)
    {
        $productModel = $this->model("ProductModel");
        $manufacturesModel = $this->model("ManuFactureModel");
        $prototypesModel = $this->model("PrototypeModel");

        $manuFactures = $manufacturesModel->getManufactures();
        $prototypes = $prototypesModel->getPrototypes();
        if ($path == "create") {
            $this->view("admin/products-create", [
                "manuFactures" => $manuFactures,
                "prototypes" => $prototypes
            ]);
            return;
        }

        if ($path == "edit") {
            $this->view("admin/products-edit", [
                "manuFactures" => $manuFactures,
                "prototypes" => $prototypes
            ]);
            return;
        }

        $product = $productModel->getProductsWithId($id);
        if ($path == "edit") {
            $this->view("admin/products-edit", [
                "product" => $product,
                "manuFactures" => $manuFactures,
                "prototypes" => $prototypes
            ]);
            return;
        }


        $products = $productModel->getProducts();
        $this->view("admin/products", [
            "products" => $products,
        ]);
    }

    function Categories($path1 = null, $path2 = null)
    {
        if ($path1 == "manufacture") {
            if ($path2 == "create") {
                $this->view("admin/manufacture-create");
                return;
            }
            if ($path2 == "edit") {
                $this->view("admin/manufacture-edit");
                return;
            }
        }

        if ($path1 == "prototype") {
            if ($path2 == "create") {
                $this->view("admin/prototype-create");
                return;
            }
            if ($path2 == "edit") {
                $this->view("admin/prototype-edit");
                return;
            }
        }

        $prototypeModel = $this->model("PrototypeModel");
        $manufactureModel = $this->model("ManufactureModel");

        $prototypes = $prototypeModel->getPrototypes();
        $manufactures = $manufactureModel->getManufactures();

        $this->view("admin/categories", [
            "prototypes" => $prototypes,
            "manufactures" => $manufactures
        ]);
    }

    function Users()
    {
        $userModel = $this->model("UserModel");
        $users = $userModel->getUsers();

        $this->view("admin/users", [
            "users" => $users,
        ]);
    }

    function Setting()
    {
        $this->view("admin/setting");
    }
}
