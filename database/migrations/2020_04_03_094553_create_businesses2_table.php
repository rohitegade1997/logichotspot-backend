<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBusinesses2Table extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('businesses2', function (Blueprint $table) {
            $table->Increments('id')->unsigned();
            $table->string('name', 255)->nullable(false);
            $table->string('url', 255)->nullable(false);
            $table->boolean('active')->default(true)->nullable(false);;
            $table->string('address1', 255)->default('')->nullable(false);
            $table->string('address2', 255)->default('')->nullable();
            $table->string('phone', 20)->default('')->nullable(false);
            $table->string('city', 50)->default('')->nullable(false);
            $table->string('state', 50)->default('')->nullable(false);
            $table->string('country', 50)->default('')->nullable(false);
            $table->string('zip', 20)->default('')->nullable(false);
            $table->dateTime('deleted_at')->nullable();
            $table->timestamp('createddate')->nullable();
            $table->string('createdby', 50)->nullable();
            $table->timestamp('updateddate')->nullable();
            $table->string('updatedby',50)->nullable();
            $table->unique('url');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('businesses2');
    }
}
