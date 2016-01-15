<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddAllowedAndPertestInTestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tests', function(Blueprint $table){
            $table->boolean('allowed')->default(true);
            $table->integer('per_page');
            $table->integer('retry')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tests', function(Blueprint $table){
            $table->dropColumn('allowed');
            $table->dropColumn('per_page');
            $table->dropColumn('retry');
        });
    }
}
