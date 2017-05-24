<?php

use Illuminate\Database\Seeder;
use App\Models\Role;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('amd_role')->insert(array(
        // array('id'=>'0','title'=>'Developer','slug'=>'developer'),
        array('id'=>'1','title'=>'Administrator','slug'=>'administrator'),
        array('id'=>'2','title'=>'Admin','slug'=>'admin'),
        array('id'=>'3','title'=>'Member','slug'=>'member'),
      ));
    }
}