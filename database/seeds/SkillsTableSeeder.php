<?php

use Illuminate\Database\Seeder;

class SkillsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      factory(App\Skill::class)->create(['name' => 'PHP']);
      factory(App\Skill::class)->create(['name' => 'JavaScript']);
      factory(App\Skill::class)->create(['name' => 'iOS']);
      factory(App\Skill::class)->create(['name' => 'Photoshop']);
      factory(App\Skill::class)->create(['name' => 'MySQL']);
      factory(App\Skill::class)->create(['name' => 'Oracle']);
      factory(App\Skill::class)->create(['name' => 'Java']);
    }
}
