Service for sale tickets for airlines.

sudo groupadd docker
sudo usermod -aG docker $USER
newgrp docker

docker-compose up -d --build site
docker-compose run --rm npm run watch
docker-compose run --rm artisan make:factory PartnersFactory --model=PartnersModel
docker-compose run --rm artisan migrate:refresh --seed

##image
docker-compose run --rm artisan make:model Image --migration

####

docker-compose run --rm artisan make:controller SeatFlightController --resource

Tinker:
To get all tables, use this:
$tables = \DB::select('show tables');.

To get all columns of table, use this:
$columns = \Schema::getColumnListing('<table_name>');

docker-compose run --rm artisan make:model -m Partners

\App\Models\Partners::factory(10)->create();
