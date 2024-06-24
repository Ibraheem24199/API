<?php

namespace App\Http\Controllers;

use App\Http\Controllers\commonController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class registerController extends commonController
{
    public function register(Request $request){
        try {
            $Required = ['userName', 'email', 'password'];
            for ($i = 0; $i < count($Required); $i++) {if ($request->{$Required[$i]} == null) {return response()->json(['error' => true, 'message' => $Required[$i] . ' Is Null']);}}

            // Email
            $email = DB::table('user')->where([['email', $request->email]])->first();
            if ($email != null) {return response()->json(['error' => true, 'message' => 'Email Is Already! Taken Try Another One']);}

            DB::table('user')->insert(['userName' => $request->userName, 'email' => $request->email, 'password' => Hash::make($request->password), 'time' => date('Y-m-d H:i:s')]);
            $userId = DB::getPdo()->lastInsertId();
            DB::table('user')->where('userId', $userId)->update(['code' => md5($userId)]);

            if ($request->file('image')) {
                foreach ($request->file('image') as $file) {
                    $imageExt = $file->getClientOriginalExtension();
                    $uniqueId = uniqid();
                    $imageName = $uniqueId . '.' . $imageExt;
                    $file->move(public_path() . '/uploads/uset/image', $imageName);
                    DB::table('user')->where('userId', $userId)->update(['image' => $imageName]);
                }
            }

            $Token = $this->generateToken($userId, 1);

            $account = DB::table('user')->select('userName', 'email', 'image')->where('userId', $userId)->first();
            $data = ['account' => $account];
            return response()->json(['error' => false, 'message' => 'Signup Successfully', 'token' => $Token, 'data' => $data]);

        } catch (\Throwable $th) {
            return response()->json(['error' => true, 'message' => $th->getmessage()]);
        }
    }
}
