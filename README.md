## SC REST API

## Installation

Clone the repository

    git clone git@github.com:henriquesgabriel/sc-rest-api.git

Switch to the repo folder

    cd sc-rest-api

Install all the dependencies using composer

    composer install

Copy the example env file and make the required configuration changes in the .env file

    cp .env.example .env

Generate a new application key

    php artisan key:generate

Run the database migrations (**Set the database connection in .env before migrating**)

    php artisan migrate

## Database seeding

Run the database seeder

    php artisan db:seed

**_Note_** : It's recommended to have a clean database before seeding.

    php artisan migrate:refresh --seed

## Running

Start the local development server

    php artisan serve

## Testing

Run Codeception

    php vendor/bin/codecept build
    php vendor/bin/codecept run

## HTTP Methods

#### List all products

```console
curl -X GET http://localhost:8000/api/products
```

#### Retrieve a single product

```console
curl -X GET http://localhost:8000/api/products/{id}
```

#### Create product

```console
curl -X POST http://localhost:8000/api/products \
 -H "Accept: application/json" \
 -H "Content-Type: application/json" \
 -d '{
        "name": {name},
        "sku": {sku},
        "price": {price},
        "category_id": {id}
 }'
```

#### Update product

```console
curl -X PUT http://localhost:8000/api/products/{id} \
 -H "Accept: application/json" \
 -H "Content-Type: application/json" \
 -d '{
    "price": {price}
  }'
```

#### Delete product

```console
curl -X DELETE http://localhost:8000/api/products/{id}

```

#### List all categories

```console
curl -X GET http://localhost:8000/api/categories

```
