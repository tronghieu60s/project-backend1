<?php

class Auth extends Controller
{
    function Index()
    {
        $this->view("page404");
    }

    function Login()
    {
        $this->view("auth/login");
    }

    function SignUp()
    {
        $this->view("auth/signup");
    }
}
