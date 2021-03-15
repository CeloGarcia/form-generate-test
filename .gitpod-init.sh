mysql -u root -e "create database testdatabase"
cp .env.example .env
sed -i "s|APP_URL=|APP_URL=${GITPOD_WORKSPACE_URL}|g" .env
sed -i "s|APP_URL=https://|APP_URL=https://8000-|g" .env
/laravel composer install
/laravel npm i
/laravel php artisan key:generate