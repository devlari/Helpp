<?php

/**
 * Read.class.php [ TIPO ]
 * Descricao
 * @copyright (c) year, Geovana M. Melo 
 */
class Read extends Conn{
    //Recebe a instrução de SELECT
    private $Select;
    
    //receb os bind values
    private $Places;
    private $Result;
    
    /** @var PDOStatement */
    private $Read;
    
    /** @var PDO */
    private $Conn;
    
    //verifica se vai existir ou não uma condição para executar a query, sendo que esta condição será recebida pela ParseString 
    //Termos recebe a condição WHERE, ParseInt recebe os dados que irão substituir os links
    public function ExeRead($Tabela, $Termos = null, $ParseString = null){
        //Se ParseString existir...
        if(!empty($ParseString)):
            $this->Places = $ParseString;
            //transforma string parcial em array
            parse_str($ParseString, $this->Places);
        endif;
        
        //Criando a instrução/query
        $this->Select = "SELECT * FROM {$Tabela} {$Termos}";
        $this->Execute();
    }
    
    public function getResult() {
        return $this->Result;
    }
    
    //verifica quantos resultados a query teve
    public function getRowCount() {
        return $this->Read->rowCount();
    }
    
    /**
     * Método para passar a query manualmente, nesse aqui da pra fazer tudo de uma vez
     */
    public function FullRead($Query, $ParseString = null) {
        $this->Select = (string) $Query;
        if(!empty($ParseString)):
            parse_str($ParseString, $this->Places);
        endif;
        $this->Execute();
    }
    
    public function setPlaces($ParseString) {
        parse_str($ParseString, $this->Places);
    }
           
    /**
     * ****************************************
     * ************ PRIVATE METHODS ***********
     * ****************************************
     */
    
    private function Connect() {
        $this->Conn = parent::getConn();
        //preparando a query no objeto PDO
        $this->Read = $this->Conn->prepare($this->Select);
        //define se vai retornar array ou objeto, nesse caso retornaremos um array
        $this->Read->setFetchMode(PDO::FETCH_ASSOC);
    }
    
    private function getSyntax() {
        //verifica se place foi aramazenada para fazer os binds
        if($this->Places):
            //para cada place armazenada, cria um novo bind
            // Vinculo sera os links, os limites ajudam no tipo de dado
            foreach ($this->Places as $Vinculo => $Valor):
                if($Vinculo == 'limit' || $Vinculo == 'offset'):
                    $Valor = (int) $Valor;
                endif;
                //recebe os binds, e faz um if verificando se o valor é int ou não
                $this->Read->bindValue(":{$Vinculo}", $Valor, (is_int($Valor) ? PDO::PARAM_INT : PDO::PARAM_STR));
            endforeach;
        endif;
    }
    
    private function Execute() {
       $this->Connect();
       //monta a query, executa, e se der certo, armazena em resultado
       try{
           $this->getSyntax();
           $this->Read->execute();
           //não precisa declarar o tipo aqui pq foi declarado la em cima no FETCH_ASSOC
           $this->Result = $this->Read->fetchAll();
       } catch (Exception $e) {
           WSErro("<b>Erro ao Ler:</b> {$e->getMessage()}", $e->getCode());
       }
    }
}

