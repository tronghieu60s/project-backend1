<?php
class Admin extends Controller
{

    function Index()
    {
        $productModel = $this->model("ProductModel");
        $products = $productModel->getProducts();

        $this->view("admin", [
            "products" => $products,
        ]);
    }

    function Products($path = null)
    {
        if ($path == "create") {
            $this->view("admin-products-create");
            return;
        }

        $productModel = $this->model("ProductModel");
        $products = $productModel->getProducts();

        $this->view("admin", [
            "products" => $products,
        ]);
    }

    function Categories($path1 = null, $path2 = null)
    {
        if ($path1 == "manufacture") {
            if ($path2 == "create") {
                $this->view("admin-manufacture-create");
                return;
            }
        }

        if ($path1 == "prototype") {
            if ($path2 == "create") {
                $this->view("admin-prototype-create");
                return;
            }
        }

        $prototypeModel = $this->model("PrototypeModel");
        $manufactureModel = $this->model("ManufactureModel");

        $prototypes = $prototypeModel->getPrototypes();
        $manufactures = $manufactureModel->getManufactures();

        $this->view("admin-categories", [
            "prototypes" => $prototypes,
            "manufactures" => $manufactures
        ]);
    }

    function Users()
    {
        $userModel = $this->model("UserModel");
        $users = $userModel->getUsers();

        $this->view("admin-users", [
            "users" => $users,
        ]);
    }

    function Login()
    {
        $this->view("login");
    }

    function SignUp()
    {
        $this->view("signup");
    }
}
