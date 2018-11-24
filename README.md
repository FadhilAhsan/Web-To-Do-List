# Web-To-Do-List

This website todo list simple use Laravel 5.5 with database MySQL

# Setup 

1. `git clone https://github.com/FadhilAhsan/Web-To-Do-List.git`
2. Setup your fideloper/proxy version on `comperser.json` depands your Laravel version. if you have trouble, see on this [GitHub Pages](https://github.com/fideloper/TrustedProxy) or [This Link](https://github.com/fideloper/TrustedProxy)
3. `composer install`
4. `composer update`
5. Create your `.env`  with `cp .env.example .env`
6. Generate your APP_KEY with `php artisan key:generate`
7. Open `.env` insert your DB_HOST, DB_PORT, DB_DATABASE, DB_USERNAME and DB_PASSWORD then save.
8. Create Database in MySQL with name `Web_To_Do_List`
8. `php artisan migrate`
9. `php artisan serve` 





