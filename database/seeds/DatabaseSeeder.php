<?php

use Illuminate\Database\Seeder;

use App\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $user = factory(App\User::class)->create([
        'name' => 'Daniel',
        'email' => 'admin@admin.com',
        'password' => bcrypt("123456"),
        'nickname' => 'xYz'
      ]);
    }
}
