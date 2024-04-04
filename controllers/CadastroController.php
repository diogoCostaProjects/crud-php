<?php
include "Controller.php";
include "models/user.php";

class CadastroController extends Controller
{
    public function __construct()
    {
        $this->users =  new UserModel();
    }

    public function lista()
    {
        $cores_user = [];
        
        $users_array = $this->users->getUsers();
        $cores = $this->users->getAllColors();
        

        foreach ($users_array as $key=>$u){
            $cores_user[$key] = $this->users->getColorsUser($u->id);
        }
        
        $this->render("lista", $users_array, $cores_user, $cores);
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

    public function adicionar()
    {
        if (isset($_POST)) {

            $data['nome'] =       $_POST['nome'];
            $data['email'] =      $_POST['email'];
            $data['cores'] =      $_POST['cores'];

            $return = $this->users->insert($data);

            echo $return;
        }
    }

    public function remover()
    {
        if (isset($_POST)) {

            $data['id'] =       $_POST['id'];

            $return = $this->users->deleteUserColors($data);
            $return = $this->users->delete($data);

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
