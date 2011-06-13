# Mongor - MongoDB Package for Laravel

## For more information on Laravel, visit [http://laravel.com](http://laravel.com/ "Laravel")

### Inspired by https://github.com/Wouterrr/MangoDB

Move config/mongor.php to /application/config and edit credentials.

### How to use

* Create a model that extends Mongor\Model.
* Each model is attached to a collection in the database
* Create a variable `protected $_collection = 'user';` where user is the collection name
* Use CRUD methods found in Mongor\Model or call the MongoDB instance $_db for more methods
* Refer to examples
* Refer to http://www.mongodb.org/display/DOCS/Home for more MongoDB useage