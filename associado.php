<html>
    <head>
        <!-- CSS only -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">        
        <link href="./style.css" rel="stylesheet" type="text/css">
    </head>
    <body>
        <?php include_once('header.php'); ?>
        <div class="container bg-light">
<?php
if(!isset($_SESSION)) session_start();

if(isset($_SESSION["UserNome"])){
    echo"<h1>Você está logado ".$_SESSION['UserNome']."!";
}else{
    echo"
            <div class='formulario'>
                <form action='./login.php' method='post'>
                    <div class='mb-3'>
                        <label for='exampleInputEmail1' class='form-label'>Email</label>
                        <input type='email' name='email' class='form-control' id='exampleInputEmail1' aria-describedby='emailHelp'>
                    </div>
                    <div class='mb-3'>
                        <label for='exampleInputPassword1' class='form-label'>Senha</label>
                        <input type='password' name='senha' class='form-control' id='exampleInputPassword1'>
                    </div>
                    <button type='submit' name='sub' class='btn btn-primary'>Enviar</button>
                    <div id='emailHelp' class='form-text'>Ainda não possui conta? <a href='./form-cadastro.php'>cadastre-se.</a></div>
                </form>
            </div>
    ";
}
?>
        </div>
    </body>
</html>