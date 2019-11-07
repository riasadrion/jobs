<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJobsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jobs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('deadline')->nullable();
            $table->mediumtext('description');
            $table->string('custom_url')->nullable(); 
            $table->string('salary')->nullable(); 
            $table->mediumtext('map')->nullable(); 
            $table->integer('user_id');
            $table->integer('category_id');
            $table->string('type_id')->nullable(); //ex. part time, full time
            $table->integer('city_id')->nullable();
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
        Schema::dropIfExists('jobs');
    }
}
