<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nas', function (Blueprint $table) {
            $table->Increments('id')->unsigned();
            $table->string('nasname',128)->nullable(false);
            $table->string('shortname',32)->nullable();
            $table->string('type',30)->default('other')->nullable();
            $table->smallInteger('ports')->nullable();
            $table->string('secret',60)->default('secret')->nullable(false);
            $table->string('server',64)->nullable();
            $table->string('community',50)->nullable();
            $table->string('description',200)->default('RADIUS Client')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('nas');
    }
}
