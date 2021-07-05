<?php

require_once('conn.php');

$nome = $_POST['nome'] ?: "";
$email = $_POST['email'] ?: "";
$senha = MD5($_POST['senha']) ?: "";
$check = isset($_POST['agree']) ? true : false;
$sub = isset($_POST['sub']) ? true : false;
$prosseguir = true;

if($nome == "" or $nome == NULL){
    echo "Nome não inserido.";
    $prosseguir = false;
}

if($email == "" or $email == NULL){
    echo "Email não inserido.";
    $prosseguir = false;
}

if($senha == "" or $senha == NULL){
    echo "Senha não inserida.";
    $prosseguir = false;
}

if($check == false){
    echo "Não concordou com os termos.";
    $prosseguir = false;
}

if($sub == false){
    echo "Não clicou no botão.";
    $prosseguir = false;
}

if ($prosseguir == true){

    $sql = "SELECT * FROM usuarios WHERE email = '$email'";
    $resultado = $conn->query($sql);

    if($resultado->num_rows <= 0){

        $inserir = $conn->prepare("INSERT INTO usuarios (nome,email,senha) VALUES (?,?,?)");
        $inserir->bind_param("sss",$nome,$email,$senha);

        if($inserir->execute()){
            echo "
            <script>
                window.alert('Usuario inserido, realize o login.');
                window.location.href='associado.php';
            </script>";
        }else{
            echo "Error: ". $inserir->error;
        }

    }else{
        echo "
            <script>
                window.alert('Usuario existente,realize login.');
                window.location.href='associado.php';
            </script>";
    }
    
}

$conn->close();
?>