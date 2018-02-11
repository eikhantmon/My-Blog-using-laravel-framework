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
        $role_admin = Role::where('name','admin')->first();
        $role_author = Role::where('name','author')->first();

        $admin = new User();
        $admin->name = 'Admin Name';
        $admin->email = 'admin@admin.com';
        $admin->password = bcrypt('secret');
        $admin->save();
        $admin->roles()->attach($role_admin);

        $author = new User();
        $author->name = 'Author Name';
        $author->email = 'author@author.com';
        $author->password = bcrypt('secret');
        $author->save();
        $author->roles()->attach($role_author);

    }
}
