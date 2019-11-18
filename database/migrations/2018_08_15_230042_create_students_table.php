<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('students')){
            Schema::create('students', function (Blueprint $table) {
                $table->increments('id');
                $table->string('fname');
                $table->string('mname');
                $table->string('lname');
                $table->string('gender');
                $table->string('class');
                $table->string('section')->nullable();
                $table->integer('age');
                $table->string('kebele');
                $table->timestamps();
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
        Schema::dropIfExists('students');
    }
}
