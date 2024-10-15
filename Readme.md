# Libray Mangment System

## Introduction 

**A website for creating a system to manage a Library .**
There two kinds of users admin and student . In these website you can view all books you can borrow an avaliable books to borrow and update your profile  as user, in additon admin can view dashboard for all students and books ,can only view student profiles , promote them to be an admin or demote them and can apply CRUD system on books .


[Project Video Overview](https://drive.google.com/file/d/1RwMna3FhNnOPB8PGZOzX5pDWIyUCjzeu/view?usp=sharing)
## Installtion

1. clone this repository
```bash
    git clone https://github.com/KhaledMahmoudSaeed/ITI.git
```
2. Navigate to the project directory 
3. Install dependencies
``` bash
  npm install 
 npm run build
```
4. Insatll composer
```bash
composer install
```
5. copy the .env.example to new file .evn  
   if you use windows run this
```bash
   copy .env.example .env
```
   else
```bash
   cp .env.example .env
```
6. Generate encrytion key 
```bash
    php artisan key:generate
```
7. Edit database configration in .env to your database
8. add this in vite.config.js to ensure that your Vite configuration file (usually vite.config.js or vite.config.ts) specifies the correct entry points
```php
   build: {
        rollupOptions: {
            input: [
                "resources/sass/app.scss",
                "resources/js/app.js",
                // No wildcard for images
            ],
        },
    },
```

## Usage
1. Clear the congif cach 
```bash
    php artisan config:cache
```
2. run this command 
```bash
    php artisan storage:link
 ```
3. Navigate to the directory which you clone the project 
4. Run the server
 ```bash
    php artisan serve
  ```
5. Build the project 
```bash
    npm run build 
 ```

#### Be default all 15 users have a default image by name Capture.PNG

