<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function makeTeacher(Request $request){  
        $userId=$request->user_id;
        $user=User::find($userId);
        if(!$user){
            return response()->json([
                'message'=>'User not found'
            ],404);
            
        }
        
        $user->role='teacher';
        $user->save();
        return response()->json([
            'message'=>'User promoted to teacher successfully',
            'user'=>$user
        ],200);
        
    }
}
