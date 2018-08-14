# Heroku PHP Configuration (Windows)

## Initializing PHP
- Make sure you're able to use Git and log into heroku.com
- When logged in, go to https://devcenter.heroku.com 
- For PHP, download the latest PHP (which comes with packages such as MAMP and XAMP), along with Composer. Make sure both are downloaded by checking the following:
```
PHP --version
>>> PHP 7.0.14 (cli) (built: Dec  6 2016 15:28:01) ( ZTS )
>>> Copyright (c) 1997-2016 The PHP Group
>>> Zend Engine v3.0.0, Copyright (c) 1998-2016 Zend Technologies

Composer --version
>>> Composer version 1.7.1 2018-08-07 09:39:23
```
- Take the next step and download Heroku, then follow it by typing the following command:
```
git --version
>>> git version 2.18.0.windows.1

heroku login
>>> Email:
>>> Password:
```
- After, create a secret location for where the Heroku deployment occers, this is separate from the rest of the parent file.
```
mkdir heroku
cd heroku
git init
>>> Initializing empty repository in C:/...

heroku create
>>> Creating app... done, secret-island-96054
>>> https://secret-island-96054.herokuapp.com/ | https://git.heroku.com/secret-islan   d-96054.git
```

- Create an index page and push it into Heroku
```
> index.html
atom .
git add .
git commit -am "first page"
git push heroku master
>>> (a lot of information will be send in this section)
```

## Initializing MySQL

If credit card information is inserted onto the site, then MySQL should be acccessible for free, otherwise git's response from the following command will be to verify your account.
```
heroku addons:add cleardb:ignite
>>> Creating cleardb:ignite on secret-island-96054... free
>>> Created cleardb-flat-18560 as CLEARDB_DATABASE_URL
>>> Use heroku addons:docs cleardb to view documentation
```

A database will then need to be sent Heroku.

```php
<?php

	//first, connect to the server where the database will be created
	$conn = mysql_connect("localhost", "username", "password");
	
	if (!$conn) {
		die("Cannot connect: " . mysql_error());
	}
	
	// create database, in this case the database is called genre maker
	if (mysql_query("CREATE DATABASE genreMaker", $conn)) {
		echo "Your database was created successfully!";
	} else {
		echo "DB Error: " . mysql_error();
	}
	
	// select the database in order to tell where the table will be going
	mysql_select_db("snippets", $conn);
	
	// create table and specify what the type of each column is
	$sql = "CREATE TABLE genres (
		section1 varchar(20),
		section2 varchar(20),
		section3 int
	)";
	
	if (mysql_query($sql, $conn)) {
		echo "Your table was created successfully!";
	} else {
		echo "TB Error: " . mysql_error();
	}
	
	mysql_close($conn);
?>
```

Information here tells you the following: user:password@name-of-machine/schema?reconnect=true

```
heroku config | grep CLEARDB_DATABASE_URL
>>> CLEARDB_DATABASE_URL: mysql://b13525e9dcde9c:71459c8d@us-cdbr-iron-east-01.cleardb.net/heroku_c5eb04791d8ad92?reconnect=true
```

Download MySQL's workbench and insert the username, password, machine name and schemea in. Once added, access into the database.

Altertively, the following steps can be taken from Git Bash to access the database and insert information in.

```
mysql -u b13525e9dcde9c -h us-cdbr-iron-east-01.cleardb.net -p heroku_c5eb04791d8ad92 < ~/Downloads/genremaker.sql
>>> Enter password: 
```

Go to database.php and uncomment the variables: 
$cleardb_url
$cleardb_server
$cleardb_username
$cleardb_password
$cleardb_db

Along with the $db['default'][''] variables below the aforementioned variables.

Update the composer.json file to include the mysql extension.

```json
{
	"require": {
		"ext-mysql": "*"
	}
}
```

Follow this up by pushing the file changes to Heroku.