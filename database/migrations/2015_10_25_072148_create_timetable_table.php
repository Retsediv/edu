<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTimetableTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('migration', function(Blueprint $table){
            $table->increments('id');
            $table->integer('school_id');
            $table->integer('order');
            $table->integer('day');
            $table->string('lesson_name');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('timetables');
    }
}
