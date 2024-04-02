<?php
include "Controller.php";
include "models/user.php";

class CadastroController extends Controller
{

    public function index()
    {
        $this->render("cadastro");
    }

    public function lista()
    {
        $users =  new UserModel();
        $users_array = $users->getUsers();

        $this->render("lista", $users_array);
    }
}
