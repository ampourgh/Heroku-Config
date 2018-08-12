# Heroku PHP Configuration (Windows)

## Initializing
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