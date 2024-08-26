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

// consulta para selecionar todos os registros da tabela
$sql = "SELECT id, nome, idade, data_registro FROM sua_tabela";
$result = $conn->query($sql);

// exibe os resultados em uma tabela html
if ($result->num_rows > 0) {
    echo "<table><tr><th>id</th><th>nome</th><th>idade</th><th>data de registro</th></tr>";
    
    // itera sobre os resultados e os exibe na tabela
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["id"]. "</td><td>" . $row["nome"]. "</td><td>" . $row["idade"]. "</td><td>" . $row["data_registro"]. "</td></tr>";
    }
    echo "</table>";
} else {
    echo "nenhum registro encontrado.";
}

// fecha a conexao com o banco de dados
$conn->close();
?>
