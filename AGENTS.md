# Negovid Accessories - Laravel E-Commerce Store

## Overview
A luxury Persian (RTL) e-commerce store built with Laravel 12, Livewire, and Tailwind CSS.

## Tech Stack
- **Backend:** Laravel 12 (PHP 8.3)
- **Frontend:** Blade templates + Tailwind CSS + Vite + Alpine.js
- **Database:** SQLite (default, can switch to MySQL)
- **Auth:** Laravel Breeze with admin middleware

## Running in Base44 Sandbox
```bash
docker compose -f docker-compose.base44.yml up -d --build
```
- App serves on port 3000
- PHP artisan serve (no Vite HMR in sandbox; assets are built with `npm run build`)
- PHP code changes are live (no restart needed); frontend asset changes require `npm run build` then `reload_preview`
- SQLite database stored in `database/database.sqlite`

## Admin Panel
- Access at `/admin/store/dashboard` (requires auth + admin role)
- Admin login at `/admin/login`
- Create an admin user via `php artisan tinker`: `User::create(['name'=>'admin','email'=>'admin@negovid.test','password'=>bcrypt('password'),'role'=>'admin'])`

## Key Routes
- `/` - Store homepage
- `/shop` - Product listing with filters
- `/product/{slug}` - Product detail
- `/cart` - Shopping cart
- `/checkout` - Order checkout
- `/order/{code}` - Order confirmation
- `/track-order` - Order tracking
- `/about` - About page
- `/contact` - Contact page
- `/admin/store/*` - Admin panel

## Database Migrations & Seeding
```bash
php artisan migrate --force
php artisan db:seed --force --class=NegovidStoreSeeder
```
The seeder creates 4 categories and 16 sample products (marked as sample data).

## Design System
- Colors: Cream (#FDFBF7), Sand (#F5F0E6), Gold (#C5A059), Espresso (#2A2723), Bronze (#6D675E)
- Font: Vazirmatn (Google Fonts)
- RTL layout, Persian numerals for prices
- Helper: `persian_number()` and `persian_price()` in app/Helpers/negovid_helpers.php
