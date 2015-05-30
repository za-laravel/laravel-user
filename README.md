# laravel-user
User functionality package for Laravel 5

[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/za-laravel/laravel-user/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/za-laravel/laravel-user/?branch=master)
[![Build Status](https://scrutinizer-ci.com/g/za-laravel/laravel-user/badges/build.png?b=master)](https://scrutinizer-ci.com/g/za-laravel/laravel-user/build-status/master)
[![Latest Stable Version](https://poser.pugx.org/za-laravel/laravel-user/v/stable)](https://packagist.org/packages/za-laravel/laravel-user) [![Total Downloads](https://poser.pugx.org/za-laravel/laravel-user/downloads)](https://packagist.org/packages/za-laravel/laravel-user) [![Latest Unstable Version](https://poser.pugx.org/za-laravel/laravel-user/v/unstable)](https://packagist.org/packages/za-laravel/laravel-user) [![License](https://poser.pugx.org/za-laravel/laravel-user/license)](https://packagist.org/packages/za-laravel/laravel-user)


## Installation

  * install package with ```composer require za-laravel/laravel-user:"dev-master"``` 
  
  * Now append service provider to providers array in config/app.php.
     
     ```php
     <?php
     
     'providers' => array(
     
         'Illuminate\Foundation\Providers\ArtisanServiceProvider',
         'Illuminate\Auth\AuthServiceProvider',
         ...
         'ZaLaravel\LaravelUser\LaravelUserServiceProvider',
     ),
     ?>
     ```
     
## Usage 
     
