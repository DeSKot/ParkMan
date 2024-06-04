
## Install app

1. git clone https://github.com/DeSKot/ParkMan.git 
2. create **.env** -> use full content from [.env.example](.env.example)
3. docker network create park-man-local-network
4. docker-compose up --build --force-recreate -d
5. docker exec -it park-man-app bash
6. composer install
7. php artisan migrate
8. swagger 


## Add test data

 - docker exec -it park-man-app bash
1. add 1000 garages with owners -> php artisan db:seed --class=GarageGeneralSeeder [(default 1000)](database/seeders/GarageGeneralSeeder.php)
