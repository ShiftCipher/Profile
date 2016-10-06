<?php

use Illuminate\Database\Seeder;

class CertificatesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      factory(App\Certificate::class)->create([
        'name' => 'JavaScript Basics',
        'company' => 'SoloLearn',
        'code' => '1024-389295',
        'url' => 'http://www.sololearn.com/Profile/389295/',
        'date' => '2015-11-26'
      ]);

      factory(App\Certificate::class)->create([
        'name' => 'SQL Fundamentals',
        'company' => 'SoloLearn',
        'code' => '1060-389295',
        'url' => 'http://www.sololearn.com/Profile/389295/',
        'date' => '2015-12-02'
      ]);

      factory(App\Certificate::class)->create([
        'name' => 'PHP Course',
        'company' => 'SoloLearn',
        'code' => '1059-389295',
        'url' => 'http://www.sololearn.com/Profile/389295/',
        'date' => '2015-12-04'
      ]);
      
    }
}
