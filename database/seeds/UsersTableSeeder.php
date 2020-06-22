<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         factory(App\User::class, 1)->create();
         factory(App\User::class)->create([
         	'name' => 'Webmaster',
         	'email' => 'diamondashly@gmail.com',
         	'password' => '$2y$12$6ZmoY637mMRcCI242NqlVeP7.sIsZso4ZpTiYP3Ki1w2IzOpB8MWW',
         ]);
    }
}
