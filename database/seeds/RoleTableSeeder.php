<?php

use Illuminate\Database\Seeder;
use App\Role;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $adminRole                = new Role();
        $adminRole['name']        = "Administrator";
        $adminRole['description'] = "Administrator privilege";
        $adminRole->save();

        $sellerRole                = new Role();
        $sellerRole['name']        = "Seller";
        $sellerRole['description'] = "Seller/Creator privilege";
        $sellerRole->save();

        $customerRole                = new Role();
        $customerRole['name']        = "Customer";
        $customerRole['description'] = "Customer privilege";
        $customerRole->save();
    }
}
