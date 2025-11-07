# Art Competition Registration System - Laravel Installation Guide

## Step 1: Create Laravel Project

```bash
cd ~/Sites
composer create-project laravel/laravel art-competition
cd art-competition
```

## Step 2: Configure Database

Edit `.env` file:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=art_comp_db
DB_USERNAME=root
DB_PASSWORD=DimBoy-23

APP_NAME="Art Competition 2025"
APP_TIMEZONE=Asia/Dhaka
```

## Step 3: Create Database

```bash
mysql -u root -pDimBoy-23 -e "CREATE DATABASE IF NOT EXISTS art_comp_db CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;"
```

## Step 4: Install Required Packages

```bash
composer require barryvdh/laravel-dompdf
composer require simplesoftwareio/simple-qrcode
composer require maatwebsite/excel

# Publish configurations
php artisan vendor:publish --provider="Barryvdh\DomPDF\ServiceProvider"
```

## Step 5: Create Migration

```bash
php artisan make:migration create_registrations_table
```

Copy the migration code from the artifacts and run:

```bash
php artisan migrate
```

## Step 6: Create Model

```bash
php artisan make:model Registration
```

Copy the model code from the artifacts.

## Step 7: Create Controllers

```bash
php artisan make:controller RegistrationController
php artisan make:controller AdminController
```

Copy the controller code from the artifacts.

## Step 8: Create Export Class

```bash
php artisan make:export RegistrationsExport --model=Registration
```

Copy the export class code from the artifacts.

## Step 9: Setup Routes

Replace content in `routes/web.php` with the routes from artifacts.

## Step 10: Create Views

Create directory structure:

```bash
mkdir -p resources/views/layouts
mkdir -p resources/views/registration
mkdir -p resources/views/admin
```

Create these files:
- `resources/views/layouts/app.blade.php`
- `resources/views/registration/index.blade.php`
- `resources/views/registration/admit-card.blade.php`
- `resources/views/admin/login.blade.php`
- `resources/views/admin/dashboard.blade.php`

Copy the blade template code from the artifacts.

## Step 11: Configure DomPDF for Bengali Fonts

Edit `config/dompdf.php` (after publishing):

```php
'font_dir' => storage_path('fonts/'),
'font_cache' => storage_path('fonts/'),
'chroot' => realpath(base_path()),
'enable_font_subsetting' => false,
'pdf_backend' => 'CPDF',
'default_media_type' => 'screen',
'default_paper_size' => 'a4',
'default_font' => 'dejavu sans',
'dpi' => 96,
'enable_php' => false,
'enable_javascript' => true,
'enable_remote' => true,
'font_height_ratio' => 1.1,
'enable_html5_parser' => true,
```

## Step 12: Setup Valet (if using Valet)

```bash
valet link art-competition
# or
valet park
```

## Step 13: Clear Caches

```bash
php artisan config:clear
php artisan cache:clear
php artisan route:clear
php artisan view:clear
```

## Step 14: Set Permissions

```bash
chmod -R 775 storage bootstrap/cache
```

## Step 15: Access Your Application

Visit: `http://art-competition.test` or `http://localhost:8000`

To use built-in server:
```bash
php artisan serve
```

## Testing

1. **Test Registration**: Go to homepage and fill the registration form
2. **Test Download**: Click the download button in navbar or use the success link
3. **Test Admin**: 
   - Go to `/admin`
   - Enter PIN: `1234`
   - View dashboard and export data

## Change Admin PIN

Edit `app/Http/Controllers/AdminController.php`:

```php
private $adminPin = 'your-new-pin';
```

## Features

✅ Mobile-responsive navbar
✅ Download modal in navbar
✅ Bengali language support
✅ PDF admit card generation with QR code
✅ CSV/Excel export
✅ PIN-protected admin panel
✅ Clean and modern UI

## Troubleshooting

### PDO MySQL Not Found
```bash
brew reinstall php
valet restart
```

### Permission Denied
```bash
chmod -R 775 storage bootstrap/cache
```

### Migration Errors
```bash
php artisan migrate:fresh
```

### Can't Generate QR Code
```bash
composer require simplesoftwareio/simple-qrcode
php artisan config:clear
```

### PDF Not Generating
```bash
composer require barryvdh/laravel-dompdf
php artisan vendor:publish --provider="Barryvdh\DomPDF\ServiceProvider"
php artisan config:clear
```

## File Structure

```
art-competition/
├── app/
│   ├── Http/Controllers/
│   │   ├── RegistrationController.php
│   │   └── AdminController.php
│   ├── Models/
│   │   └── Registration.php
│   └── Exports/
│       └── RegistrationsExport.php
├── database/migrations/
│   └── xxxx_create_registrations_table.php
├── resources/views/
│   ├── layouts/
│   │   └── app.blade.php
│   ├── registration/
│   │   ├── index.blade.php
│   │   └── admit-card.blade.php
│   └── admin/
│       ├── login.blade.php
│       └── dashboard.blade.php
├── routes/
│   └── web.php
├── .env
└── composer.json
```

## Support

For any issues, check:
1. Database credentials in `.env`
2. MySQL is running: `brew services list | grep mysql`
3. PHP version: `php -v` (should be 8.1+)
4. Composer packages installed: `composer install`

## all text
বসুন্ধরা পাবলিক স্কুল এন্ড কলেজ ছবি আঁকা প্রতিযোগিতা
১২ ডিসেম্বর ২০২৫
বিষয়
মুক্তিযুদ্ধ ও জুলাই গণ-অভ্যুত্থান

স্থান
বসুন্ধরা পাবলিক স্কুল এন্ড কলেজ
প্লট ০২, ব্লক এন, বসুন্ধরা আবাসিক এলাকা, ঢাকা ১২২৯

তৃতীয় শ্রেণি 
চতুর্থ শ্রেণি 
পঞ্চম শ্রেণি 
ষষ্ঠ শ্রেণি 
সপ্তম শ্রেণি 
অষ্টম শ্রেণি 
নবম শ্রেণি 
দশম শ্রেণি 
