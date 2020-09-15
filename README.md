# A challenge given by Julian

Convert the following array:

```php
$array = [
    '10/9/8/7/6/5' => 'Harry',
    '10/9/8/6' => 'Henk'
];
```

Into:
```php
$result = [
    10 => [
        9 => [
            8 => [
                7 => [
                    6 => [
                        5 => 'Harry'
                    ]
                ],
                6 => 'Henk'
            ]
        ]
    ]
];
```

_I recall bonus points were given to implementations without using references (`&`)._ 

## Deploy

Build and start the Docker environment:

```sh
docker-compose up -d --build
```

Run the app within the `php` service:

```sh
docker-compose exec php ./bin/app
```

_If your stubborn ass decides to run this app in some other environment and it fails to run, your problem._

## Tests

Run the unit test suite:

```sh
docker-compose exec php ./vendor/bin/phpunit
```

## Todo

The given flat array is hardcoded at the moment.
Would be more interesting if you can pass some JSON file containing the array for example.

Anyway, the hardcoded array can be found in `bin/app` in case you want to change the input. 