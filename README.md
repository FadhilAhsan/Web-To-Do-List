# Web-To-Do-List

This website todo list simple use Laravel 5.5 with database MySQL

# Setup 

1. `git clone https://github.com/FadhilAhsan/Web-To-Do-List.git`
2. setup your fideloper/proxy version on `comperser.json` depands your Laravel version. if you have trouble, see on this [GitHub Pages](https://github.com/fideloper/TrustedProxy) or [This Link](https://github.com/fideloper/TrustedProxy)
3. `composer install`
4. `composer update`
5. create your `.env`  with `cp .env.example .env`
6. `php artisan key:generate`
7. open `.env` insert your DB_CONNECTION, DB_HOST, DB_PORT, DB_DATABASE, DB_USERNAME and DB_PASSWORD.
8. `php artisan migrate`
9. `php artisan serve` 





