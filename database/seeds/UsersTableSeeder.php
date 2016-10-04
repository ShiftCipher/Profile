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
        'password' => bcrypt("123456")
      ]);
    }
}
