# API com Autenticação JWT

## A ideia

A ideia é criar uma API com autenticação JWT, onde o usuário se autentica e recebe um token de acesso, que será utilizado
para acessar os recursos da API.

## Rotas

### Rotas API
| Método HTTP | Endpoint          | Descrição                                                              |
|-------------|-------------------|------------------------------------------------------------------------|
| POST        | `/api/register`   | Rota para o usuário se cadastrar                                       |
| POST        | `/api/login`      | Rota para o usuário fazer login e receber seu token                    |
| GET         | `/api/users`      | Rota onde o usuário autenticado pode buscar todos usuários cadastrados |
| GET         | `/api/users/{id}` | Rota onde o usuário autenticado pode buscar um usuário específico      |

## A instalação do projeto

Para instalar a aplicação, utilize os passos abaixo:

```
# clone o projeto
$ git clone git@github.com:thalesmengue/liberfly-api.git

# entre na pasta do projeto

# copie o arquivo .env.example para .env
$ cp .env.example .env

# instale as dependências
$ composer install

# inserir as credenciais do banco de dados no arquivo .env

# gerar a chave da aplicação
$ php artisan key:generate

# rodar as migrations
$ php artisan migrate

# gerar o secret do pacote jwt
$ php artisan jwt:secret

# rode o seed de dados
$ php artisan db:seed

# gere o asset do pacote Swagger
$ php artisan l5-swagger:generate

# rodar a aplicação
$ php artisan serve
```

Após rodar o seeder, vai ser criado um usuário para teste com as seguintes credenciais:
```
email: test@example.com
senha: password
```

## Swagger

Bom, conforme solicitado, utilizado o Swagger para utilizar as rotas da API, para ser mais específico, utilizado um pacote adaptado
do swagger para o Laravel, assim, pode ser acessada a documentação da API na URL: `http://127.0.0.1:8000/api/documentation`

## Tecnologias

- [Laravel](https://laravel.com/)
- [PHP 8.1](https://www.php.net/)
- [Swagger Laravel Package](https://github.com/DarkaOnLine/L5-Swagger)
