HOSPITAL MANAGEMENT SYSTEM

Set Environment file
```angular2html
Copy .env.example as .env
```

Generate App key
```
php artisan key:generate
```

Install required dependency
```
composer install
```

Migrating table (Make sure you already created database name 'hms_live')
```
php artisan migrate
```

Seeding data to database
```
php artisan db:seed
```

Install node dependency
```angular2html
npm install
```

compile webpack
```angular2html
npm run dev
```

### Demo Credentials

**Admin:** admin@admin.com  
**Password:** secret

**User:** user@user.com  
**Password:** secret
