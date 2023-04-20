<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## Installation

After project is cloned from git repository you should follow these steps:

Enter project folder
```bash
cd project-folder
```
Install dependencies
```bash
composer install
```
Copy .env.example file to .env
```bash
cp .env.example .env
```
Generate application key by running
```bash
php artisan key:generate
```
After this open .env file and enter database credentials

Run migrations to create tables in your database by following command
```bash
php artisan migrate
```
Run passport:install to make oAuth2 clients
```bash
php artisan passport:install
```

If you want to setup testing envoirnment you should have .env.testing file, following command will copy your existing .env to .env.testing
```bash
cp .env .env.testing
```

Change content of .env.testing if you need to

To generate api documents run following command
```bash
php artisan l5-swagger:generate
```
docs will be available on /api/documentation

To run tests use
```bash
php artisan test
```

To serve your app use
```bash
php artisan serve
```

Also you can use docker container
```bash
php artisan sail:install

./vendor/bin/sail up
```

## Usage

Purpose of this project is to calculate popularity of a given word. App searches github issues for `{word}
rocks` as positive results and `{word} sucks` as negative results, then it calculates the `score` that can be in a range of 0-10 based on `positive/total` ratio. Our plan is to add more providers in the future.

You can use this service by entering following url:
```
api/v1/score?word=php
```
or
```
api/v2/score?word=php
```

Example of V1 results:
```json
{
  "id": 4,
  "word": "php",
  "provider": "github",
  "positive": 3278,
  "negative": 6165,
  "score": 3.47,
  "created_at": "2023-04-19T17:47:56.000000Z",
  "updated_at": "2023-04-19T17:47:56.000000Z"
}
```
Example of V2 results (JSONAPI compliant):
```json
{
  "data": {
    "type": "word",
    "id": "4",
    "attributes": {
      "id": 4,
      "word": "php",
      "provider": "github",
      "positive": 3278,
      "negative": 6165,
      "score": 3.47,
      "created_at": "2023-04-19T17:47:56.000000Z",
      "updated_at": "2023-04-19T17:47:56.000000Z"
    }
  }
}
```

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

You may also try the [Laravel Bootcamp](https://bootcamp.laravel.com), where you will be guided through building a modern Laravel application from scratch.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains over 2000 video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the Laravel [Patreon page](https://patreon.com/taylorotwell).

### Premium Partners

- **[Vehikl](https://vehikl.com/)**
- **[Tighten Co.](https://tighten.co)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Cubet Techno Labs](https://cubettech.com)**
- **[Cyber-Duck](https://cyber-duck.co.uk)**
- **[Many](https://www.many.co.uk)**
- **[Webdock, Fast VPS Hosting](https://www.webdock.io/en)**
- **[DevSquad](https://devsquad.com)**
- **[Curotec](https://www.curotec.com/services/technologies/laravel/)**
- **[OP.GG](https://op.gg)**
- **[WebReinvent](https://webreinvent.com/?utm_source=laravel&utm_medium=github&utm_campaign=patreon-sponsors)**
- **[Lendio](https://lendio.com)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
