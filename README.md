

# Projeto de Integração com Banco de Dados na AWS

Este projeto demonstra como configurar uma aplicação web simples integrada com um banco de dados MySQL utilizando o Amazon RDS. A aplicação é executada em uma instância EC2 que roda Apache e PHP, permitindo inserir e listar dados do banco de dados de forma funcional e direta..

## Estrutura do Projeto

Os arquivos principais do projeto são:

1. **index.php**: Página inicial que exibe as configurações do PHP no servidor.
2. **insert.php**: Formulário que insere dados no banco de dados.
3. **list.php**: Exibe os dados armazenados no banco de dados.
4. **test_db.php**: Testa a conexão com o banco de dados para garantir que está funcionando corretamente.

## Pré-requisitos

- Uma conta na AWS.
- Conhecimento básico de PHP, MySQL e configuração de servidores web.

## Configurações Utilizadas

### Instância EC2

- **Tipo de Instância**: `t2.micro` (adequado para projetos pequenos e testes)
- **Sistema Operacional**: Amazon Linux 2023
- **Servidor Web**: Apache 2.4
- **PHP**: Versão 8.3

### Banco de Dados RDS

- **Engine**: MySQL
- **Identificador do Banco**: `meubanco2`
- **Usuário**: `admin`
- **Senha**: `vpcpadrao`
- **Porta**: 3306

## Passos para Configuração

1. **Configurar a Instância EC2**: Instale e configure o Apache e o PHP na instância EC2.
2. **Criar o Banco de Dados RDS**: Configure o banco de dados no RDS com as permissões e regras de segurança apropriadas.
3. **Transferir os Arquivos PHP**: Faça upload dos arquivos para o diretório `/var/www/html/` da instância EC2.
4. **Testar a Conexão**: Use o arquivo `test_db.php` para garantir que a conexão com o banco de dados foi bem-sucedida.
5. **Inserir e Listar Dados**: Utilize `insert.php` para inserir novos registros e `list.php` para exibi-los.

## Funcionalidades

- O projeto oferece uma aplicação simples que permite a inserção e listagem de dados em um banco MySQL na nuvem usando o Amazon RDS.
- É uma boa base para quem está começando com AWS e quer aprender a integrar serviços da nuvem, como EC2 e RDS.

## Considerações Finais

Este projeto é ideal para praticar a criação de infraestruturas na AWS e entender como a integração entre EC2 e RDS funciona na prática. Há espaço para melhorias, como adicionar validação de dados no formulário ou implementar autenticação.

Qualquer dúvida ou sugestão, PODE E DEVE entrar em contato, pra me ajudar aevoluir.!
