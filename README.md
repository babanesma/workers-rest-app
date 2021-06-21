# Workers Rest APP

## Installation 

```
$ git checkout git@github.com:babanesma/workers-rest-app.git
$ ./vendor/bin/sail up -d
$ ./vendor/bin/sail artisan migrate
$ ./vendor/bin/sail artisan db:seed ## for testing data
```

## ERD Diagram

![ERD diagram](/docs/img/ERD.png )


## Postman 

Import the collection [here](docs/postman/workers_rest_app.postman_collection.json) and you will find 2 folders one for workers and one for shifts with all REST functions.

## Testing

```
$ ./vendor/bin/sail test
```