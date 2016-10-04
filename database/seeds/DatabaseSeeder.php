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
      factory(User::class)->create([
        'name' => 'Daniel',
        'email' => 'admin@admin.com',
        'password' => bcrypt("123456"),
        'nickname' => 'xYz'
      ]);

      factory(Category::class)->create(['name' => 'UIX']);
      factory(Category::class)->create(['name' => 'Front-end']);
      factory(Category::class)->create(['name' => 'Machine Learning']);
      factory(Category::class)->create(['name' => 'Back-end']);
      factory(Category::class)->create(['name' => 'JavaScript']);
      factory(Category::class)->create(['name' => 'PHP']);
      factory(Category::class)->create(['name' => 'Architecture']);
      factory(Category::class)->create(['name' => 'Games']);
      factory(Category::class)->create(['name' => 'Mathematics']);
      factory(Category::class)->create(['name' => 'Computer Science']);
      factory(Category::class)->create(['name' => 'Hacking']);
      factory(Category::class)->create(['name' => 'Data Analyst']);
      factory(Category::class)->create(['name' => 'High Performance Computer']);
      factory(Category::class)->create(['name' => 'Apple Developer']);
      factory(Category::class)->create(['name' => 'Operating Systems']);
      factory(Category::class)->create(['name' => 'Programming Languages']);
      factory(Category::class)->create(['name' => 'Computer Graphics']);
      factory(Category::class)->create(['name' => 'Robotics']);
      factory(Category::class)->create(['name' => 'Body Training']);




    }
}
