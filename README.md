## Slim JWT App

Essa aplicação tem como foco o aprendizado do Framework Slim e também a utilização de JWT.

## To Do
Essas são as atividades necessárias para cumprir o desafio

[x] Criar ambiente docker

[x] Criar estrutura básica do projeto

[x] Definir uma arquitetura limpa para o projeto, divisão por dominio, services e repositórios

[x] Fazer a configuração do Doctrine

[x] Utilizar práticas de SOLID

[x] Implementar sistema de criação de usuário com criptografia de Senha

[x] Implementar autenticação de usuário com JWT

[ ] Criar Middleware para autenticação de rotas

[ ] Criar Estrutura de Response para o Projeto

[ ] Criar Estrutura de Request Validator para o Projeto 

[ ] Adicionar PHPStan ou outro Linter

[ ] Realizar testes unitários com PHP Unit

[ ] Instalar xDebug para medir coverage da aplicação 

[ ] Conseguir 100% de coverage

[ ] Implementar Prometheus para Métricas

[ ] Implementar Jaeger para Trace

[ ] Implementar alguma ferramenta de log

[ ] Implementar Grafana

[ ] (Opcional) - Sincronizar projeto com SonarQube

[ ] Deploy no heroku ou AWS ou Azure. 

[ ] Estudar sobre CI/CD 

### Como rodar a Aplicação

A aplicação está configurada com docker e um servidor NGIX.

```shell
docker-compose up -d -build
```
### Instalando dependencias
Para instalar as dependencias basta acessar o container de PHP
```shell
docker-compose exec php bash
```

E rodar o seguinte comando
```shell
php composer install
```

### Subir aplicação outras vezes
Após ter realziado build do `docker-compose.yml`, basta apenas rodar o comando abaixo nas próximas vezes

```shell
docker-compose up -d
```

Para parar a aplicação rode o comando abaixo:
```shell
docker-compose down
```

### Rotas
A aplicação roda localmente em `localhost:8080`

Para ter informações sobre PHP acesse, `localhost:8080/info`