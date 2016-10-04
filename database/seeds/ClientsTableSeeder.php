<?php

use Illuminate\Database\Seeder;

class ClientsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      factory(App\Client::class)->create(['name' => 'Baxter']);
      factory(App\Client::class)->create(['name' => 'Mademetal']);
      factory(App\Client::class)->create(['name' => 'Raul Orlando Medellin']);
      factory(App\Client::class)->create(['name' => 'WiFi Click S.A.S']);
      factory(App\Client::class)->create(['name' => 'Centro Comercial La Fortuna']);
    }
}
