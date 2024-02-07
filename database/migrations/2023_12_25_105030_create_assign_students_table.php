<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAssignStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assign_students', function (Blueprint $table) {
            $table->id();
            $table->integer('student_id')->comment('user_id=student_id');
            $table->integer('roll')->nullable();
            $table->integer('class_id');
            $table->integer('month_id')->nullable();
            $table->integer('semester_id')->nullable();
            $table->integer('batch_id')->nullable();
            $table->integer('year_id');
            $table->integer('group_id')->nullable();
            $table->integer('shift_id')->nullable();
            $table->date('registered_date_semester_wise')->nullable();
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
        Schema::dropIfExists('assign_students');
    }
}
