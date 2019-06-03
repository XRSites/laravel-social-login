[![Build Status](https://travis-ci.org/XRSites/laravel-social-login.svg?branch=master)](https://travis-ci.org/XRSites/laravel-social-login)
[![Code Coverage](https://scrutinizer-ci.com/g/XRSites/laravel-social-login/badges/coverage.png?b=master)](https://scrutinizer-ci.com/g/XRSites/laravel-social-login/?branch=master)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/XRSites/laravel-social-login/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/XRSites/laravel-social-login/?branch=master)
[![PHP from Packagist](https://img.shields.io/packagist/php-v/xrsites/laravel-social-login.svg)](https://www.php.net/releases/5_6_4.php)
[![Packagist Version](https://img.shields.io/packagist/v/xrsites/laravel-social-login.svg)](https://packagist.org/packages/xrsites/laravel-social-login)
[![Packagist](https://img.shields.io/packagist/l/xrsites/laravel-social-login.svg)](https://github.com/XRSites/laravel-social-login/blob/master/LICENSE)


# Social Login by XRSites
Yet Another [Laravel Framework](https://laravel.com) Social Login Project with [Socialite](https://github.com/laravel/socialite)

## Pre-requisites

- [PHP](http://php.net) >= 5.6
  - OpenSSL PHP Extension
  - PDO PHP Extension
  - Mbstring PHP Extension
  - Tokenizer PHP Extension
  - XML PHP Extension
- [Composer](https://getcomposer.org/)

## Setup

Just call the following in your prompt

    $ composer create-project xrsites/laravel-social-login your-site

Then enter your newly created project, create your database file (SQLite) and build your database
    
    $ cd your-site
    $ touch database/database.sqlite
    $ php artisan migrate
    
Finally, start your application and open your browser on the following URL

    $ php artisan serve
    
    http://localhost:8000
    
## Integration with Dashboards

You can use this project as base to install Admin Panels.

### Voyager

It's pretty straight forward. Follow the steps in [Voyager's Github Site](https://github.com/the-control-group/voyager) after creating an user with password using your localhost's [register page](http://localhost:8000/register)

**IMPORTANT:** it's important that you follow all the steps until start your server using `php artisan serve`, and follow all the steps to create your new user. If for some reason you don't create a password, try to create your account using simple e-mail/password in [register page](http://localhost:8000/register).
    
## See also

- [Laravel documentation](https://laravel.com/docs)
- [SQLite](https://www.sqlite.org/)
- [PHP documentation](http://php.net/docs.php)
- [Voyager - The Missing Laravel Admin](https://laravelvoyager.com/)
