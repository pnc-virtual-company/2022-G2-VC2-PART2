# 2022-G2-VC2-PART2

# 📌 I. Front End 
### ✅ Step 1: Install Dependency Packages
- [x] cd /front
>  npm install **or** npm i 
### ✅ Step 2: Update Environment Variables
- [x] Update env.production and env.development with IP Address of your Backend server

#### ⛔ for developement file:
```
VUE_APP_MODE=development
VUE_APP_API_URL=http://localhost:8000/api
```
### ✅ Step 3: Running Application
- [x] If you are in the development environment (Compiles and hot-reloads for development)
> npm run serve  (Normal Vue JS)
  
📍 Normal Vue JS:
> npm run build 

📍📍📍 after build
  
> npm install --global serve 

>  serve -s dist 


# 📌 II. Backend 
### ✅ Step 1: Install the Packages
- [x] cd /back
>  composer install **or** composer i 
>  composer require maatwebsite/excel

### ✅ Step 2: Update the Environment Variables
- [x] copy **.env.example**  file **to** the **.env**  file
```
APP_TIMEZONE=your time zone Example: 'Asia/Phnom_Penh'
MAIL_DRIVER=smtp
MAIL_HOST=smtp.gmail.com
MAIL_PORT=587
MAIL_USERNAME=Your app email
MAIL_PASSWORD=your application code generate
MAIL_ENCRYPTION=tls
DB_DATABASE= YOUR_DB_NAME  ✏️
DB_USERNAME= YOUR_DB_USERNAME ✏️
DB_PASSWORD= YOUR_DB_PASSWORD ✏️
```
### ✅ Step 3: Generate Application Key
>  php artisan key:generate 

### ✅ Step 4: Excel importation configuration
- if you use XAMPP you need to configuration for excel importation
  + windows + E
  + go to drive C
  + XAMPP folder
  + inside that go to php folder
  + and you will see php.ini file or php file
  + open with notepad or other
  + find word ";extension=gd" and change to "extension=gd"
  
### ✅ Step 5: Migrate migrateion table to database
>  php artisan migrate or migrate:refresh

### ✅ Step 6: Migrate default admin user to database with seeder
>  php artisan db:seed 

### ✅ Step 7: Running Application
- [x] If you are in local development environments
>  php artisan serve  --port=YOUR_PORT (port is optional) 

