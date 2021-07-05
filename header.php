<?php
if(!isset($_SESSION)) session_start();

$welcome = isset($_SESSION["UserNome"]) ? " ".$_SESSION["UserNome"]."! <a class='text-white' href='./logout.php'>Logout</a>" : "!";
?>

<div class="container">
            <div class="row bg-primary text-white">
                <div class="col-sm-4">Bem vindo<?=strtolower(ucfirst($welcome));?></div>
        <?php

        $menu = array("home","associado","usuarios");
        $links = array(
            "home" => "index",
            "associado" => "associado",
            "usuarios" => "usuarios"
        );

        //for($i=1;$i<=$limite;$i++){
        foreach($menu as $item){
        ?>
                <div class="col-sm">
                    <a href="./<?=$links[$item].'.php';?>" class="text-white"><?php echo ucwords(strtolower($item)); ?></a>
                </div>
        <?php
        }
        ?>
        </div>
            </div>
