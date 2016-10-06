<?php

use Illuminate\Database\Seeder;

class ServicesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      factory(App\Service::class)->create([
        'name' => 'Website',
        'url' => 'https://www.codeapps.co'
      ]);

      factory(App\Service::class)->create([
        'name' => 'Github',
        'url' => 'https://github.com/codeapps'
      ]);

      factory(App\Service::class)->create([
        'name' => 'LinkedIn',
        'url' => 'https://co.linkedin.com/in/danieltarazona'
      ]);

      factory(App\Service::class)->create([
        'name' => 'Twitter',
        'url' => 'https://twitter.com/codeapps1'
      ]);

    }
}
