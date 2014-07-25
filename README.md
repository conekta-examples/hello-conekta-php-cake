![alt tag](https://raw.github.com/conekta/hello-conekta-php-cake/master/readme_files/cover.png)

Conekta PHP Tutorial Using Cake
=======================
This is a tutorial on how to use Conekta PHP library. It bundles functionality to process credit cards for normal purchases and subscriptions.

Installation
=======================

* To be able to run this example you will need to install a LAMP or XAMPP server in your machine. 
* Install CakePHP and replace its contents with the contents of the repository.

```bash
git clone --recursive git@github.com:conekta/hello-conekta-php-cake.git
```

The --recursive flag will download Conekta PHP library, which is a submodule of this example and process payments.

* Configure app/Config/databse.php:
```php
public $default = array(
	'datasource' => 'Database/Mysql',
	'persistent' => false,
	'host' => 'localhost',
	'login' => 'user',
	'password' => 'password',
	'database' => 'cake',
	'prefix' => '',
	//'encoding' => 'utf8',
);
``` 
* Create your database.
![alt tag](https://raw.github.com/conekta/hello-conekta-php-cake/master/readme_files/db_charges.png)
![alt tag](https://raw.github.com/conekta/hello-conekta-php-cake/master/readme_files/db_events.png)
![alt tag](https://raw.github.com/conekta/hello-conekta-php-cake/master/readme_files/db_products.png)
![alt tag](https://raw.github.com/conekta/hello-conekta-php-cake/master/readme_files/db_webhooks.png)

License
-------
Developed by [Conekta](https://www.conekta.io). Available with [MIT License](LICENSE).
