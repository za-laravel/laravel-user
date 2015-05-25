# laravel-user
User functionality package for Laravel 5


## Installation

  * install package with ```composer require za-laravel/laravel-user``` 
  
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
     