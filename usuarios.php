<?php
require_once("conn.php");

if(!isset($_SESSION)) session_start();

if(!isset($_SESSION["UserNome"])){
    echo "
        <script>
            window.alert('Você não está logado.');
            window.location.href='associado.php';
        </script>";
}
?>
<html>    
    <head>
        <!-- CSS only -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">        
        <link href="./style.css" rel="stylesheet" type="text/css">
    </head>
    <body>
        <?php include_once('header.php'); ?>
        <div class="container bg-light">
            <table class="table table-dark table-striped">
                <thead>
                    <tr>
                        <td scope="col">ID</th>
                        <td>Nome</td>
                        <td>Email</td>
                    </tr>
                </thead>
                <tbody>
                <?php
                $query_users = "SELECT * FROM usuarios";
                $resultado_users = $conn->query($query_users);

                if($resultado_users->num_rows > 0){

                    while ($linha = $resultado_users->fetch_assoc()) {

                        echo "<tr>\n";
                        echo "<th scope='row'>".$linha["id"]."</th>\n";
                        echo "<td>".$linha["nome"]."</td>\n";
                        echo "<td>".$linha["email"]."</td>\n";
                        echo "</tr>\n";

                    }

                }else{
                    echo "<tr>";
                    echo "<th scope='row'>-<th>";
                    echo "<td>-</td>";
                    echo "<td>-</td>";
                    echo "</tr>";
                }
                $conn->close();
                ?>
                </tbody>
            </table>
        </div>
    </body>
</html>
