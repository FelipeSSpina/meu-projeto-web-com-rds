<?php
// conexao com o banco de dados mysql no rds
$servername = "meubanco2.ccnaqixeoqtn.us-east-1.rds.amazonaws.com";
$username = "admin";
$password = "vpcpadrao";
$dbname = "meubanco";

// cria a conexao
$conn = new mysqli($servername, $username, $password, $dbname);

// verifica se a conexao foi bem-sucedida
if ($conn->connect_error) {
    die("conexao falhou: " . $conn->connect_error);
}
echo "conectado com sucesso ao banco de dados!";
$conn->close();
?>
