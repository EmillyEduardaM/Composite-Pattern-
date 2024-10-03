<?php

spl_autoload_register(function ($classe) {
    if (file_exists("{$classe}.class.php")) {
        include_once "{$classe}.class.php";
    }
});

// Cria seleção de dados
$criteria = new TCriteria;
$criteria->add(new TFilter('id','=','3'));

// Cria instruções de DELETE 
$sql = new TSqlDelete;

// Define a entidade
$sql->setEntity('aluno');

// Define o critério de seleção de dados
$sql->setCriteria($criteria);

// Processo a instrução sql
echo $sql->getInstruction();

echo"<br>";
?>