<?php

    // Classe Delete - Provê meios para manipulação de uma instrução de DELETE no banco de dados.
    final class TSqlDelete extends TSqlInstruction {

    // Método getInstruct() - Retorna a instrução de delete em forma de string
    public function getInstruction(){
    
    // Monta a string do DELETE
    $this->sql = "DELETE FROM {$this->entity}";

    // Retorna a clasusula WHERE do objeto $this->criteria
    if($this->criteria){

    $expression = $this->criteria->dump();
    if($expression){
    $this->sql .= "WHERE" . $expression;

}

    return $this->sql;
}
}
}

?>