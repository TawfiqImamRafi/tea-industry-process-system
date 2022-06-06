<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = new Role();
        $role->name = 'farmer';
        $role->display_name = 'Farmer';
        $role->save();

        $role = new Role();
        $role->name = 'company';
        $role->display_name = 'Company';
        $role->save();

        $role = new Role();
        $role->name = 'wholesaler';
        $role->display_name = 'Wholesaler';
        $role->save();
    }
}
