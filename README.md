# Web Programming
### COMP6621036-WebProgramming-2402001636

## Aplikasi Rakit Computer

<br>

| Email | Password |
| ---- | --- |
| admin@binus.edu | admin@123 |
| user@binus.edu | user@123 |

<br>

```bash
$ docker run --rm --interactive --tty --volume "$PWD":/app composer create-project --prefer-dist laravel/laravel COMP6621036
$ cd COMP6621036/
$ docker run --rm --interactive --tty --volume "$PWD":/app composer require laravel/breeze --dev
$ docker run -v "$PWD":/usr/src/app -w /usr/src/app node npm --loglevel=info install
$ docker run -v "$PWD":/usr/src/app -w /usr/src/app node npm --loglevel=info run dev
```

<br>

```bash
$ docker network create mysql-net
$ docker run --network mysql-net --name mysql -e MYSQL_ROOT_PASSWORD=binus -e MYSQL_DATABASE=comp6621036 -e MYSQL_USER=binus -e MYSQL_PASSWORD=binus -p 3306:3306 -d mysql:latest

$ docker run --network mysql-net -it --rm mysql mysql -hmysql -ubinus -p

$ docker inspect mysql | grep IPAddress
```

<br>

```ini
DB_CONNECTION=mysql
DB_HOST=172.18.0.2
DB_PORT=3306
DB_DATABASE=comp6621036
DB_USERNAME=binus
DB_PASSWORD=binus
```

<br>

```bash
$ docker run --network mysql-net -it --rm -v "$PWD":/app -p 8000:8000 php bash
root@7873b13cc5c8:/# cd /app/
root@7873b13cc5c8:/app# docker-php-ext-install mysqli pdo pdo_mysql
root@7873b13cc5c8:/app# php artisan breeze:install
root@7873b13cc5c8:/app# php artisan make:model Kategori --migration
root@7873b13cc5c8:/app# php artisan make:model Part --controller --migration
root@7873b13cc5c8:/app# php artisan make:model Simulasi --controller --migration
root@7873b13cc5c8:/app# php artisan make:controller UserController
root@7873b13cc5c8:/app# php artisan make:migration alter_users_table
root@7873b13cc5c8:/app# php artisan migrate
root@7873b13cc5c8:/app# php artisan db:seed
root@7873b13cc5c8:/app# php artisan serve --host 0.0.0.0
```

<br>

```bash
$ heroku login
$ heroku git:remote -a <app>
$ git push heroku master
$ heroku config:set APP_NAME="Aplikasi Rakit Computer"
$ heroku config:set APP_KEY=<key>
$ heroku config:set DB_CONNECTION=mysql
$ heroku config:set DB_HOST=<host>
$ heroku config:set DB_PORT=<port>
$ heroku config:set DB_DATABASE=<database>
$ heroku config:set DB_USERNAME=<username>
$ heroku config:set DB_PASSWORD=<password>
$ heroku run php artisan migrate
$ heroku run php artisan db:seed
```
