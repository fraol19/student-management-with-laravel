<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('payments')){
            Schema::create('payments', function (Blueprint $table) {
                $table->increments('id');
                $table->integer('student_id')->unsigned();
                $table->decimal('september',8,2)->default(0);
                $table->decimal('october',8,2)->default(0);
                $table->decimal('november',8,2)->default(0);
                $table->decimal('december',8,2)->default(0);
                $table->decimal('january',8,2)->default(0);
                $table->decimal('february',8,2)->default(0);
                $table->decimal('march',8,2)->default(0);
                $table->decimal('april',8,2)->default(0);
                $table->decimal('may',8,2)->default(0);
                $table->decimal('june',8,2)->default(0);
                $table->decimal('july',8,2)->default(0);
                $table->decimal('august',8,2)->default(0);
                $table->decimal('total',8,2)->default(0);
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
        Schema::dropIfExists('payments');
    }
}
