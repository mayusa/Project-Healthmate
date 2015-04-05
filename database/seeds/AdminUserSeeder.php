<?php
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Model;
use App\User;

class AdminUserSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->truncate();
        //create a super admin first
        User::create([
            'email' => 'ashucn@gmail.com',
            'password' => HASH::make('ashucn'),
            'name' => 'ashucn',
            'first_name' => 'May',
            'last_name' => 'Liu',
            'gender' => '0',
            'phone' => '000-000-0000',
            'address' => 'npu',
            'zip_code' => '94539',
            'birth' => '5/28/1999',
            'rid' => '3'

        ]);

        //create a normal admin
        User::create([
            'email' => 'weibakr@gmail.com',
            'password' => HASH::make('weibakr'),
            'name' => 'weiba',
            'first_name' => 'May',
            'last_name' => 'Liu',
            'gender' => '0',
            'phone' => '000-000-0000',
            'address' => 'npu',
            'zip_code' => '94539',
            'birth' => '5/28/1999',
            'rid' => '2'

        ]);

    }

}