<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentClassRoutine extends Model
{
    use HasFactory;
     /* for studnet class routine view purpos on teacher panel start  */
     public function teacher(){
        return $this->belongsTo(AssignTeacher::class, 'class_id','class_id');
    }
    /* for studnet class routine view purpos on teacher panel end */
    public function student()
    {
        return $this->belongsTo(User::class, 'student_id', 'id');
    }
   
    public function student_class()
    {
        return $this->belongsTo(StudentClass::class, 'class_id', 'id');
    }
    public function student_year()
    {
        return $this->belongsTo(StudentYear::class, 'year_id', 'id');
    }
    public function group()
    {
        return $this->belongsTo(StudentGroup::class, 'group_id', 'id');
    }
    public function student_batch()
    {
        return $this->belongsTo(StudentBatch::class, 'batch_id', 'id');
    }
    public function student_semester()
    {
        return $this->belongsTo(StudentSemester::class, 'semester_id', 'id');
    }
    public function student_month()
    {
        return $this->belongsTo(StudentMonth::class, 'month_id', 'id');
    }
    public function shift()
    {
        return $this->belongsTo(StudentShift::class, 'shift_id', 'id');
    }
}
