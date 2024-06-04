
## Install app

1.
```shell
git clone https://github.com/DeSKot/ParkMan.git
```
2. create **.env** -> use full content from [.env.example](.env.example)
3.
```shell
docker network create park-man-local-network
```
4.
```shell
docker-compose up --build --force-recreate -d
```
5.
```shell
docker exec -it park-man-app bash
```
6. composer install
7. php artisan migrate

## Add test data
```shell
docker exec -it park-man-app bash
```

1. add 1000 garages with owners -> php artisan db:seed --class=GarageGeneralSeeder [(default 1000)](database/seeders/GarageGeneralSeeder.php)

## Additional info
1. After seeding, you can check this end point in Swagger http://127.0.0.1:8012/api/documentation
