Service for sale tickets for airlines.

sudo groupadd docker
sudo usermod -aG docker $USER
newgrp docker

docker-compose up -d --build site
docker-compose run --rm npm run watch
docker-compose run --rm artisan make:factory PartnersFactory --model=PartnersModel
docker-compose run --rm artisan migrate:refresh --seed

##rebuild
Re-build the containers by running: docker-compose build --no-cache

##image
https://hub.docker.com/r/rhamdeew/docker-php-8-fpm-alpine/dockerfile
RUN apk add --no-cache --virtual build-essentials \
 icu-dev icu-libs zlib-dev g++ make automake autoconf libzip-dev \
 libpng-dev libwebp-dev libjpeg-turbo-dev freetype-dev && \
 docker-php-ext-configure gd --enable-gd --with-freetype --with-jpeg --with-webp && \
 docker-php-ext-install gd
docker-compose run --rm artisan make:model Image --migration

https://smknstd.medium.com/fake-beautiful-images-in-laravel-51062967d1db
removing images https://stackoverflow.com/questions/62429023/how-to-create-a-factory-with-images-for-testing

####

docker-compose run --rm artisan make:controller SeatFlightController --resource

Tinker:
Faker instance: >>> $faker = Faker\Factory::create();

# example \App\Models\SeatFlight::all()

To get all tables, use this:
$tables = \DB::select('show tables');.

To get all columns of table, use this:
$columns = \Schema::getColumnListing('<table_name>');

docker-compose run --rm artisan make:model -m Partners

\App\Models\Partners::factory(10)->create();

###

Carbon
$seat_flight->date->format('F d Y') -> DECEMBER 25 2021
format('M d, Y') -> DEC 25, 2021
https://www.php.net/manual/en/function.date

1. Change locale and modify output language:

use Carbon\Carbon;
...

```
$boringLanguage = 'ru';
$translator = \Carbon\Carbon::getTranslator($boringLanguage);
$transformDiff = function ($input) {
    return strtr($input, [
    'неделя' => 'неделю',
    'секунда' => 'секунду',
    'минута' => 'минуту',
  ]);
};
$translator->setTranslations([
    'day' => ':count boring day|:count boring days',
    'after' => function ($time) use ($transformDiff) {
        return $transformDiff($time) . '';
}
]);

// \Carbon\Carbon::setLocale('es');
```

#Timestamp
2022-01-16 00:37:25
->format('Y-m-d H:m:s')
