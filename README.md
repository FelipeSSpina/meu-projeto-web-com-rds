

# Projeto de Integração com Banco de Dados na AWS


&emsp;&emsp; Este projeto demonstra como configurar uma aplicação web simples integrada com um banco de dados MariaDB (MySQL) utilizando o Amazon RDS. A aplicação é executada em uma instância EC2 que roda Apache e PHP, permitindo inserir e listar dados de duas tabelas do banco de dados: `EMPLOYEES` e `CLIENTES`. A integração foi feita utilizando instâncias RDS e EC2 configuradas na AWS.

## Tarefa proposta:

Descrição:

1) Siga o tutorial do link deste autoestudo para fazer uma aplicação web integrada a uma base de dados. 

2) Crie mais uma tabela com pelo menos 4 campos e 3 tipos de dados diferentes. 

3) Crie uma página web para fazer as operações de criação e listagem dos registros desta tabela. 

4) Crie um repositório no GitHub com o código desenvolvido, e descreva no arquivo README o conteúdo do repositório. 

5) Prepare um vídeo demonstrando as máquinas/serviços em execução no console da AWS, com narração descrevendo como o deploy foi realizado e o que cada máquina/serviço faz. 

6) Lembre-se de colocar a URL do vídeo no arquivo README do repositório no GitHub.

## Estrutura do Projeto

Os arquivos do projeto são:

1. **SamplePage.php**: Página principal que permite a inserção e listagem de dados na tabela `EMPLOYEES`.

<div align="center">
  <p><b>Figura 1 </b>- Representação visual da página de Sample </p>
  <img src=".\SamplePage.png" alt="Representação visual da página de Clientes">
  <p>Fonte: elaborado por Felipe Spina</p>
</div>

2. **ClientesPage.php**: Página para manipulação da tabela `CLIENTES`, permitindo inserir e listar dados de clientes.

<div align="center">
  <p><b>Figura 2 </b>- Representação visual da página de Clientes </p>
  <img src=".\ClientesPage.png" alt="Representação visual da página de Clientes">
  <p>Fonte: elaborado por Felipe Spina</p>
</div>

*dbinfo.inc: não coloquei o arquivo que contém as credenciais de conexão ao banco de dados RDS no repositório por motivos de segurança. Mas ele é essencial durante o desenvolvimento.

## Criação de Nova Tabela com 4 Campos e 3 Tipos de Dados Diferentes

Atendendo ao requisito da tarefa, foi criada a tabela `CLIENTES`, com os seguintes campos e tipos de dados:

- **id**: Tipo `INT`, chave primária e auto-incremento.
- **nome**: Tipo `VARCHAR(100)`, pra armazenar o nome do cliente.
- **email**: Tipo `VARCHAR(100)`, para armazenar o e-mail do cliente.
- **data_nascimento**: Tipo `DATE`, pra armazenar a data de nascimento do cliente.

Isso totaliza 4 campos e 3 tipos de dados diferentes (`INT`, `VARCHAR`, `DATE`), conforme solicitado.

A tabela foi criada automaticamente ao acessar a página `ClientesPage.php`, e os dados podem ser inseridos e listados diretamente através da interface web.


###  Criação da Tabela `CLIENTES`

```sql
CREATE TABLE clientes (
  id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  nome VARCHAR(100),
  email VARCHAR(100),
  data_nascimento DATE
);
```

## Configurações Utilizadas

### Instância EC2

- **Tipo de Instância**: `t2.micro` (adequado para projetos pequenos e testes)
- **Sistema Operacional**: Amazon Linux 2023
- **Servidor Web**: Apache 2.4
- **PHP**: Versão 8.x

### Banco de Dados RDS

- **Engine**: MariaDB
- **Identificador do Banco**: `tutorial-db-instance2`
- **Usuário**: `tutorial_user`
- **Senha**: `tutorial_user`
- **Porta**: 3306
- **Nome do Banco de Dados**: `sample2`

## Passos para Configuração

### 1. Configurar a Instância EC2
- Criar uma instância EC2 com Amazon Linux 2023.
- Instalar o Apache, PHP e MariaDB com os comandos:
  ```bash
  sudo dnf update -y
  sudo dnf install -y httpd php php-mysqli mariadb105
  ```
- Iniciar o servidor Apache:
  ```bash
  sudo systemctl start httpd
  sudo systemctl enable httpd
  ```

### 2. Criar o Banco de Dados RDS
- Criar uma instância RDS com MariaDB utilizando o identificador `tutorial-db-instance2`.
- Configurar o banco de dados `sample2` e o usuário `tutorial_user` com as permissões necessárias.

### 3. Transferir os Arquivos PHP
- Fazer upload dos arquivos PHP (listados abaixo) para o diretório `/var/www/html/` da instância EC2.

### 4. Criar a Tabela `EMPLOYEES`
- A tabela `EMPLOYEES` é criada automaticamente ao acessar a página `SamplePage.php`, se ela ainda não existir.

### 5. Criar a Tabela `CLIENTES`
- A tabela `CLIENTES` é criada automaticamente ao acessar a página `ClientesPage.php`, se ela ainda não existir.

### 6. Testar a Aplicação
- Acesse as páginas `SamplePage.php` e `ClientesPage.php` no navegador para testar a inserção e listagem de dados.

## Funcionalidades

- O projeto oferece duas funcionalidades principais:
  - Inserção e listagem de funcionários na tabela `EMPLOYEES`.
  - Inserção e listagem de clientes na tabela `CLIENTES`.

## Vídeo Demonstrativo

Um vídeo demonstrativo foi criado para mostrar a execução e o deploy das máquinas/serviços no console da AWS, além de explicar o funcionamento da aplicação web integrada ao banco de dados MariaDB. O vídeo inclui uma visão geral da configuração da instância EC2 e da instância RDS, juntamente com a demonstração da inserção e listagem de dados nas tabelas `EMPLOYEES` e `CLIENTES`.

 Caso prefira, também é possível acessar o vídeo pelo google drive, clicando [AQUI](https://drive.google.com/file/d/1hvjgjzgzcI_HDr4CjQtoCZIcn9IniVTF/view?usp=sharing)

## Considerações Finais

&emsp;&emsp; Este projeto serviu como uma excelente base para praticar a criação de uma infraestrutura na nuvem utilizando serviços da AWS, como EC2 e RDS, em conjunto com uma aplicação web em PHP integrada a um banco de dados MariaDB. Implementei entao duas funcionalidades principais: o gerenciamento de funcionários, por meio da tabela EMPLOYEES (seguindo o tutorial), e o cadastro de clientes, por meio da tabela CLIENTES, que foi criada com quatro campos e três tipos de dados diferentes, atendendo aos requisitos da tarefa. O projeto oferece uma visão clara sobre como conectar e operar uma aplicação web em um ambiente de nuvem, abrindo possibilidades pra talvez, futuras expansões.
