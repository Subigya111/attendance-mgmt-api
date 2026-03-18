<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class StartClass extends Model
{
    public function teacher():BelongsTo{
        return $this->belongsTo(User::class,'teacher_id');
    }
}
