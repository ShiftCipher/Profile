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
        'user' => 'codeapps.co',
        'url' => 'https://www.codeapps.co',
        'icon' => 'fa fa-globe icon-lg icon-white'
      ]);

      factory(App\Service::class)->create([
        'name' => 'Github',
        'user' => 'codeapps',
        'url' => 'https://github.com/codeapps',
        'icon' => 'fa fa-github icon-lg icon-white'
      ]);

      factory(App\Service::class)->create([
        'name' => 'LinkedIn',
        'user' => 'danieltarazona',
        'url' => 'https://www.linkedin.com/in/danieltarazona',
        'icon' => 'fa fa-linkedin icon-lg icon-white'
      ]);

      factory(App\Service::class)->create([
        'name' => 'Twitter',
        'user' => '@codeapps1',
        'url' => 'https://twitter.com/codeapps1',
        'icon' => 'fa fa-twitter icon-lg icon-white'
      ]);

      factory(App\Service::class)->create([
        'name' => 'Email',
        'user' => 'codeapps@aol.com',
        'url' => 'aol.com',
        'icon' => 'fa fa-paper-plane icon-lg icon-white',
      ]);

      factory(App\Service::class)->create([
        'name' => 'Slack',
        'user' => 'codeapps',
        'url' => 'https://slack.com',
        'icon' => 'fa fa-slack icon-lg icon-white'
      ]);

      factory(App\Service::class)->create([
        'name' => 'Skype',
        'user' => 'danife14@hotmail.com',
        'url' => 'https://skype.com',
        'icon' => 'fa fa-skype icon-lg icon-white'
      ]);

      factory(App\Service::class)->create([
        'name' => 'Facebook',
        'user' => 'codeapps1',
        'url' => 'https://facebook.com/warindustries',
        'icon' => 'fa fa-facebook icon-lg icon-white'
      ]);

    }
}
