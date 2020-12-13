<?php

/**
 * Atividade.class.php [ TIPO ]
 * Descricao
 * @copyright (c) year, Geovana M. Melo 
 */
class Atividade{
//put your code here
    private $codigoAtividade;
    private $rmAluno;
    private $codigoPP;
    private $tituloAtividade;
    private $instrucaoAtividade;
    private $dataConclusaoAtividade;
    private $prazoAtividade;
    private $formaEntregaAtividade;
    private $mencaoAtividade;
    private $arquivo_prof;
    private $arquivo_aluno;
    private $codigoDisciplina;
    
    public function importarArquivo(){
        
    }
    
    public function exportarArquivo(){
        
    }
    
    public function enviarAtividade(){
        
    }
    
    function getCodigoAtividade() {
        return $this->codigoAtividade;
    }

    function getRmAluno() {
        return $this->rmAluno;
    }

    function getCodigoDisciplina() {
        return $this->codigoDisciplina;
    }

    function getCodigoPP() {
        return $this->codigoPP;
    }

    function getTituloAtividade() {
        return $this->tituloAtividade;
    }

    function getInstrucaoAtividade() {
        return $this->instrucaoAtividade;
    }

    function getDataConclusaoAtividade() {
        return $this->dataConclusaoAtividade;
    }

    function getPrazoAtividade() {
        return $this->prazoAtividade;
    }

    function getFormaEntregaAtividade() {
        return $this->formaEntregaAtividade;
    }

    function getMencaoAtividade() {
        return $this->mencaoAtividade;
    }

    function getArquivoProf(){
        return $this->arquivo_prof;
    }

    function getArquivoAluno(){
        return $this->arquivo_aluno;
    }

    function getStatus(){
        return $this->status;
    }

    function setCodigoAtividade($codigoAtividade){
        $this->codigoAtividade = $codigoAtividade;
    }

    function setCodigoPP($codigoPP){
        $this->codigoPP = $codigoPP;
    }

    function setRmAluno($rmAluno){
        $this->rmAluno = $rmAluno;
    }

    function setTituloAtividade($tituloAtividade){
        $this->tituloAtividade = $tituloAtividade;
    }

    function setInstrucaoAtividade($instrucaoAtividade){
        $this->instrucaoAtividade = $instrucaoAtividade;
    }

    function setDataConclusaoAtividade($dataConclusaoAtividade){
        $this->dataConclusaoAtividade = $dataConclusaoAtividade;
    }

    function setPrazoAtividade($prazoAtividade){
        $this->prazoAtividade = $prazoAtividade;
    }

    function setFormaEntregaAtividade($formaEntregaAtividade){
        $this->formaEntregaAtividade = $formaEntregaAtividade;
    }

    function setMencaoAtividade($mencaoAtividade){
        $this->mencaoAtividade = $mencaoAtividade;
    }

    function setArquivoProf($arquivo_prof){
        $this->arquivo_prof = $arquivo_prof;
    }

    function setArquivoAluno($arquivo_aluno){
        $this->arquivo_aluno = $arquivo_aluno;
    }

    function setStatus($status){
        $this->status = $status;
    }

    function setCodigoDisciplina($disciplina){
        $this->codigoDisciplina = $disciplina;
    }


    
        
}
