<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## Install


- cp .env.example .env
- chmod 777 -R storage/
- cp eco_codes.csv locality.csv iban_2024.csv storage/
- composer install
- sail install
- npm install
- npm run build
- sail up -d
- sail artisan key:generate
- sail artisan migrate
- sail artisan jwt:seed
- sail artisan db:seed
- http://127.0.0.1:8030/api/app    -main page
- http://127.0.0.1:8030/api/auth   -authentification
- http://127.0.0.1:8030/api/admin  -admin panel
