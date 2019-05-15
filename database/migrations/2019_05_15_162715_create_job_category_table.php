<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJobCategoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('job_category', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('job_id')->unsigned();
            $table->foreign('job_id')->references('id')->on('jobs');

            $table->integer('category_id')->unsigned();
            $table->foreign('category_id')->references('id')->on('categories');
            
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
        Schema::dropIfExists('job_category');
    }
}
