<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Lcobucci\JWT\Parser;
use Illuminate\Support\Facades\Validator;





class UserController extends Controller
{
    public function Register(Request $request){

        $validation = Validator::make($request->all(),[
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed'
        ]);

        if($validation->fails())
            return $validation->errors();

        return $this -> createUser($request);
        
    }

    private function createUser($request){
        $user = new User();
        $user -> name = $request -> post("name");
        $user -> email = $request -> post("email");
        $user -> password = Hash::make($request -> post("password"));   
        $user -> save();
        return $user;
    }

    public function ValidateToken(Request $request){
        return auth('api')->user();
    }

    public function Logout(Request $request){
        $request->user()->token()->revoke();
        return ['message' => 'Token Revoked'];
        
        
    }

    public function changePassword(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'old_password'=>'required',
            'new_password'=>'required|min:6|confirmed',
        ]);

        if ($validation->fails()) {
            return response()->json(['error' => $validation->errors()], 400);
        }

        $user = auth('api')->user();

        if (!Hash::check($request->old_password, $user->password)) {
            return response()->json(['error' => 'La contraseña actual no es válida.'], 400);
        }

        $user->password = Hash::make($request->new_password);
        $user->save();

        return response()->json(['message' => 'Contraseña cambiada con éxito.']);
    }
 
     
}
