<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AssignTeacher extends Model
{
    public function teacher()
    {
        return $this->belongsTo(User::class, 'teacher_id', 'id');
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
    public function shift()
    {
        return $this->belongsTo(StudentShift::class, 'shift_id', 'id');
    }
    /* for assignment view purpos on teacher panel start  */
    public function assignments(){
        return $this->hasMany(StudentAssignment::class, 'class_id','class_id');
    }
    /* for assignment view purpos on teacher panel end */
    /* for student class routine view purpos on teacher panel start  */
    public function studentClassRoutines(){
        return $this->hasMany(StudentClassRoutine::class, 'class_id','class_id');
    }
    /* for student class routine view purpos on teacher panel end */
}
