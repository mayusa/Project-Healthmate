<?php
/**
 * Created by PhpStorm.
 * User: may2015
 * Date: 3/20/15
 * Time: 2:42 PM
 */

//
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
