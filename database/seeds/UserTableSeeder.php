<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        $adminRole = Role::query()->where('name','Administrator')->first();

        $adminUser             = new User();
        $adminUser['name']     = "Admin";
        $adminUser['email']    = "admin@emarhz.com";
        $adminUser['password'] = bcrypt("admin123");
        $adminUser->save();
        $adminUser->roles()->attach($adminRole);

    }
}
