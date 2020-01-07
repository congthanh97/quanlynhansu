<?php

use Illuminate\Database\Seeder;

class AdminsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::table('users')->insert([
            [
                'adminName'=>'admin',
                'password'=>'123456',
                'fullname'=>'admin',
                'email'=>'admin.ptit@gmail.com',
                'mobile'=>'031239949',
                'workplace'=>'hocvienkythuatmatma',
                'level_id'=>'0',
                'created_at'=>date('Y-m-d H:i:s')],
        ]);
    }
}
