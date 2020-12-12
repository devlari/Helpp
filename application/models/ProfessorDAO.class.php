<?php

/**
 * ProfessorDAO.class [ TIPO ]
 * Descricao
 * @copyright (c) year, Geovana M. Melo 
 */
class ProfessorDAO{
//put your code here
     public function cadastrarProfessor(application\models\Usuario $u) {
        $query = "INSERT INTO professor (rmUsuario, rmProfessor) values (?,?)";
        
        $cadastrar = Conn::getConn()->prepare($query);
        
        $cadastrar->bindValue(1, $u->getId());
        $cadastrar->bindValue(2, $u->getId());
        
        try{
            $cadastrar->execute();
            $this->result = Conn::getConn()->lastInsertId();
        } catch (Exception $e) {
            $this->result = null;
            WSErro("<b>Erro ao cadastrar:</b> {$e->getMessage()}", $e->getCode());
        }
    }
    
    public function consultarALuno($q) {
        $sql = $q;
        
        $consultar = Conn::getConn()->prepare($sql);
        $consultar->execute();
        
        if ($consultar->rowCount() > 0){
            $resultado = $consultar->fetchAll(PDO::FETCH_ASSOC);
            return $resultado;
        } 
    }
}
