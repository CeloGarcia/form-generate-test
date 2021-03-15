mysql -u root -e "create database testdatabase"
cp /laravel .env.example /laravel .env
sed -i "s|APP_URL=|APP_URL=${GITPOD_WORKSPACE_URL}|g" /laravel .env
sed -i "s|APP_URL=https://|APP_URL=https://8000-|g" /laravel .env
/laravel composer install
/laravel npm i
/laravel php artisan key:generate