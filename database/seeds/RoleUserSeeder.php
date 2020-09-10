<?php

use Illuminate\Database\Seeder;
use App\Models\Role;
use App\Models\User;

class RoleUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Seeds the roles table

        DB::table('role_user')->insert(array(
            array('user_id' => 1, 'role_id' => 1),
            array('user_id' => 2, 'role_id' => 2),
        ));

        // $user = User::create([
        //     'id' => '1',
        //     'username' => 'user',
        //     'password' => 'pass'
        // ]);
        // $user->roles()->sync([1, 2]); // array of role ids

        // $user = User::create([
        //     'id' => '2', '
        //     username' => 'user2',
        //     'password' => 'pass2'
        // ]);

        // $user->roles()->sync([3, 4]); // array of role ids

    }
}
