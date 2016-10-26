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
        'password' => bcrypt("123456"),
        'bio' => 'Background in computational design and digital manufacturing is linked to visionary data science executive with broad spectrum of domain expertise, technical knowledge, participated in the planning, design and development of a broad range of applications to companies ranging from Startups to Fortune 500, across domains (Data Science, Operations Research, Machine Learning, Computer Science, Business Intelligence, Growth Hacking, IoT).
        Passionate about learning and improving the quality of his work, techniques and tools.'
      ]);
    }
}
