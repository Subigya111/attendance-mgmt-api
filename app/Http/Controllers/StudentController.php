<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use Illuminate\Http\Request;
use App\Models\StartClass;

class StudentController extends Controller
{
    public function markAttendance(){
        $token=request()->classtoken;
        $start_class = StartClass::where('classToken', $token)->first();
        if (!$start_class){
            return response()->json([
                'message'=>'Could not find the class'
            ],404);
        }
        Attendance::create([
            'class_id'=>$start_class->id(),
            'student_id'=>auth()->id()
        ]);
    }
    public function showMyAttendance(){

    }
}
