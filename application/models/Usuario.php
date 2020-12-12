<?php

/**
 * Usuario.class.php [ TIPO ]
 * Descricao
 * @copyright (c) year, Geovana M. Melo 
 */
//use application\config\Conn;

class Usuario{
    
    protected $rmUsuario;
    protected $nomeUsuario;
    private $emailUsuario;
    private $perfilUsuario;
    private $senhaUsuario;
        
        # VALIDAÇÃO DO LOGIN #
        public function Login()
        {     
            $query = "SELECT rmUsuario, senhaUsuario, perfilUsuario FROM usuario WHERE rmUsuario = '{$this->idUsuario}' AND senhaUsuario = '{$this->senhaUsuario}' AND perfilUsuario = '{$this->perfilUsuario}'";
            $result = mysqli_query(Conn::getConn(), $query);
            $row = mysqli_num_rows($result);
    
            if($row == 1)
            {
                return true;
            }
            else
            {
                return false;
            }       
        }
    
        public function veryfyPass()
        {
            $query = "SELECT rmUsuario, senhaUsuario, perfilUsuario FROM usuario WHERE rmUsuario = '{$this->idUsuario}' AND senhaUsuario = '{$this->senhaUsuario}' AND perfilUsuario = '{$this->perfilUsuario}' AND atualizaSenha = '1'";
            $result = mysqli_query($this->connect(), $query);
            $row = mysqli_num_rows($result);
    
            if($row == 1)
            {
                return true;
            }
            else
            {
                return false;
            } 
        }
    
        public function verifyPerm()
        {
            switch ($this->perfilUsuario) {
                case 'gestor':                
                    return 'Gestor';
                break;
                case 'professor':
                    return 'Professor';                
                break;
                case 'aluno':
                    return 'Aluno';
                break;
            }
        }
    
        public function realScape($id, $senha)
        {
            $realId = mysqli_real_escape_string($this->connect(), $id);
            $realSenha = mysqli_real_escape_string($this->connect(), $senha);
    
            $trat = array(
               'setId' => $realId,
                'setSenha' => $realSenha
            );
    
            return  $trat;       
        }

    public function setId($id)
    {
        $this->rmUsuario = $id;
    }

    public function getId()
    {
        return $this->rmUsuario;
    }

    public function setNome($nome)
    {
        $this->nomeUsuario = $nome;
    }

    public function getNome()
    {
        return $this->nomeUsuario;
    }

    public function setEmail($email)
    {
        $this->emailUsuario = $email;
    }

    public function getEmail()
    {
        return $this->emailUsuario;
    }

    public function setPerfil($perfil)
    {
        $this->perfilUsuario = $perfil;
    }

    public function getPerfil()
    {
        return $this->perfilUsuario;
    }

    public function setSenha($senha)
    {
        $this->senhaUsuario = $senha;
    }

    public function getSenha()
    {
        return $this->senhaUsuario;
    }
}
