<?php

use Illuminate\Database\Seeder;
use App\Models\Admin;


class AdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('amd_admin')->insert(array(
          array('name'=>'Developer', 'email'=>'developer@amadeo.id', 'password'=>bcrypt('12345678'), 'role_id'=> 1, 'confirmed'=>1, 'login_count'=>1),
        ));
    }
}
