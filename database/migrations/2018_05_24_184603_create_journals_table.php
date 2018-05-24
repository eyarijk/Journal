<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJournalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('journals', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('teacher_id')->unsigned();
            $table->integer('subject_id')->unsigned();
            $table->integer('student_id')->unsigned();
            $table->string('day_1')->nullable();
            $table->string('day_2')->nullable();
            $table->string('day_3')->nullable();
            $table->string('day_4')->nullable();
            $table->string('day_5')->nullable();
            $table->string('day_6')->nullable();
            $table->string('day_7')->nullable();
            $table->string('day_8')->nullable();
            $table->string('day_9')->nullable();
            $table->string('day_10')->nullable();
            $table->string('day_11')->nullable();
            $table->string('day_12')->nullable();
            $table->string('day_13')->nullable();
            $table->string('day_14')->nullable();
            $table->string('day_15')->nullable();
            $table->string('day_16')->nullable();
            $table->string('day_17')->nullable();
            $table->string('day_18')->nullable();
            $table->string('day_19')->nullable();
            $table->string('day_20')->nullable();
            $table->string('day_21')->nullable();
            $table->string('day_22')->nullable();
            $table->string('day_23')->nullable();
            $table->string('day_24')->nullable();
            $table->string('day_25')->nullable();
            $table->string('day_26')->nullable();
            $table->string('day_27')->nullable();
            $table->string('day_28')->nullable();
            $table->string('day_29')->nullable();
            $table->string('day_30')->nullable();
            $table->string('day_31')->nullable();
            $table->integer('year');
            $table->integer('month');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('journals');
    }
}
