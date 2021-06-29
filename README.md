# projeto02AplicaçõesDistribuídas
Repositório do projeto02 da materia de Aplicações Distribuídas -ADS - 2021 

* **[API do  projeto P2](https://github.com/pedro-ibs/projeto02AplicacoesDistribuidas/tree/main/apiAcervo) - CRUD em REST**
    * Contem as entidades:
        * Pessoa
        * Livro
        * Categoria


* **[Web do  projeto P2](https://github.com/pedro-ibs/projeto02AplicacoesDistribuidas/tree/main/web) - Codeigniter e bootstrap**


## **Criando o .gitignore**
Para que a configuração de cada ambiente não de erro é importante criar um arquivo [.gitignore](https://github.com/pedro-ibs/projeto02AplicacoesDistribuidas/blob/main/.gitignore) na raiz do repositório, nele deve conter as seguintes configurações:

```
/apiAcervo/metadata/
./apiAcervo/metadata/

/apiAcervo/pom.xml
./apiAcervo/pom.xml

/apiAcervo/src/main/resources/application.properties
./apiAcervo/src/main/resources/application.properties

/web/application/config/config.php
./web/application/config/config.php

```  



## **Iniciando o Sistema Corretamente**

 * Caso esteja usando linux com o lamp siga os seguintes passos:
```
cd /opt/lampp/
sudo chown seuUser htdocs/*
cd /opt/lampp/htdocs/
ln -s ~/CaminhdoDoRepo/AulasAplicacoesDistribuidas/projeto02AplicacoesDistribuidas/web/ Acervo
sudo /CaminhdoDoRepo/AulasAplicacoesDistribuidas/runLappLinux.sh
```
 * Configure o o parâmetros [$config['base_url'] em web/application/config/config.php](https://github.com/pedro-ibs/projeto02AplicacoesDistribuidas/blob/main/web/application/config/config.php) de acordo com o seu ambiente 

 * Configure o acesso da api ao banco de dados em [application.properties](https://github.com/pedro-ibs/projeto02AplicacoesDistribuidas/blob/main/apiAcervo/src/main/resources/application.properties) e [pom.xml](https://github.com/pedro-ibs/projeto02AplicacoesDistribuidas/blob/main/apiAcervo/pom.xml)


 * Inicie a parte web pelo xampp (caso use outro inicie a web por lá). É preciso ter a Base de dados  do banco chamada **rest_spring_boot_ifsp**, ao executar a api ela criará as tabelas suas restrições, e irá popular as tabelas de acordo com [migration](https://github.com/pedro-ibs/AulasAplicacoesDistribuidas/tree/main/aula09_atv1/src/main/resources/db/migration) da api. Caso alguma configuração do SQL seja alterado em uma das tabelas na api é preciso apagar a tabela em questão ou alterar diretamente no banco de dados.

 * Inicie a api pelo Eclipse ou Maven