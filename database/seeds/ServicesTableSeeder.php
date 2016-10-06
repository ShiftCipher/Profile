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
        'name' => 'Facebook',
        'url' => 'https://www.facebook.com/warindustries'
      ]);

      factory(App\Service::class)->create([
        'name' => 'Twitter',
        'url' => 'https://twitter.com/codeapps1'
      ]);

      factory(App\Service::class)->create([
        'name' => 'Github',
        'url' => 'https://github.com/codeapps'
      ]);

      factory(App\Service::class)->create([
        'name' => 'LinkedIn',
        'url' => 'https://co.linkedin.com/in/danieltarazona'
      ]);
    }
}
