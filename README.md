# Blog Noticiero

## Requirements:

- php 8.1
- composer

## Before Installation

Copy and paste `.env.example` after filling the database, fill this

```conf
API_NEWS_KEY=xxxxxxxxxxxxxxxxxxxxxxxxx
API_NEWS=https://newsapi.org/v2/top-headlines
API_RANDOM_USER=https://randomuser.me/api
```

## Installation

```console
unknown@unknown$ composer install
unknown@unknown$ php artisan key:generate
unknown@unknown$ php artisan migrate:fresh --seed
unknown@unknown$ php artisan app:fill-database
unknown@unknown$ php artisan serve
```
