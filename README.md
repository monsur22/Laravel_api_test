# This is Api Project
Using for react project

## Installation

composer update<br>
npm install<br>
modify .env.example to .env<br>
php artisan migrate --seed<br>
php artisan serve<br>

#upload project on heroku site
Best usable link( https://devcenter.heroku.com/articles/getting-started-with-laravel)
git init
git add .
git commit -m "new laravel project"
echo "web: vendor/bin/heroku-php-apache2 public/" > Procfile
git add .
git commit -m "Procfile for Heroku"
heroku login
heroku create
heroku config:set APP_KEY=…
git push heroku master
