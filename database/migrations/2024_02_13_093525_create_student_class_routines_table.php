<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentClassRoutinesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_class_routines', function (Blueprint $table) {
            $table->id();
            $table->integer('group_id')->nullable();
            $table->integer('class_id')->nullable();
            $table->integer('year_id')->nullable();
            $table->integer('month_id')->nullable();
            $table->integer('semester_id')->nullable();
            $table->integer('batch_id')->nullable();
            $table->integer('shift_id')->nullable();
            $table->string('routine_file')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('student_class_routines');
    }
}
