execute 
php artisan migrate
php artisan db:seed --class=PermissionTableSeeder
php artisan db:seed --class=CreateAdminUserSeeder
php artisan db:seed --class=PatientSeeder

