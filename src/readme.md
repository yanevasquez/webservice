### PHPUnit tests

##### 1. Copy .env to .env.testing:

```
cp .env .env.testing
```
##### 2. In the db_webservices container and to create the database:

```
docker exec -it db_webservices bash
```
```
$ psql
postgres=# CREATE database_test;
```
##### 3. Run migrations:

```
docker-compose exec api php artisan migrate:refresh --seed --env=testing 
```
##### 4. Run tests: 
```
composer tests
```



