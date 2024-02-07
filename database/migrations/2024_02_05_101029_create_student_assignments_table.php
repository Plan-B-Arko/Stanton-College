<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentAssignmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_assignments', function (Blueprint $table) {
            $table->id();
            $table->string('assignment_title');
            $table->integer('group_id')->nullable();
            $table->integer('class_id')->nullable();
            $table->integer('year_id')->nullable();
            $table->integer('month_id')->nullable();
            $table->integer('semester_id')->nullable();
            $table->integer('batch_id')->nullable();
            $table->integer('shift_id')->nullable();
            $table->integer('subject_id')->nullable();
            $table->date('assignment_start_date')->nullable();
            $table->date('assignment_end_date')->nullable();
            $table->integer('assignment_marks')->nullable();
            $table->string('document')->nullable();
            $table->string('picture')->nullable();
            $table->text('description')->nullable();
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
        Schema::dropIfExists('student_assignments');
    }
}
