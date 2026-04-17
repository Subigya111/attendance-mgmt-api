<?php

namespace App\Http\Controllers;

use App\Http\Requests\ClassRequest;
use App\Models\StartClass;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
class TeacherController extends Controller
{
    public function createClass(ClassRequest $request){
        $validated=$request->validated();
        $token=Str::random(23);

        StartClass::create([
            'subject'=>$validated['subject'],
            'semester'=>$validated['semester'],
            'teacher_id'=>auth()->id(),
            'classToken'=>$token
            
        ]);
        return response()->json([
            'classToken'=>$token
        ]);
    }

    public function showAllAttendance(StartClass $startClass){
        $attendance = $startClass->attendance()
          ->with('student:id,name,email')
          ->get();
          return response()->json([
            'attendance' => $attendance
            ], 200);
    }

}

