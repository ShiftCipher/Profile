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
      factory(App\Certificate::class)->create(['name' => 'Robot Operator I']);
      factory(App\Certificate::class)->create(['name' => 'Robot Programming I']);
      factory(App\Certificate::class, 10)->create();
    }
}
