# to run this project you should follow this steps:
## I. Front End 
- cd /front
- npm install
- npm run build


## II. Back End
- cd /back
- composer install
+ env configer
- create database name sfu_db
- change your database name in .env file : DB_DATABASE=sfu_db
- php artisan migrate:refresh
- php artisan db:seed
- php artisan serve
