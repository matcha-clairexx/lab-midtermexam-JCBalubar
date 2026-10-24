# Student Manager - School of Information Technology Education

Student Manager for the School of Information Technology Education.

Developed by: Jessica Claire M. Balubar

## Requirements
- PHP 8.2 or higher
- Composer
- MySQL or PostgreSQL
- Laravel 11

## Setup
1. Clone the repository:
   ```bash
   git clone <repo-url>
   cd lab-exam-balubar
   ```

2. Copy `.env.example` to `.env` and configure your database:
   ```bash
   cp .env.example .env
   ```

3. Update your database settings in `.env`:
   ```env
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=lab_exam_balubar
   DB_USERNAME=root
   DB_PASSWORD=
   ```

4. Install dependencies:
   ```bash
   composer install
   php artisan key:generate
   ```

5. Run migrations and seeders:
   ```bash
   php artisan migrate
   php artisan db:seed
   ```

6. Start the app:
   ```bash
   php artisan serve
   ```

7. Open:
   ```text
   http://localhost:8000
   ```

## Default login accounts
- admin@school.edu / password
- faculty@school.edu / password

## Notes
- `.env` is not committed.
- Student routes are protected by authentication.
- Only the user who created the student can edit or delete it.
- The API is authenticated with Laravel Sanctum.
