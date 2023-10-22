<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ApiController
{
    public function createToken(Request $request)
    {
        $user = User::where('email', $request->email)->first();

        return response()->json([
            'token' => $user->createToken($request->device_name)->plainTextToken
        ]);

    }

}
