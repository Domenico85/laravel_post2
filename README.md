<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

# Laravel Posts Management System

## **Overview**

This is a Laravel-based application that allows users to create, edit, and delete posts. It includes authentication via Laravel Fortify and ensures that only the creator of a post can modify or delete it.

## **Features**

-   **User Authentication** (Login, Logout, Profile Management)
-   **Post Management** (Create, Read, Update, Delete)
-   **Authorization Middleware** to restrict updates and deletions to the post owner
-   **Database Migrations** for Posts and Profiles

## **Installation**

### **1. Clone the Repository**

```sh
git clone <repository_url>
cd <repository_folder>
```

### **2. Install Dependencies**

```sh
composer install
npm install
```

### **3. Configure Environment**

-   Duplicate `.env.example` and rename it to `.env`
-   Generate application key:
    ```sh
    php artisan key:generate
    ```
-   Set up database connection inside `.env` file

### **4. Run Migrations**

```sh
php artisan migrate
```

### **5. Start the Development Server**

```sh
php artisan serve
```

## **Routes**

### **Public Routes**

-   **Homepage**: `GET /`
-   **View All Posts**: `GET /posts/index`
-   **View Single Post**: `GET /posts/show/{post}`

### **Protected Routes (Require Authentication)**

-   **Create Post**: `GET /post/create` & `POST /post/store`
-   **Update Post**: `PUT /post/update/{post}` _(Restricted to post owner)_
-   **Delete Post**: `DELETE /post/delete/{post}` _(Restricted to post owner)_
-   **Profile Management**:
    -   `GET /profile` (View Profile)
    -   `GET /profile/edit` (Edit Profile)
    -   `PUT /profile/update` (Update Profile)

## **Database Schema**

### **Posts Table**

-   `id` (Primary Key)
-   `title` (String)
-   `description` (Text)
-   `user_id` (Foreign Key referencing `users` table)
-   `timestamps`

### **Profiles Table**

-   `id` (Primary Key)
-   `user_id` (Foreign Key referencing `users` table, cascades on delete)
-   `address` (String, nullable)
-   `phone` (String, nullable)
-   `avatar` (String, nullable)
-   `timestamps`

## **Technologies Used**

-   **Laravel** (Framework)
-   **Laravel Fortify** (Authentication)
-   **MySQL** (Database)
-   **Blade** (Templating Engine)
-   **Bootstrap** (Frontend UI)

## **License**

This project is open-source and available under the [MIT License](LICENSE).

Produced by **Domenico Ciardullo**
