<?php

/**
 * UsuarioDAO.class.php [ TIPO ]
 * Descricao
 * @copyright (c) year, Geovana M. Melo 
 */
//namespace application\models;
//use application\config\conn;
//use PDO;

class UsuarioDAO extends Conn{
    public $result;
    
    public function cadastrarUsuario(Usuario $u)
    {
        $query = "INSERT INTO usuario (rmUsuario, nomeUsuario, perfilUsuario, senhaUsuario) values (?,?,?,?)";
        
        $cadastrar = Conn::getConn()->prepare($query);
        
        $cadastrar->bindValue(1, $u->getId());
        $cadastrar->bindValue(2, $u->getNome());
        $cadastrar->bindValue(3, $u->getPerfil());
        $cadastrar->bindValue(4, $u->getSenha());
        
        try{
            $cadastrar->execute();
            $this->result = Conn::getConn()->lastInsertId();
            echo "Cadastro efetuado com sucesso! <br>";
        } catch (Exception $e) {
            $this->result = null;
            WSErro("<b>Erro ao cadastrar:</b> {$e->getMessage()}", $e->getCode());
        }
    }
    
    public function consultarUsuario($rm)
    {
        $query = "SELECT * FROM usuario WHERE rmUsuario = ?";

        $verifica = Conn::getConn()->prepare($query);
        $verifica->bindValue(1, $rm);
        $verifica->execute();

        if ($verifica->rowCount() > 0){
            $resultado = $verifica->fetchAll(PDO::FETCH_ASSOC);
            return $resultado;
        }
    }
    
    
     public function obterUsuario($rmAluno)
    {
        $sql = "SELECT * FROM usuario WHERE rmUsuario = ?";
        $consultar = Conn::getConn()->prepare($sql);
        
        $consultar->bindValue(1, $rmAluno);
        $consultar->execute();
        
        if ($consultar->rowCount() > 0){
            $resultado = $consultar->fetchAll(PDO::FETCH_ASSOC);
            return $resultado;
        } 
    }
    
    public function editarUsuario($u)
    {
        $query = "UPDATE usuario SET emailUsuario = ? WHERE rmUsuario = ?";
        $alterar = Conn::getConn()->prepare($query);
        
        $alterar->bindValue(1, $u->getEmail());
        $alterar->bindValue(2, $u->getId());
        
        try{
            $alterar->execute();
            $this->result = Conn::getConn()->lastInsertId();
        } catch (Exception $e) {
            $this->result = null;
            WSErro("<b>Erro ao alterar o registro de código: {$u->getId()}:</b> {$e->getMessage()}", $e->getCode());
        }
    }
    
    public function excluirUsuario($id)
    {
        $query = "DELETE FROM usuario where rmUsuario = ?";
        
        $deletar = Conn::getConn()->prepare($query);
        $deletar->bindValue(1, $id);
        $deletar->execute();
    }
    
    public function verificaUsuario($rm) {
        $query = "SELECT * FROM usuario WHERE rmUsuario = ?";
        
        $verifica = Conn::getConn()->prepare($query);
        $verifica->bindValue(1, $rm);
        $verifica->execute();
        
        if ($verifica->rowCount() > 0){
            $this->result = true;
            //echo "O RM {$rm} já está cadastrado no sistema! <br><hr>";
        }else{
            $this->result = false;
        }
    }
    
    public function getResult() {
        return $this->result;
    }

    public function VerificaSenha($rm,$senha){
        $query = "SELECT * FROM usuario WHERE senhaUsuario = ? AND rmUsuario = ?";

        $verifica = Conn::getConn()->prepare($query);
        $verifica->bindValue(1, $senha);
        $verifica->bindValue(2, $rm);
        $verifica->execute();

        if ($verifica->rowCount() > 0){
            return true;
        }
        else{
            return false;
        }
    }

    public function atualizaSenha($u){
        $query = "UPDATE usuario SET senhaUsuario = ? WHERE rmUsuario = ?";
        
        $alterar = Conn::getConn()->prepare($query);
        $alterar->bindValue(1, $u->getSenha());
        $alterar->bindValue(2, $u->getID());
                
        try{
            $alterar->execute();
            $this->result = Conn::getConn()->lastInsertId();
        } catch (Exception $e) {
            $this->result = null;
            WSErro("<b>Erro ao alterar o registro de código: {$u->getId()}:</b> {$e->getMessage()}", $e->getCode());
        }
    }
}
