<?php
class Admin extends Controller
{

    function Index()
    {
        $this->view("page404");
    }

    function Login()
    {
        $this->view("login");
    }
    
    function SignUp()
    {
        $this->view("admin");
    }
}
