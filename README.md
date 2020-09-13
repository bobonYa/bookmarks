# Сохрание ссылок

### Возможности
- При добавление ссылки проверяет доступность, и при наличии парсит title, meta-description, meta-keywords, ссылку на favicon(используемая библиотека php-html-parser)
- Есть возможность задать пароль при добавлении ссылки, что бы в дальнейшем была возможность ее удалить. Если пароль не задан, возможности удалить ссылку нет
- Возможность сортировки с пагинацией столбцов Data, Url, Title(используемая библиотека Datatables, подгрузка происходит с помошью ajax -- выбранное количество строк + выбранная сортировка)
- Возможность выгрузки данных в xlsx

### Усановка

```sh
$ git clone https://github.com/bobonYa/bookmarks.git
$ cd bookmarks
```


### Настройка

```sh
$ cp .env.example .env
```
Далее прописываем настройки базы данных(я использовал Postgress)
```sh
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=[ИМЯ БАЗЫ]
DB_USERNAME=[ИМЯ ПОЛЬЗОВАТЕЛЯ]
DB_PASSWORD=[ПАРОЛЬ]
```
Далее устанавливаем пакеты

```sh
$ composer install
```

Генерируем ключ и делаем миграцию
```sh
$ php artisan key:generate
$ php artisan migrate
```
Устанавливаем front пакеты
```sh
$ npm install && npm run dev
```
