<?php

namespace App\Http\Controllers;

use App\Http\Controllers\commonController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class loginController extends commonController
{
    public function login(Request $request){
        try {
            $Required = ['email', 'password'];
            for ($i = 0; $i < count($Required); $i++) {if ($request->{$Required[$i]} == null) {return response()->json(['error' => true, 'message' => $Required[$i] . ' Is Null']);}}

            $email = $request->email;
            $user = DB::table('user')->whereemail($email)->first();

            if ($user) {
                if (!Hash::check($request->password, $user->password)) {
                    return response()->json(['error' => true, 'message' => 'Wrong password, try another one!']);
                } else {

                    $Token = $this->generateToken($user->userId, 1);
                    unset($user->userId);
                    $data = ['account' => $user];
                    return response()->json(['error' => false, 'message' => 'Signin Successfully', 'token' => $Token, 'data' => $data]);
                }
            } else {
                return response()->json(['error' => true, 'message' => 'Wrong email, try another one!']);
            }

        } catch (\Throwable $th) {
            return response()->json(['error' => true, 'message' => $th->getmessage()]);
        }
    }
}
