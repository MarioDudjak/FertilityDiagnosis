<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tests', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->float('season');
            $table->float('age');
            $table->float('disease');
            $table->float('trauma');
            $table->float('surgery');
            $table->float('fevers');
            $table->float('alcohol');
            $table->float('smoking');
            $table->float('sitting');
            $table->integer('result');
            $table->integer('user_id');
            $table->integer('post_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tests');
    }
}
