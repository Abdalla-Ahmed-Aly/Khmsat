<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\userRequest;
use App\Http\Requests\userRequestLogin;
use App\Models\User;
use Hash;
use Illuminate\Http\Request;

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
