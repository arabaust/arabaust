#How to install Franchise from the GIT

- Clone the project
- checkout intended branch
- duplicate the `.env.example` and rename it to `.env`
- Edit the `.env` file according to required settings (db..etc)
- in the CLI, type `composer install`
- in the CLI, type `composer update`
- in the CLI, type `php artisan key:generate`
- if in development, type `npm install`
- then type `php artisan migrate --seed`
⋅⋅* When you need to add data to a predefined table, create a new seeder by typing `php artisan make:seed NewRoleSeeder` and send it to the database using `php artisan db:seed --class=NewRoleSeeder`

#How To update Franchise
--* in the cli type `composer dump-autoload`
--* in the cli type `php artisan migrate:refresh --seed`

- default username: `master.admin` password: `123456`