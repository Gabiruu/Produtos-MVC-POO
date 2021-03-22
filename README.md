<p align="center">
  <a href="">
    <img src="https://github.com/Gabiruu/Produtos-MVC-POO/blob/master/img/banner.JPG" height="150" width="200" alt="Produtos POO MVC" />
  </a>
</p>

<p align="center">Projeto feito em PHP explorando os conceitos de MVC E POO</p>

#

<div align="center">

![Badge](https://img.shields.io/badge/php-7.2.34-blue)
![GitHub top language](https://img.shields.io/github/languages/top/gabiruu/produtos-mvc-poo)
![GitHub repo size](https://img.shields.io/github/repo-size/gabiruu/Produtos-MVC-POO)
![GitHub last commit](https://img.shields.io/github/last-commit/gabiruu/Produtos-MVC-POO)
![GitHub](https://img.shields.io/github/license/gabiruu/Produtos-MVC-POO)

#

</div>

# Tabela de conteúdos

<!--ts-->

-   [Descrição](#Descrição)
-   [Features](#Features)
-   [Pré-requisitos](#Pré-requisitos)
-   [Como usar](#como-usar)
    -   [Pre Requisitos](#pre-requisitos)
    -   [PHP](##PHP)
    -   [Mysql](##Mysql)
-   [Tecnologias](#tecnologias)
<!--te-->

# Descrição

Este projeto tem o intuito de colocar em praticas alguns conhecimentos em PHP usando o paradigma POO, principalmente em modelagem MVC e manipulação de banco de dados mysql. O foco foi totalnte no BACK-END, deixando a implementação mais simples e genérica possivel do FRONT-END para o re-uso do
BACK-END em projetos futuros de FRONT-END.

# Features

-   [x] Criando arquivo [Aplication.php](https://github.com/Gabiruu/Produtos-MVC-POO/blob/master/lib/Application.php) responsável
        por criar e administrar as requisições POST e GET

-   [x] Administrando load de todas as lib's
-   [x] Criando classe de responsável pela conexão com o banco de dados [db_class.php](https://github.com/Gabiruu/Produtos-MVC-POO/blob/master/lib/db_Class.php)
-   [x] CRUD de Cores
-   [x] CRUD de Categoria
-   [x] CRUD de Produtos
-   [x] Tratando os erros mais comuns do banco de dados

# Pré-requisitos

Cerifique-se de ter um servidor PHP e um servidor Mysql instalado em sua maquina. no meu caso eu usei o [XAMPP](https://www.apachefriends.org/pt_br/index.html) ele é um dos ambientes de desenvolvimento mais populares para PHP, gratuito e é o suficiente para o nosso projeto.

E, não podemos esquecer de ter um bom editor para trabalhar com o código, no meu caso eu usei o [VSCode](https://code.visualstudio.com/)

# Como usar

## PHP

Clone ou baixe o projeto Certifique-se que ele está na na pasta raiz do seu servidor PHP, Como eu usei [XAMPP](https://www.apachefriends.org/pt_br/index.html) o processo é esse:

Coloque os arquivos PHP na pasta “htdocs” dentro da pasta “XAMMP” na unidade "C:" O caminho do arquivo é “C:\xampp\htdocs”. Abra um navegador e digite “localhost”. O navegador abrirá uma lista dos arquivos armazenados na pasta “htdocs” do seu computador. Clique no link referente ao nosso projeto (Produtos-MVC-POO). estamos quase lá.

## Mysql

No seu servidor Mysql execute o seguinte [script](https://github.com/Gabiruu/Produtos-MVC-POO/blob/master/databases/scriptBancoDados.txt) esse script é responsável por criar o nosso banco de dados.

Não esqueça de alterar a senha e login de acesso ao banco no arquivo [db_class.php](https://github.com/Gabiruu/Produtos-MVC-POO/blob/master/lib/db_Class.php)

## Essas são as tabelas do projeto

<p align="center">
  <a href="">
    <img src="https://github.com/Gabiruu/Produtos-MVC-POO/blob/master/databases/ProjPiscinas_BD_SCHEMA.JPG" height="250" width="100%" alt="Produtos POO MVC" />
  </a>
</p>

Com essas instruções feitas com sucesso, Podemos então começar o uso do projeto.

# TECNOLOGIAS

-   [PHP](www.php.net)
-   [Mysql](https://www.mysql.com/)
-   SERVIDOR APACHE - Exemplo [XAMPP](https://www.apachefriends.org/pt_br/index.html)

# AUTOR

<a href="https://github.com/Gabiruu">
 <img style="border-radius: 50%;" src="https://avatars3.githubusercontent.com/u/38928677?s=460&u=61b426b901b8fe02e12019b1fdb67bf0072d4f00&v=4" width="100px;" alt=""/>
</a>

🛠️ Feito por <a href="https://github.com/Gabiruu/" alt="">Gabriel Alves Reis</a>

📬 Entre em contato!

[![Twitter Badge](https://img.shields.io/badge/-@Gabirutts-1ca0f1?style=flat-square&labelColor=1ca0f1&logo=twitter&logoColor=white&link=https://twitter.com/Gabirutts)](https://twitter.com/Gabirutts)
[![Linkedin Badge](https://img.shields.io/badge/-Gabriel-blue?style=flat-square&logo=Linkedin&logoColor=white&link=https://www.linkedin.com/in/gabriel-alves-846b92164/)](https://www.linkedin.com/in/gabriel-alves-846b92164/)
[![Gmail Badge](https://img.shields.io/badge/-gaalvesreis@gmail.com-c14438?style=flat-square&logo=Gmail&logoColor=white&link=mailto:gaalvesreis@gmail.com)](mailto:gaalvesreis@gmail.com)
