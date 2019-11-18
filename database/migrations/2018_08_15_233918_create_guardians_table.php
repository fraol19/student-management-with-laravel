<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateParentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('guardians')){
            Schema::create('guardians', function (Blueprint $table) {
                $table->increments('id');
                $table->string('fname');
                $table->string('mname');
                $table->string('lname');
                $table->string('job')->nullable();
                $table->string('office')->nullable();
                $table->string('kebele');
                $table->string('houseNo')->nullable();
                $table->string('housephone')->nullable();
                $table->string('mobilephone')->nullable();
                $table->integer('student_id')->unsigned();
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
        Schema::dropIfExists('guardians');
    }
}
