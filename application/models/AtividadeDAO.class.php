<?php

/**
 * AtividadeDAO.class [ TIPO ]
 * Descricao
 * @copyright (c) year, Geovana M. Melo 
 */
class AtividadeDAO extends Conn{
    public function cadastrarAtividade(Atividade $a) {
        $query = "INSERT INTO atividade (PP_Disciplina_codDisciplina, PP_Aluno_rmAluno, titulo_atividade, "
                . "instrucao_atividade, prazo_entrega, forma_entrega, arquivo_prof) values (?,?,?,?,?,?,?)";
        
        $cadastrar = Conn::getConn()->prepare($query);
        
        $cadastrar->bindValue(1, 1);
        $cadastrar->bindValue(2, '180114');
        $cadastrar->bindValue(3, $a->getTituloAtividade());
        $cadastrar->bindValue(4, $a->getInstrucaoAtividade());
        $cadastrar->bindValue(5, $a->getPrazoAtividade());
        $cadastrar->bindValue(6, $a->getFormaEntregaAtividade());
        $cadastrar->bindValue(7, $a->getArquivoProf());
        
        try{
            $cadastrar->execute();
            $this->result = Conn::getConn()->lastInsertId();
            echo "Atividade cadastrada com sucesso!";
        } catch (Exception $e) {
            $this->result = null;
            WSErro("<b>Erro ao cadastrar:</b> {$e->getMessage()}", $e->getCode());
        }
    }
    
    public function consultarAtividade($q){
        $sql = $q;
        
        $consultar = Conn::getConn()->prepare($sql);
        $consultar->execute();
        
        if ($consultar->rowCount() > 0){
            $resultado = $consultar->fetchAll(PDO::FETCH_ASSOC);
            return $resultado;
        }
    }
    
    private function excluirAtividade($id)
    {
        $query = "DELETE FROM atividade where codAtividade = ?";
        
        $deletar = Conn::getConn()->prepare($query);
        $deletar->bindValue(1, $id);
        $deletar->execute();
    }
    
    public function getResult() {
        return $this->result;
    }
    
    public function editarAtividade(Atividade $atividade){
        $query = "UPDATE atividade SET titulo_atividade = ?, instrucao_atividade = ?, 
        prazo_entrega = ?, forma_entrega = ?
        WHERE codAtividade = ?";

        $alterar = Conn::getConn()->prepare($query);
        
        $alterar->bindValue(1, $atividade->getTituloAtividade());
        $alterar->bindValue(2, $atividade->getInstrucaoAtividade());
        $alterar->bindValue(3, $atividade->getPrazoAtividade());
        $alterar->bindValue(4, $atividade->getFormaEntregaAtividade());
        $alterar->bindValue(5, $atividade->getCodigoAtividade());

        try{
            $alterar->execute();
            $this->result = Conn::getConn()->lastInsertId();
        } catch (Exception $e) {
            $this->result = null;
            WSErro("<b>Erro ao alterar o registro de código: {$u->getId()}:</b> {$e->getMessage()}", $e->getCode());
        }
    }

    public function editarAtividadeArquivo(Atividade $atividade){
        $query = "UPDATE atividade SET titulo_atividade = ?, instrucao_atividade = ?, 
        prazo_entrega = ?, forma_entrega = ?, arquivo_prof = ?
        WHERE codAtividade = ?";

        $alterar = Conn::getConn()->prepare($query);
        
        $alterar->bindValue(1, $atividade->getTituloAtividade());
        $alterar->bindValue(2, $atividade->getInstrucaoAtividade());
        $alterar->bindValue(3, $atividade->getPrazoAtividade());
        $alterar->bindValue(4, $atividade->getFormaEntregaAtividade());
        $alterar->bindValue(5, $atividade->getArquivoProf());
        $alterar->bindValue(6, $atividade->getCodigoAtividade());

        try{
            $alterar->execute();
            $this->result = Conn::getConn()->lastInsertId();
        } catch (Exception $e) {
            $this->result = null;
            WSErro("<b>Erro ao alterar o registro de código: {$u->getId()}:</b> {$e->getMessage()}", $e->getCode());
        }
    }
    
    public function listarAtividadeProf($rmProfessor) {
        $query = "Select * from atividade a inner join pp b on a.PP_Aluno_rmAluno = b.aluno_rmAluno 
        and a.PP_Disciplina_codDisciplina = b.disciplina_codDisciplina inner join professor_pp c 
        on b.aluno_rmAluno = c.cod_pp_rmAluno and b.disciplina_codDisciplina = c.cod_pp_codDisciplina 
        where c.rm_professor = ?";
       
        $busca = Conn::getConn()->prepare($query);
        $busca->bindValue(1, $rmProfessor);
        $busca->execute();
        
        $this->resultado = $busca->fetchAll(PDO::FETCH_ASSOC);
        return $this->resultado;
    }
    
     public function listarAtividadeAlunoConcluida($rmAluno) {
        $query = "Select * from atividade where PP_Aluno_rmAluno = ? AND status = 'Entregue'";
       
        $busca = Conn::getConn()->prepare($query);
        $busca->bindValue(1, $rmAluno);
        $busca->execute();
        
        $this->resultado = $busca->fetchAll(PDO::FETCH_ASSOC);
        return $this->resultado;
    }

    public function listarAtividadeAlunoConcluidaFiltrado($rmAluno, $filtro) {
        $query = "Select * from atividade where PP_Aluno_rmAluno = ? AND status = 'Entregue' AND PP_Disciplina_codDisciplina = ?";
       
        $busca = Conn::getConn()->prepare($query);
        $busca->bindValue(1, $rmAluno);
        $busca->bindValue(2, $filtro);
        $busca->execute();
        
        $this->resultado = $busca->fetchAll(PDO::FETCH_ASSOC);
        return $this->resultado;
    }

    public function listarAtividadeAlunoAtribuida($rmAluno) {
        $query = "Select * from atividade where PP_Aluno_rmAluno = ? AND status=''";
       
        $busca = Conn::getConn()->prepare($query);
        $busca->bindValue(1, $rmAluno);
        $busca->execute();
        
        $this->resultado = $busca->fetchAll(PDO::FETCH_ASSOC);
        return $this->resultado;
    }

    public function listarAtividadeAlunoAtribuidaFiltrado($rmAluno, $filtro) {
        $query = "Select * from atividade where PP_Aluno_rmAluno = ? AND status='' AND PP_Disciplina_codDisciplina = ?";
       
        $busca = Conn::getConn()->prepare($query);
        $busca->bindValue(1, $rmAluno);
        $busca->bindValue(2, $filtro);
        $busca->execute();
        
        $this->resultado = $busca->fetchAll(PDO::FETCH_ASSOC);
        return $this->resultado;
    }

    public function enviarAtividadeAluno(Atividade $atividade){
        $query = "UPDATE atividade SET data_conclusao = ?,  
        status = ?, arquivo_aluno = ? WHERE codAtividade = ?";

        $alterar = Conn::getConn()->prepare($query);

        $alterar->bindValue(1, $atividade->getDataConclusaoAtividade());
        $alterar->bindValue(2, $atividade->getStatus());
        $alterar->bindValue(3, $atividade->getArquivoAluno());
        $alterar->bindValue(4, $atividade->getCodigoAtividade());

        try{
            $alterar->execute();
            $this->result = Conn::getConn()->lastInsertId();
        } catch (Exception $e) {
            $this->result = null;
            echo $e;
        }
    }

    public function contarAtividadeAlunoAtribuida($rm){
        $query = "SELECT COUNT(codAtividade) FROM atividade WHERE status = '' AND PP_Aluno_rmAluno = $rm";

        $busca = Conn::getConn()->prepare($query);
        $busca->execute();

        $this->resultado = $busca->fetchAll(PDO::FETCH_ASSOC);
        return $this->resultado;
    }

    public function contarAtividadeAlunoAtribuidaFiltrado($rm, $filtro){
        $query = "SELECT COUNT(codAtividade) FROM atividade WHERE status = '' AND PP_Aluno_rmAluno = $rm AND PP_Disciplina_codDisciplina = $filtro";

        $busca = Conn::getConn()->prepare($query);
        $busca->execute();

        $this->resultado = $busca->fetchAll(PDO::FETCH_ASSOC);
        return $this->resultado;
    }

    public function contarAtividadeAlunoConcluida($rm){
        $query = "SELECT COUNT(codAtividade) FROM atividade WHERE status = 'Entregue' AND PP_Aluno_rmAluno = $rm";

        $busca = Conn::getConn()->prepare($query);
        $busca->execute();
        
        $this->resultado = $busca->fetchAll(PDO::FETCH_ASSOC);
        return $this->resultado;
    }

    public function contarAtividadeAlunoConcluidaFiltrado($rm,$filtro){
        $query = "SELECT COUNT(codAtividade) FROM atividade WHERE status = 'Entregue' AND PP_Aluno_rmAluno = $rm AND PP_Disciplina_codDisciplina = $filtro";

        $busca = Conn::getConn()->prepare($query);
        $busca->execute();
        
        $this->resultado = $busca->fetchAll(PDO::FETCH_ASSOC);
        return $this->resultado;
    }

    public function enviarMencao($atividade){
        $query = "UPDATE atividade SET mencao_atividade = ?  
        WHERE codAtividade = ?";

        $alterar = Conn::getConn()->prepare($query);

        $alterar->bindValue(1, $atividade->getMencaoAtividade());
        $alterar->bindValue(2, $atividade->getCodigoAtividade());

        try{
            $alterar->execute();
            $this->result = Conn::getConn()->lastInsertId();
        } catch (Exception $e) {
            $this->result = null;
            echo $e;
        } 
    }
}
