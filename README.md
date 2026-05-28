# Blog — Laravel + Tailwind CSS + PostgreSQL

A minimalist blog website with a clean admin panel. Built with Laravel 11, Tailwind CSS, and PostgreSQL.

---

## Features

- **Public Blog** — Lists all published posts with cover images, excerpts, and dates
- **Individual Posts** — Full-page post view with rich HTML content
- **Custom Pages** — Create static pages (About, Contact, etc.) shown in the nav
- **Admin Panel** — Secure login-protected admin at `/admin`
  - Create, edit, and delete blog posts
  - Upload cover images per post
  - Draft / Publish toggle
  - Create, edit, and delete pages
  - Upload hero images per page
  - Toggle pages in the navigation bar
- **Image Uploads** — Cover images for posts, hero images for pages

---

## Requirements

- PHP 8.2+
- Composer
- Node.js 18+ & npm
- PostgreSQL 14+

---

## Setup

### 1. Install PHP dependencies

```bash
composer install
```

### 2. Install Node dependencies & build assets

```bash
npm install
npm run build
```

### 3. Configure environment

```bash
cp .env.example .env
php artisan key:generate
```

Edit `.env` and set your database credentials:

```env
APP_NAME="My Blog"
APP_URL=http://localhost:8000

DB_CONNECTION=pgsql
DB_HOST=127.0.0.1
DB_PORT=5432
DB_DATABASE=blog
DB_USERNAME=postgres
DB_PASSWORD=your_password
```

### 4. Create the PostgreSQL database

```bash
psql -U postgres -c "CREATE DATABASE blog;"
```

### 5. Run migrations and seed sample data

```bash
php artisan migrate --seed
```

This creates:
- An admin user: **admin@blog.com** / **password**
- 2 sample pages (About, Contact)
- 2 published posts + 1 draft

### 6. Create storage symlink

```bash
php artisan storage:link
```

### 7. Start the development server

```bash
php artisan serve
```

Visit **http://localhost:8000** for the blog.
Visit **http://localhost:8000/admin** for the admin panel.

---

## Admin Credentials (after seeding)

| Field    | Value           |
|----------|-----------------|
| Email    | admin@blog.com  |
| Password | password        |

> Change these immediately after setup via tinker:
> ```bash
> php artisan tinker
> >>> App\Models\User::first()->update(['password' => bcrypt('your-new-password')]);
> ```

---

## Project Structure

```
app/
  Http/Controllers/
    Admin/
      AuthController.php       ← Login / logout
      DashboardController.php  ← Admin home stats
      PostController.php       ← CRUD for posts
      PageAdminController.php  ← CRUD for pages
    BlogController.php         ← Public blog listing & post view
    PageController.php         ← Public page view
  Models/
    User.php
    Post.php
    Page.php

database/
  migrations/                  ← users, posts, pages, sessions tables
  seeders/
    DatabaseSeeder.php         ← Admin user + sample content

resources/
  views/
    layouts/app.blade.php      ← Public layout
    admin/
      layouts/app.blade.php   ← Admin layout with sidebar
      auth/login.blade.php
      dashboard.blade.php
      posts/                   ← index, create, edit, _form
      pages/                   ← index, create, edit, _form
    blog/
      index.blade.php          ← Public post listing
      show.blade.php           ← Single post view
    pages/
      show.blade.php           ← Public page view

routes/
  web.php                      ← All routes (public + admin)
```

---

## Development (hot reload)

For local development with Vite hot reload:

```bash
npm run dev
```

Then in another terminal:

```bash
php artisan serve
```

---

## Deployment notes

- Set `APP_ENV=production` and `APP_DEBUG=false` in `.env`
- Run `npm run build` to compile assets
- Run `php artisan config:cache && php artisan route:cache && php artisan view:cache`
- Make `storage/` and `bootstrap/cache/` writable by the web server
- Run `php artisan storage:link` after deployment
