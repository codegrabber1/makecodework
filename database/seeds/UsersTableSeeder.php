<?php

use App\Models\Role as Role;
use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
	    DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        User::truncate();
	    DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        DB::table('role_user')->truncate();

        $adminRole = Role::where('name', 'admin')->first();
        $authorRole = Role::where('name', 'author')->first();
        $userRole = Role::where('name', 'user')->first();

        $admin = User::create([
        	'name' => 'Admin user',
	        'email' => 'makecodework@gmail.com',
	        'password' => Hash::make('12345678')
        ]);
	    $author = User::create([
		    'name' => 'Author',
		    'email' => 'author@author.com',
		    'password' => Hash::make('author')
	    ]);
	    $user = User::create([
		    'name' => 'Generic User',
		    'email' => 'user@user.com',
		    'password' => Hash::make('user')
	    ]);

	    $admin->roles()->attach($adminRole);
	    $author->roles()->attach($authorRole);
	    $user->roles()->attach($userRole);
    }
}
