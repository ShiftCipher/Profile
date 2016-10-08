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
      factory(App\User::class)->create([
        'name' => 'Daniel Tarazona',
        'nickname' => 'xYz',
        'email' => 'admin@admin.com',
        'profession' => 'Architect, Hacker, Ninja',
        'telephone' => '+57 315 8375156',
        'cellphone' => '+57 315 8375156',
        'password' => bcrypt("123456")
      ]);
    }
}
