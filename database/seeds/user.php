<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class user extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $rand = str_random(10);
        DB::table('user')->insert([
            'name' => $rand,
            'email' => $rand.'@gmail.com',
            'api_key'   => base64_encode($rand),
            'password'  => app('hash')->make($rand.'123')
        ]);
        $this->command->info('name: '.$rand);
        $this->command->info('email: '.$rand.'@gmail.com');
        $this->command->info('api_key: '.base64_encode($rand));
        $this->command->info('password: '.$rand.'123');
    }
}
