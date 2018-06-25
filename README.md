# kp-api-chatbot

## Requirements

* PHP 5.4.0 or later (5.6 or later is recommended)
* PHPUnit 6
* XDebug
* CodeIgniter 3.x
* Composer


### PHPUnit Setup
```
MacOs :
wget -O phpunit https://phar.phpunit.de/phpunit-6.phar
chmod +x phpunit
sudo mv phpunit /usr/local/bin/phpunit
phpunit --version

Windows:
todo
```

Run PHPUnit test
```
cd application/tests
(xdebug installed)
phpunit 

(xdebug not installed)
phpunit --no-coverage

(run specifics unit test )
phpunit --no-coverage --debug controllers/Unit_test.php
```


### Composer Setup 
```
MacOs :
brew install composer
composer --version

Windows:
todo


## Php Packages (via composer.json)
```
"chriskacerguis/codeigniter-restserver": "^3.0",
"kenjis/ci-phpunit-test": "^0.16.1"
```


## Postman Collection ( Rest Client)
Installation :  https://www.getpostman.com/
Collection Files : /tools/kp-api.postman_collection.json
- Import collection files 
- Click kp-api collection, run product name request 
