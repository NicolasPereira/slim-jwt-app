## Slim JWT App

Essa aplicação tem como foco o aprendizado do Framework Slim e também a utilização de JWT.

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