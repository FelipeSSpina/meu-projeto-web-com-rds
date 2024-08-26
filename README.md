# Projeto de Integração com Banco de Dados na AWS

entao, aqui ta um projeto que fiz pra conectar uma aplicacao web com um banco de dados mysql no amazon rds. usei um servidor ec2 pra rodar o apache e php. basicamente insere e lista dados no banco, coisa simples mas funcional.

## Estrutura do Projeto

aqui estão os arquivos:

1. **index.php**: mostra as configs do php no servidor, nada muito especial.
2. **insert.php**: tem um form que insere dados no banco.
3. **list.php**: mostra os dados que foram inseridos, tipo uma lista.
4. **test_db.php**: só testa se a conexao com o banco de dados tá funcionando.

## Pré-requisitos

- tem que ter conta na aws, claro. 
- saber o basico de php, mysql e servidor web ajuda bastante.

## Configurações

### Instância EC2

- **Tipo de Instância**: `t2.micro`, porque é baratinha
- **Sistema Operacional**: amazon linux 2023
- **Servidor Web**: apache 2.4
- **PHP**: 8.3, porque a gente gosta de coisa nova

### Banco de Dados RDS

- **Banco**: mysql
- **Nome**: `meubanco2`
- **usuário**: `admin`
- **senha**: `vpcpadrao`

## Passos

1. **Subir Instância EC2**: segue o basico, configura a instancia, bota o apache e o php pra rodar.
2. **Criar o banco RDS**: só cria o banco no rds, faz as configs e libera as regras de segurança.
3. **Coloca os arquivos no servidor**: joga esses arquivos php na pasta `/var/www/html/`.
4. **Testar a conexão**: roda o `test_db.php` e vê se conecta no banco.
5. **Insere e visualiza dados**: usa o `insert.php` pra inserir uns dados e o `list.php` pra mostrar eles.

## Coisas legais

- o projeto funciona bem pra quem tá aprendendo a lidar com aws e quer ver o básico de ec2 e rds em acao.
- se quiser melhorar, da pra colocar mais validação nos formulários e outras funcionalidades.

enfim, taí o que consegui fazer. me avisa se achou algum bug ou se quiser sugerir algo legal!
