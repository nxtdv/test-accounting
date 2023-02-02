<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;


class AuthController extends Controller
{
    public function login(Request $request)
    {
        $credentials = Validator::make($request->all(), [
            'email' => ['required', 'email', 'exists:users'],
            'password' => ['required', 'min:8'],
        ]);

        if(!$credentials->fails()){
            $user = User::where('email', $request->email)->first();

            if (Hash::check($request->password, $user->password)) {
                $request->session()->regenerate();
                return Response([
                    "status" => 200,
                    "user" => $user
                ]);
            }
            return Response([
                "status" => 422,
                "error" => ["password"=> "wrong password"]
            ]);
        } else {
            return Response([
                "status" => 422,
                "error" => $credentials->errors()
            ]);
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Response([
            "status" => 200,
            "message" => "Vous vous êtes déconnecté(e)."
        ]);
    }

    public function register(Request $request)
    {
        $credentials = Validator::make($request->all(), [
            'firstname' => ['required', 'string', 'max:255'],
            'lastname' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8'],
        ]);

        if(!$credentials->fails()){
            $user = User::create([
                'firstname' => $request['firstname'],
                'lastname' => $request['lastname'],
                'email' => $request['email'],
                'password' => Hash::make($request['password']),
            ]);

            Session::push('user', [
                'firstname' => $request['firstname'],
                'lastname' => $request['lastname'],
                'name' => $request['name'],
                'email' => $request['email']
            ]);

            return Response([
                "status" => 201,
                "user" => $user
            ]);
        } else {
            return Response([
                "status" => 422,
                "error" => $credentials->errors()
            ]);
        }
    }

    public function dashboard(): JsonResponse
    {
        return response()->json([
            "success" => "Bienvenue"
        ]);
    }
}
