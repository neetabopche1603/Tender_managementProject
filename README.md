Download This Project.
Install Composer.
Open terminal and type composer update or composer upgrade.
copy .env.example and rename .env
Generate App Key php artisan key:generate
Create Database and name change .env file.
open terminal and type php artisan migrate.
open terminal and type php artisan db:seed --class=AdminSeeder
Then run the project.
Admin Panel Login Details URL : http://127.0.0.1:8000 (username : admin@gmail.com password : 12345678)
User Panel Login Details URL : http://127.0.0.1:8000/user (Admin Registered Users)