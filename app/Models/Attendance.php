<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Attendance extends Model
{
    public $timestamps=false;
    protected $fillable = [
        'class_id',
        'student_id'
    ];
    public function student():BelongsTo{
        return $this->belongsTo(StartClass::class,'class_id');
    }
    public function studentattendance():BelongsTo{
        return $this->belongsTo(User::class,'student_id');
    }
}
