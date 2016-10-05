<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'nickname' => $faker->name,
        'address' => $faker->address,
        'telephone' => $faker->phoneNumber,
        'cellphone' => $faker->phoneNumber,
        'password' => $password ?: $password = bcrypt('123456'),
        'photo' => "/img/users/profile.png",
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Category::class, function (Faker\Generator $faker) {
  return [
    'name' => $faker->name,
    'photo' => "/img/categories/category.png",
  ];
});

$factory->define(App\Certificate::class, function (Faker\Generator $faker) {
  return [
    'name' => $faker->name,
    'company' => $faker->name,
    'url' => $faker->url,
    'code' => str_random(10),
    'date' => $faker->date($format = 'Y-m-d', $max = 'now'),
    'photo' => "/img/certificates/certificate.png",
  ];
});

$factory->define(App\Client::class, function (Faker\Generator $faker) {
  return [
    'name' => $faker->name,
    'url' => $faker->url,
    'address' => $faker->address,
    'telephone' => $faker->phoneNumber,
    'cellphone' => $faker->phoneNumber,
    'start' => $faker->date($format = 'Y-m-d', $max = 'now'),
    'end' => $faker->date($format = 'Y-m-d', $max = 'now'),
    'photo' => "/img/clients/client.png",
  ];
});

$factory->define(App\Course::class, function (Faker\Generator $faker) {
  return [
    'name' => $faker->name,
    'company' => $faker->name,
    'complete' => false,
    'url' => $faker->url,
    'category_id' => 1,
    'start' => $faker->date($format = 'Y-m-d', $max = 'now'),
    'end' => $faker->date($format = 'Y-m-d', $max = 'now'),
    'photo' => "/img/courses/course.png",
  ];
});

$factory->define(App\Study::class, function (Faker\Generator $faker) {
  return [
    'name' => $faker->name,
    'company' => $faker->name,
    'complete' => true,
    'url' => $faker->url,
    'category_id' => 1,
    'start' => $faker->date($format = 'Y-m-d', $max = 'now'),
    'end' => $faker->date($format = 'Y-m-d', $max = 'now'),
    'photo' => "/img/studies/study.png",
  ];
});

$factory->define(App\Language::class, function (Faker\Generator $faker) {
  return [
    'name' => $faker->name,
    'level' => $faker->numberBetween($min = 40, $max = 99),
    'photo' => "/img/languages/language.png",
  ];
});

$factory->define(App\Project::class, function (Faker\Generator $faker) {
  return [
    'name' => $faker->name,
    'company' => $faker->name,
    'complete' => false,
    'url' => $faker->url,
    'category_id' => 1,
    'start' => $faker->date($format = 'Y-m-d', $max = 'now'),
    'end' => $faker->date($format = 'Y-m-d', $max = 'now'),
    'photo' => "/img/projects/project.png",
  ];
});

$factory->define(App\Service::class, function (Faker\Generator $faker) {
  return [
    'name' => $faker->name,
    'url' => $faker->url,
    'photo' => "/img/services/service.png",
  ];
});

$factory->define(App\Skill::class, function (Faker\Generator $faker) {
  return [
    'name' => $faker->name,
    'level' => $faker->numberBetween($min = 40, $max = 99),
    'photo' => "/img/skills/skill.png",
  ];
});

$factory->define(App\Photo::class, function (Faker\Generator $faker) {
  return [
    'photo' => "/img/photos/photo.png",
    'project_id' => 1,
  ];
});
