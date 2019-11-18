<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePreclassesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('preclasses')){
            Schema::create('preclasses', function (Blueprint $table) {
                $table->increments('id');
                $table->string('school_name');
                $table->string('behaviour')->nullable();
                $table->string('preclass');
                $table->decimal('gpa',8,2)->default(0);
                $table->mediumText('info')->nullable();
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
        Schema::dropIfExists('preclasses');
    }
}
