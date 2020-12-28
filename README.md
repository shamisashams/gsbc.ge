# gsbc
Install the dependencies.

```sh
$ cd gsbc
$ composer install
$ npm install
```


### For run migrations...


create .env file by .env.example


```sh

$ php artisan migrate

$ php artisan db:seed --class="LocalizationSeeder"

$ php artisan db:seed --class="HomePageSeeder"

```

# Run Application
```sh
$ php artisan serve
```


