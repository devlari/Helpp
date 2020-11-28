<?php

namespace application\controllers;

use application\models\Usuario;
use application\core\Controller;

class Login extends Controller
{    
    private $perm;

    public function __construct()
    {       
    }

    public function index()
    {          
        $user = new Usuario;
                
        if(empty($_SESSION['usuario']))
	    {
            session_start();
        
            $this->load('login/head');   
            $this->load('login/logar');        
            
            if(isset($_POST['txtRM']))
            {
                if($user->Login())
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
                        $this->atualizarSenha();
                    }
                    else{
                        
                    }
                }
            }
        }
        else
        {        
            $control = new RouterControl;
            $control->load();
        }   

        
    }
        

    public function atualizarSenha()
    {
        echo 'caimos';
    }
}