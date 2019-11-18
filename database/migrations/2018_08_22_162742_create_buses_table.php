<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBusesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('buses')){
            Schema::create('buses', function (Blueprint $table) {
                $table->increments('id');
                $table->string('fname');
                $table->string('mname');
                $table->string('lname');
                $table->string('relation')->nullable();
                $table->string('kebele');
                $table->string('houesno')->nullable();
                $table->string('mobilephone')->nullable();
                $table->decimal('km',8,2)->default(0);
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
        Schema::dropIfExists('buses');
    }
}
