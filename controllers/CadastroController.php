<?php
include "Controller.php";
include "models/user.php";

class CadastroController extends Controller
{
    public function __construct()
    {
        $this->users =  new UserModel();
    }


    public function index()
    {
        $this->render("cadastro");
    }

    public function lista()
    {
        $users_array = $this->users->getUsers();
        $this->render("lista", $users_array);
    }

    public function editar()
    {
        if (isset($_POST)) {

            $data['id'] =       $_POST['id'];
            $data['nome'] =     $_POST['nome'];
            $data['email'] =    $_POST['email'];

            $return = $this->users->update($data);

            echo $return;
        }
    }

    public function adicionarCor()
    {
        if (isset($_POST)) {

            $data['id'] =       $_POST['id'];
            $data['cor'] =      $_POST['cor'];

            $return = $this->users->insertColor($data);

            echo $return;
        }
    }
}
