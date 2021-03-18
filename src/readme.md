### PHPUnit tests

##### 1. Copy .env to .env.testing and configure:

```
composer envtest
```
```
DB_DATABASE=dbtest
```
##### 2. In the db_webservices container and to create the database:

```
docker exec -it db_webservices bash
```
```
$ psql
postgres=# CREATE database dbtest;
postgres=# \q
bash-5.1# exit
```
##### 3. Run migrations dbtest:

```
composer migratest
```
##### 4. Run tests: 
```
composer tests
```



