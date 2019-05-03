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
            $table->integer('employer_id');
            $table->string('title');
            $table->string('type'); //ex. part time, full time
            $table->string('tag')->nullable(); 
            $table->string('custom_url')->nullable(); 
            $table->integer('category_id');
            $table->string('deadline')->nullable();
            $table->mediumtext('description');
            $table->integer('location_id')->nullable();
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
