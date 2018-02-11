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
        $role_admin = new Role();
        $role_admin -> name = 'admin';
        $role_admin -> description = 'Admin user';
        $role_admin ->save();


        $role_author = new Role();
        $role_author -> name = 'author';
        $role_author -> description = 'Author user';
        $role_author ->save();
    }
}
