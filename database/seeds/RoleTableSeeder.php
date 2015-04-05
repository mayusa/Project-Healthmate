<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Role;

class RoleTableSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->truncate();

        Role::create(['role_name' => 'user']);
        Role::create(['role_name' => 'admin']);
        Role::create(['role_name' => 'super_admin']);
        Role::create(['role_name' => 'editor']);

    }

}
