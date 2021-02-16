start:
	php artisan serve --host 0.0.0.0

setup:
	composer install
	cp -n .env.example .env|| true
	php artisan key:gen --ansi
	touch database/database.sqlite
	php artisan migrate
	npm install

test:
	php artisan test

deploy:
	git push heroku

lint:
	composer run-script phpcs

lint-fix:
	composer run-script phpcbf

seed:
	php artisan migrate:refresh
	php artisan db:seed --class="RegionsTableSeeder"
	php artisan db:seed --class="UsersTableSeeder"
