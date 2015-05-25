<?php

namespace ZaLaravel\LaravelUser\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'roles';

    protected $fillable = [];
    
    public $timestamps = false;

}
