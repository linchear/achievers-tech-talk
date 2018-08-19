


## Importing Entities
```
php bin/console doctrine:mapping:import App\\Entity annotation --path=src/Entity
```

## Generating getter-setters
```
php bin/console make:entity --regenerate App
```

## Database Issues

Connection refused?
---
    check if tech-mysql is running (with network)
    check DATABASE_URL
    check if /run/secrets running


###
## CONFIG
###
```
    env(DATABASE_USERNAME): '/run/secrets/database_username'
    env(DATABASE_PASSWORD): '/run/secrets/database_password'
    database_name: '%env(resolve:DATABASE_NAME)%'
    database_port: '%env(resolve:DATABASE_PORT)%'
    database_host: '%env(resolve:DATABASE_HOST)%'
    database_username: '%env(file:DATABASE_USERNAME)%'
    database_password: '%env(file:DATABASE_PASSWORD)%'

    ## dbal
            dbname: '%database_name%'
            host: '%database_host%'
            port: '%database_port%'
            user: '%database_username%'
            password: '%database_password%'
# .env.dist
DATABASE_NAME=cart
DATABASE_HOST=tech-mysql
DATABASE_PORT=3306
DATABASE_USERNAME=/run/secrets/database_username
DATABASE_PASSWORD=/run/secrets/database_password
```

###
## BUNDLES
###
```
"repositories": [
        {
            "type": "path",
            "url": "/opt/bundles/tax-bundle",
            "options": {
                "symlink": false
            }
        }
    ],

"achievers/tax-bundle"

docker run -ti -v "$(PWD)/../../bundles":/opt/bundles -v "$(PWD)":/app composer require achievers/tax-bundle
```

composer command
```
## full -- update composer.json repository before use
 docker run -ti -v "$(PWD)/../../bundles":/opt/bundles -v "$(PWD)":/app -v "$(PWD)/../run/secrets":/run/secrets composer update
```
 
 ```
alias dr='docker run -ti -v "$(PWD)/../../bundles":/opt/bundles -v "$(PWD)":/app -v "$(PWD)/../run/secrets":/run/secrets'
```