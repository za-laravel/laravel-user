<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class RoleTableSeeder extends Seeder
{

    public function run()
    {
        DB::table('roles')->delete();
        Model::unguard();

        \ZaLaravel\LaravelUser\Models\Role::create(['name' => 'admin']);
        \ZaLaravel\LaravelUser\Models\Role::create(['name' => 'moderator']);
        \ZaLaravel\LaravelUser\Models\Role::create(['name' => 'user']);
    }

}