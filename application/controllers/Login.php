<?php

namespace application\controllers;

use application\models\UsuarioDAO;
use application\core\Controller;

class Login extends Controller
{    
    private $perm;

    public function __construct()
    {       
    }

    public function index()
    {                  
        if(empty($_SESSION['usuario']))
	    {
            session_start();
        
            $this->load('login/head');   
            $this->load('login/logar');
        }
        else
        {        
            //$control = new RouterControl;
            //$control->load();
        }   

        
    }
        

    public function check()
    { 
        //require("../application/models/UsuarioDAO.class.php");
        //$user = new UsuarioDAO;
        if(isset($_POST['txtRM']))
        {
           // if($user->obterUsuario($_POST['txtRM']))
            //{
                echo 'ACHADO';
            //}

            /*if($user->Login())
            {
                $this->perm = $user->verifyPerm();

                $arr = $user->realScape($_POST['txtRM'], $_POST['txtSenha']);
                foreach ($arr as $key => $value)
                {
                    $user->{$key}($value);
                    if($key == 'setId')
                    {
                        $_SESSION['usuario'] = $value;
                    }
                } 
                $user->setCargo($_POST['cargo']);
                $_SESSION['cargo'] = $_POST['cargo'];
                    
                if(!$user->verifyPass())
                {
                    $control = new RouterControl;
                    $control->load($this->perm);
                    //$this->atualizarSenha();
                }
                else{
                    $control = new RouterControl;
                    $control->load($this->perm);
                }
            }
            else
            {
                //RETORNAR "USUÁRIO OU SENHA INCORRETOS"
            }*/
        }
    }
}
?>