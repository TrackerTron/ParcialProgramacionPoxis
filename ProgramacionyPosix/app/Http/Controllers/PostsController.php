<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\User;

class PostsController extends Controller
{

    
    public function register(Request $request)
    {
        $user = new User();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = bcrypt($request->input('password'));
        $user->save();

        return redirect("/");
    }
}
