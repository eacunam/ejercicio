<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Validator;
use App\Models\User;
use \stdClass;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{

    public function register(Request $resquest) {

        $validator = Validator::make($resquest->all(),[
            'name' => 'required|string',
            'email' => 'required|string',
            'password' => 'required|string'
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors());
        }

        $user = User::create([
            'name' => $resquest->name,
            'email' =>  $resquest->email,
            'password' =>  Hash::make($$resquest->password)
        ]);

        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json(['data' => $user,
                                'access_token' => $token,
                                'token_type' => 'Bearer',
        ]);
    }

    public function login(Request $resquest) {

        if (!Auth::attempt($resquest->only('email', 'password'))) {
            return response()->json(['message' => 'Sin autorizacion'], 500);
        }

        $user = User::where('emai;', $request['email'])->firstOrFail();
        $token = $user->createToken('auth_token')->plainTextToken;


        return response()->json([ 'message' => $user->name,
                                   'accessToken' => $token,
                                   'token_type' => 'Bearer',
                                   'user' => $user,
        ]);
    }
}
