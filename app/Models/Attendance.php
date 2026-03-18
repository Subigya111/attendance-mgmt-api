<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Attendance extends Model
{
    public function student():BelongsTo{
        return $this->belongsTo(StartClass::class,'class_id');
    }
    public function studentattendance():BelongsTo{
        return $this->belongsTo(User::class,'student_id');
    }
}
