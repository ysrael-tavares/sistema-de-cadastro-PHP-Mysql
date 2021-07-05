<?php
require_once('conn.php');

if($conn->connect_error){
    die("Connection failed: " . $conn->connect_error);
}

$criacao = "CREATE TABLE IF NOT EXISTS usuarios(
    id INTEGER UNSIGNED PRIMARY KEY AUTO_INCREMENT,
    nome TEXT NOT NULL,
    email TEXT NOT NULL,
    senha TEXT NOT NULL
)";


if($conn->query($criacao) === TRUE){
    echo "Tabela criada";
}else{
    echo "Erro ".$conn->error;
}

$conn->close();
?>