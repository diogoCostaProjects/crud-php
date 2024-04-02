<?php
include "Controller.php";
include "models/user.php";

class HomeController extends Controller
{

    public function index()
    {
        $this->render("home");
    }
}
