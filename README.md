# Интрукция по развертыванию проекта

### выполнение начальной иницилизации и обновление composer

* если нужно инициализировать проект в PROD окружении
   ~~~shell
   make init-prod
   ~~~
* если нужно инициализировать проект в DEV окружении
   ~~~shell
   make init-dev
   ~~~

### создание пользователя и БД

~~~postgresql
create user spring with password 'spring';
create database servizoria owner spring;
~~~

### в файле common/config/mail-local.php: указать созданную БД имя пользователя и пароль

~~~php
'db' => [
            'class' => \yii\db\Connection::class,
            'dsn' => 'pgsql:dbname=servizoria;host=localhost;',
            'username' => 'spring',
            'password' => 'spring',
            'charset' => 'utf8',
        ],
~~~

### Далее применяем миграции

~~~shell
make yii-migrate
~~~

## запуск фронта

~~~shell
make serve-frontend
~~~

фронт запускается на порту 8083 и доступен по адресу http://localhost:8083/

## бэк админ панели

~~~shell
make serve-backend
~~~

бэк запускается на порту 8082 и доступен по адресу http://localhost:8082/
пользователь admin
пароль admin

### Используемые версии в проекте ПО и их зависимости:

* php - 8.2
* database - postgesql 15.5
* make - (BSD make || GNU make)