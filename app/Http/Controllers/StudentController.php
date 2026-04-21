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
        $studentId=auth()->id();
        $classId=$start_class->id;
        $exists=Attendance::where('student_id',$studentId)
                            ->where('class_id',$classId)
                            ->exists();
        if ($exists){
            return response()->json([
                'message'=>'Attendance already marked'
            ],400);
        }
        Attendance::create([
            'class_id'=>$classId,
            'student_id'=>$studentId
            
        ]);
        return response()->json([
                'message'=>'Successfull!!'
        ],200);


    }
    public function showMyAttendance(){
        $studentId=auth()->id();
        $attendance=Attendance::where('student_id',$studentId)->get();
        return response()->json([
            'attendance'=>$attendance
        ],200);
    }
}
