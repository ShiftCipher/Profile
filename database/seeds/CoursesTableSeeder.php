<?php

use Illuminate\Database\Seeder;

class CoursesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      factory(App\Course::class)->create([
        'name' => 'Curso de Programación de Apps Moviles',
        'company' => 'Universidad Complutense de Madrid'
      ]);

      $course = factory(App\Course::class, 10)->create();
    }
}
