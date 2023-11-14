<?php

namespace App\Http\Controllers\API\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    // This code should be placed in the `App\Http\Controllers\API\Auth\LoginController` class

public function login(Request $request)
{
    // API Login Handling
    try {
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);
    } catch (ValidationException $e) {
        return response()->json(['errors' => $e->errors()], 422);
    }

    if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
        $user = Auth::user();
        $token = $user->createToken('AuthToken')->accessToken;

        return response()->json(['user' => $user, 'access_token' => $token]);
    } else {
        return response()->json(['error' => 'Unauthorized'], 401);
    }

    // Traditional Web-Based Login Handling (if applicable)
    $credenciales = $request->only(["email", "password"]);
    if (!Auth::attempt($credenciales)) {
        return redirect("/")->with("error", true);
    }
    return redirect("/");
}

}
