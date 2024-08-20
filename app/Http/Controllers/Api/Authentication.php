<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Response;
use App\Http\Requests\userRequest;
use App\Http\Requests\userRequestLogin;
use App\Models\User;
use App\Http\Controllers\Controller;

class Authentication extends Controller
{
    public function register(userRequest $request)
    {
$user=User::create([
'name'=>$request->name,
'email'=>$request->email,
'password'=>Hash::make($request->password),
]);
$token = $user->createToken('token')->plainTextToken;
    
return response()->json(['user' => $user, 'token' => $token]); 
    }
     public function login(userRequestLogin $request){
        $user=User::where('email',$request->email)->first();
        if($user && !Hash::check($request->password,$user->password)){
            return response()->json(['error'=>'Invalid Email or Password']);
        }
        $token = $user->createToken('token')->plainTextToken;
    
    return response()->json(['user' => $user, 'token' => $token]);
     }
}
