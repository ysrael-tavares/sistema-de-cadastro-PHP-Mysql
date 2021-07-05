<?php

require_once('conn.php');

$email = $_POST['email'] ?: "";
$senha = MD5($_POST['senha']) ?: "";
$sub = isset($_POST['sub']) ? true : false;
$prosseguir = true;

if($email == "" or $email == NULL){
    echo "Email não inserido.";
    $prosseguir = false;
}

if($senha == "" or $senha == NULL){
    echo "Senha não inserida.";
    $prosseguir = false;
}

if($sub == false){
    echo "Não clicou no botão.";
    $prosseguir = false;
}

if($prosseguir == true){
    $sql = "SELECT * FROM usuarios WHERE email = '$email' AND senha = '$senha'";
    $resultado = $conn->query($sql);

    if($resultado->num_rows > 0){
        $dados = $resultado->fetch_assoc();

        if(!isset($_SESSION)) session_start();

        $_SESSION["UserId"] = $dados["id"];
        $_SESSION["UserNome"] = $dados["nome"];
        $_SESSION["UserEmail"] = $dados["email"];
        
        echo "
            <script>
                window.alert('Logado com sucesso.');
                window.location.href='usuarios.php';
            </script>";
    }else{
        echo "
            <script>
                window.alert('Usuario ou senha incorretos.');
                window.location.href='associado.php';
            </script>";
    }

}

$conn->close();
?>