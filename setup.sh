
echo 'initializing...'

echo 'running composer...'
composer install

echo 'deleting .env file...'
rm -f .env

echo 'creating .env file...'

env=.env
(
cat <<ADDTEXT
APP_NAME=Laravel
APP_ENV=local
APP_KEY=base64:/6iHnUf61b674jPZrQLYCqAtusqUDj5DeyeWB4O6Q6I=
APP_DEBUG=true
APP_LOG_LEVEL=debug
APP_URL=http://localhost

DB_CONNECTION=sqlite
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=database\database.sqlite
DB_USERNAME=homestead
DB_PASSWORD=secret

BROADCAST_DRIVER=log
CACHE_DRIVER=file
SESSION_DRIVER=file
SESSION_LIFETIME=120
QUEUE_DRIVER=sync

REDIS_HOST=127.0.0.1
REDIS_PASSWORD=null
REDIS_PORT=6379

MAIL_DRIVER=smtp
MAIL_HOST=smtp.mailtrap.io
MAIL_PORT=2525
MAIL_USERNAME=null
MAIL_PASSWORD=null
MAIL_ENCRYPTION=null

PUSHER_APP_ID=
PUSHER_APP_KEY=
PUSHER_APP_SECRET=
PUSHER_APP_CLUSTER=mt1

ADDTEXT
) > $env

echo 'deleting previous database.'
rm -f database/database.sqlite

echo 'creating database...'
touch database/database.sqlite

echo 'generating key...'
php artisan key:generate

echo 'running migrations...'
php artisan migrate
php artisan db:seed


echo 'press any key to continue...'
read line