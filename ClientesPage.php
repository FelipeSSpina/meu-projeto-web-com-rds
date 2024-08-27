<?php include "../inc/dbinfo.inc"; ?>
<html>
<body>
<h1>Gestão de Clientes</h1>
<?php
  // conectar ao banco de dados MySQL
  $connection = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD);

  if (mysqli_connect_errno()) {
      echo "Erro ao conectar ao MySQL: " . mysqli_connect_error();
  }

  // Selecionar o banco de dados
  $database = mysqli_select_db($connection, DB_DATABASE);

  // Verifica se a tabela 'clientes' existe
  VerifyClientesTable($connection, DB_DATABASE);

  // adicionar cliente se o formulário for preenchido
  $nome = htmlentities($_POST['nome']);
  $email = htmlentities($_POST['email']);
  $data_nascimento = htmlentities($_POST['data_nascimento']);

  if (strlen($nome) || strlen($email) || strlen($data_nascimento)) {
      AddCliente($connection, $nome, $email, $data_nascimento);
  }
?>

<!-- Formulário de entrada -->
<form action="<?php echo $_SERVER['SCRIPT_NAME'] ?>" method="POST">
  <table border="0">
    <tr>
      <td>Nome</td>
      <td>Email</td>
      <td>Data de Nascimento</td>
    </tr>
    <tr>
      <td><input type="text" name="nome" maxlength="100" size="30" /></td>
      <td><input type="text" name="email" maxlength="100" size="30" /></td>
      <td><input type="date" name="data_nascimento" /></td>
      <td><input type="submit" value="Adicionar Cliente" /></td>
    </tr>
  </table>
</form>

<!-- exibe os dados da tabela -->
<table border="1" cellpadding="2" cellspacing="2">
  <tr>
    <td>ID</td>
    <td>Nome</td>
    <td>Email</td>
    <td>Data de Nascimento</td>
  </tr>

<?php
  // Recuperar os dados da tabela 'clientes'
  $result = mysqli_query($connection, "SELECT * FROM clientes");

  while($query_data = mysqli_fetch_row($result)) {
      echo "<tr>";
      echo "<td>", $query_data[0], "</td>",
           "<td>", $query_data[1], "</td>",
           "<td>", $query_data[2], "</td>",
           "<td>", $query_data[3], "</td>";
      echo "</tr>";
  }
?>

</table>

<?php
  mysqli_free_result($result);
  mysqli_close($connection);
?>

</body>
</html>

<?php
// funcao pra adicionar um cliente  tabela
function AddCliente($connection, $nome, $email, $data_nascimento) {
  $n = mysqli_real_escape_string($connection, $nome);
  $e = mysqli_real_escape_string($connection, $email);
  $dn = mysqli_real_escape_string($connection, $data_nascimento);

  $query = "INSERT INTO clientes (nome, email, data_nascimento) VALUES ('$n', '$e', '$dn');";

  if (!mysqli_query($connection, $query)) echo "<p>Erro ao adicionar os dados do cliente.</p>";
}

// a função para verificar se a tabela 'clientes' existe e criá-la
function VerifyClientesTable($connection, $dbName) {
  if (!TableExists("clientes", $connection, $dbName)) {
      $query = "CREATE TABLE clientes (
          id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
          nome VARCHAR(100),
          email VARCHAR(100),
          data_nascimento DATE
        )";
      if (!mysqli_query($connection, $query)) echo "<p>Erro ao criar a tabela clientes.</p>";
  }
}

// aqui a função para verificar a existência de uma tabela
function TableExists($tableName, $connection, $dbName) {
  $t = mysqli_real_escape_string($connection, $tableName);
  $d = mysqli_real_escape_string($connection, $dbName);

  $checktable = mysqli_query($connection,
      "SELECT TABLE_NAME FROM information_schema.TABLES WHERE TABLE_NAME = '$t' AND TABLE_SCHEMA = '$d'");

  if (mysqli_num_rows($checktable) > 0) return true;

  return false;
}
?>
