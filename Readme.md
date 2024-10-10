# Libray Mangment System

## Introduction 

**A website for creating a system to manage a Library .**
There two kinds of users admin and student . In these website you can view all books you can borrow an avaliable books to borrow and update your profile  as user, in additon admin can view dashboard for all students and books ,can only view student profiles , promote them to be an admin or demote them and can apply CRUD system on books .


[Project Video Overview](https://drive.google.com/file/d/1RwMna3FhNnOPB8PGZOzX5pDWIyUCjzeu/view?usp=sharing)
## Installtion

1. clone this repository
   ``` git clone https://github.com/KhaledMahmoudSaeed/ITI.git```
1. Navigate to the project directory 
1. Install dependencies
 ``` npm install ``` ```npm run build```

1. Insatll composer ```composer install```
1. copy the .env.example to new file .evn  
   if you use windows run this```copy .env.example .env```
   else```cp .env.example .env```
1. Generate encrytion key ```php artisan key:generate```
1. Edit database configration in .env to your database
1. add this in vite.config.js to ensure that your Vite configuration file (usually vite.config.js or vite.config.ts) specifies the correct entry points
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
1. Clear the congif cach ```php artisan config:cache```
1. run this command ```php artisan storage:link```
1. Navigate to the directory which you clone the project 
1. Run the server ``` php artisan serve```
1. Build the project ``` npm run build ```

#### Be default all 15 users have a default image by name Capture.PNG

