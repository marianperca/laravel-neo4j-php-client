# GraphAware Neo4j PHP Client - Laravel wrapper
 
Simple laravel wrapper for [GraphAware Neo4j PHP Client](https://github.com/graphaware/neo4j-php-client)

# Installation

Require this package in your `composer.json` and update composer. Run / add either of the below two commands
```php
"tsf/laravel-neo4j-php-client": "^1.0"
```
or
```php
composer require tsf/laravel-neo4j-php-client=^1.0
```

After updating composer, add the ServiceProvider in `app/config/app.php`

```php
TSF\Neo4jClient\Neo4jServiceProvider::class,
```

and the facade

```php
'Neo4jClient' => TSF\Neo4jClient\Facades\Neo4jClient::class,
```

Run the artisan command to bring the config into your project

```php
php artisan vendor:publish --provider="TSF\Neo4jClient\Neo4jServiceProvider"
```

Update `config/neo4j.php` with your connection data.

# How to use

```php
Neo4jClient::run('CREATE (n:Person)');
```

For all available methods you can use please read GraphAware documentation here: [GraphAware Neo4j PHP Client](https://github.com/graphaware/neo4j-php-client)
