#### PHPUnit tests:

##### Copy .env to .env.testing:

```
cp .env .env.testing
```
##### Create the database:

```
docker exec -it db_webservices bash
```

```
$ psql
postgres=# CREATE database_test;
```
##### Run migrations:

```
docker-compose exec api php artisan migrate:refresh --seed--env=testing 
```
##### Run tests: 
```
composer tests
```

