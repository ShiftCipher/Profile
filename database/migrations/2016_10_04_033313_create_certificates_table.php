<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCertificatesTable extends Migration
{
  /**
  * Run the migrations.
  *
  * @return void
  */
  public function up()
  {
    Schema::create('certificates', function (Blueprint $table) {
      $table->increments('id');
      $table->string('company');
      $table->string('name');
      $table->string('code');
      $table->string('url');
      $table->date('date');
      $table->string('photo')->nullable();
      $table->timestamps();
    });
  }

  /**
  * Reverse the migrations.
  *
  * @return void
  */
  public function down()
  {
    Schema::dropIfExists('certificates');
  }
}
