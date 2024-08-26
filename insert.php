<?php
// conexao com o banco de dados mysql no rds
$servername = "meubanco2.ccnaqixeoqtn.us-east-1.rds.amazonaws.com";
$username = "admin";
$password = "vpcpadrao";
$dbname = "meubanco";

// cria a conexao com o banco de dados
$conn = new mysqli($servername, $username, $password, $dbname);

// verifica se a conexao foi bem-sucedida
if ($conn->connect_error) {
    die("falha na conexao: " . $conn->connect_error);
}

// verifica se os dados foram enviados pelo formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST["nome"];
    $idade = $_POST["idade"];
    $data_registro = date("Y-m-d");

    // insere os dados na tabela do banco de dados
    $sql = "INSERT INTO sua_tabela (nome, idade, data_registro) VALUES ('$nome', '$idade', '$data_registro')";

    if ($conn->query($sql) === TRUE) {
        echo "novo registro criado com sucesso";
    } else {
        echo "erro: " . $sql . "<br>" . $conn->error;
    }
}
?>

<!-- formulario para envio de dados -->
<form method="post" action="">
  nome: <input type="text" name="nome"><br>
  idade: <input type="text" name="idade"><br>
  <input type="submit">
</form>
