<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRemindersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('reminders')){
            Schema::create('reminders', function (Blueprint $table) {
                $table->increments('id');
                $table->integer('student_id')->unsigned();
                $table->integer('reminder')->unsigned()->default(9);
                $table->timestamps();
                $table->foreign('student_id')->references('id')->on('students');
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reminders');
    }
}
