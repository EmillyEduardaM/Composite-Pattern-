<?php

    // Classe TSqlUpdate - Essa classe provê meios para manipulação de uma instrução UPDATE no banco de dados.
    final class TSqlUpdate extends TSqlInstruction {
    
    private $colunmValues;
    /* Método setRowData () - Atribui valor a determinadas colunas no banco de dados que serão modificadas
@Param $column = coluna da tabela
@Param $value = valor a ser aramzaenado*/

    public function setRowData ($column,$value){

    // Verifica se um dado é escalar (string, inteiro...)
    if(is_scalar($value)){
    if(is_string($value) and (!empty($value))){

    // Adiciona \ em aspas
    $value = addslashes($value);

    // Caso se uma string
    $this ->colunmValues[$column] = $value;
}
    else if(is_bool($value)){
    // Caso eja um booleano
    $this ->colunmValues[$column] = $value ? 'TRUE': 'FALSE'; 
}
    else if ($value!==''){
    // Caso seja um tipo de dado
    $this ->colunmValues[$column] = $value;
}
    else{
    // Caso seja NUUL
    $this ->colunmValues[$column] = 'NULL';
}
}
}

    // Método getInstruction() - Retorna a instrução UPDATE em forma de string 

    public function getInstruction (){
    // Monta a string UPDATE
    $this->sql= "UPDATE {$this->entity}";
    // Monta os pares: coluna=valor
    if($this->colunmValues){
    foreach($this->colunmValues as $column=>$value){
    $set [] = "{$column}={$value}";
}
    $this ->sql.= "SET". implode (",", $set );
    
    // Retorna a clasula where do objeto $this->
    if ($this->criteria){
    $this ->sql.= "WHERE". $this->criteria->dump();

}
}
return $this->sql;
}
}


?>