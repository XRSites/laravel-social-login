[![Build Status](https://travis-ci.org/XRSites/laravel-social-login.svg?branch=master)](https://travis-ci.org/XRSites/laravel-social-login)
[![Code Coverage](https://scrutinizer-ci.com/g/XRSites/laravel-social-login/badges/coverage.png?b=master)](https://scrutinizer-ci.com/g/XRSites/laravel-social-login/?branch=master)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/XRSites/laravel-social-login/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/XRSites/laravel-social-login/?branch=master)

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

    $ composer create-project xrsites/laravel-social-login=dev-master your-site

Then enter your newly created project and build your database
    
    $ cd your-site
    $ php artisan migrate
    
Finally, start your application

    $ php artisan serve
    
## See also

- [Laravel documentation](https://laravel.com/docs)
- [PHP documentation](http://php.net/docs.php)
