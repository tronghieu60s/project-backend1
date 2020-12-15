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

    function Categories()
    {
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
