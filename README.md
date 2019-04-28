# Dockerized PHP application skeleton

Docker running Nginx, PHP-FPM, Composer, MySQL and PHPMyAdmin.

## Run composer

###### Install dependencies
```bash
#!/usr/bin/env bash
docker-compose run --rm composer install
```

###### Update dependencies
```bash
#!/usr/bin/env bash
docker-compose run --rm composer update
```

## Run containers
```bash
docker-compose up -d
```
