# SimpleWall - <img src="http://logonoid.com/images/laravel-logo.png" width="35"> Laravel

Este projeto para estudo consiste em um mural de notícias onde o admin faz a postagem e essas são direcionadas conforme filtros de cargo e operação disponíveis na hora de fazer a postagem e os usuários só conseguem ver as postagens ferentes a seu cargo e operação ou mensagens para todos. 

Utiliza [Laravel](https://laravel.com/) como framework.

Versão Laravel utilizada: 7.30.6.

- Banco de dados Sqlite.
- Bootstrap.
- AdminLTE
- Javascript.

# Instalação

```
composer install

php artisan key:generate
```

Para criar as tabelas no bando de dados:
```
php artisan migrate
```

Para popular o banco com o usuário admin:
```
php artisan db:seed
```

O seed criará o usuário admin:

| name | cpf | email | password | role | operation |
| ---- | ----- |----- | -------- | ---- | ---- |
| Admin | 111.111.111-11 | admin@admin.com | 123 | todos | todos |



> Em progresso...
- Em processo de aperfeiçoamento das funções.

Este projeto utiliza a [licença MIT](https://opensource.org/licenses/MIT).