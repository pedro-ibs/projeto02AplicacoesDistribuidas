# projeto02AplicaçõesDistribuídas
Repositório do projeto02 da materia de Aplicações Distribuídas -ADS - 2021 

* **[API do  projeto P2](https://github.com/pedro-ibs/projeto02AplicacoesDistribuidas/tree/main/apiAcervo) - CRUD em REST**
    * Contem as entidades:
        * Pessoa
        * Livro
        * Categoria


* **[Web do  projeto P2](https://github.com/pedro-ibs/projeto02AplicacoesDistribuidas/tree/main/web) - Codeigniter e bootstrap**
* **[Repo original da Web do  projeto P2](https://github.com/BuriedBullet/Acervo) - Codeigniter e bootstrap**


## **Configurando Acesso Banco de Dados pela API**

acesse o arquivo [application.properties](https://github.com/pedro-ibs/projeto02AplicacoesDistribuidas/blob/main/apiAcervo/src/main/resources/application.properties) e descomete a sua configuração ou
adicione outra **não esqueça de comentar as configurações dos outros**.



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

 * Configure o acesso do banco de dados em [application.properties](https://github.com/pedro-ibs/projeto02AplicacoesDistribuidas/blob/main/apiAcervo/src/main/resources/application.properties)


 * Inicie a parte web pelo xampp (caso use outro inicie a web por lá). É preciso ter a Base de dados  do banco chamada **rest_spring_boot_ifsp**, ao executar a api ela criará as tabelas suas restrições. Caso alguma configuração do SQL seja alterado em uma das tabelas na api é preciso apagar a tabela em questão ou alterar diretamente no banco de dados.

 * Inicie a api pelo Eclipse

# Banco de dados
 * apague a tabela book e category.
 * importe dados usando o  arquivo [livros.sql](https://github.com/pedro-ibs/projeto02AplicacoesDistribuidas/blob/main/livros.sql)