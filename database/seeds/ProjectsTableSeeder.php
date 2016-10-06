<?php

use Illuminate\Database\Seeder;

class ProjectsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      factory(App\Project::class)->create([
        'name' => 'Noir Bureau',
        'description' => 'Blender Cycles Render Blackmagic Office',
        'start' => '2013-06-20',
        'end' => '2013-06-27',
        'url' => 'https://realinterior.co',
        'company' => 'RealInterior',
        'category_id' => 1
      ]);

    }
}
