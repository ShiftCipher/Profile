<?php

use Illuminate\Database\Seeder;

class LanguagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      factory(App\Language::class)->create(['name' => 'Spanish']);
      factory(App\Language::class)->create(['name' => 'English']);
      factory(App\Language::class)->create(['name' => 'Japanese']);
      factory(App\Language::class)->create(['name' => 'German']);
      factory(App\Language::class)->create(['name' => 'Mandarin']);
      factory(App\Language::class)->create(['name' => 'Russian']);
    }
}
