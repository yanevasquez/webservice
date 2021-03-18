
#### webservices 
* [Instruction for running PHPUnit tests ](https://github.com/yanevasquez/webservices/blob/master/src/readme.md)

##### 1. Configure parameters in .env
```
cp .env.example .env
```

```
DB_CONNECTION=pgsql
DB_HOST=db
DB_PORT=5432
DB_DATABASE=postgres
DB_USERNAME=postgres
DB_PASSWORD=postgres
PGUSER=postgres
```
##### 2. Build a container:

```sh
cd src/
sh build.sh
```
##### 3. Api running at:
```sh
http://localhost:3000
```

##### 4. Run migrations and seeders:
```sh
composer migraseeds
```
##### Useful commands:

###### Clear cache after modifying .env: 
```sh
composer clear
```
###### Stop apache server to avoid conflict with nginx: 
```sh
sudo systemctl stop apache2
```
###### Access permission:
```sh
sudo chmod 777 -R storage/
```
....
