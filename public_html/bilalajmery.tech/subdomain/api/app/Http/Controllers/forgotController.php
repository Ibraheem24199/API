<?php

namespace App\Http\Controllers;

use App\Http\Controllers\commonController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Mail\otp;

class forgotController extends commonController
{
    public function forgot(Request $request){
        try {
            $Required = ['email'];
            for ($i = 0; $i < count($Required); $i++) {if ($request->{$Required[$i]} == null) {return response()->json(['error' => true, 'message' => $Required[$i] . ' Is Null']);}}

            $email = $request->email;
            $user = DB::table('user')->whereemail($email)->first();

            if ($user) {

                $otp = mt_rand(100000, 999999);
                DB::table('user')->where('userId', $user->userId)->update(['otp' => $otp]);
                    
                $detail = ['otp' => $otp]; mail::to($email)->send(new otp($detail));

                return response()->json(['error' => false, 'message' => 'Account Found Successfully', 'code' => $user->code]);

            } else {
                return response()->json(['error' => true, 'message' => 'Wrong email, try another one!']);
            }

        } catch (\Throwable $th) {
            return response()->json(['error' => true, 'message' => $th->getmessage()]);
        }
    }
    public function verify(Request $request){
        try {
            $Required = ['code' , 'otp'];
            for ($i = 0; $i < count($Required); $i++) {if ($request->{$Required[$i]} == null) {return response()->json(['error' => true, 'message' => $Required[$i] . ' Is Null']);}}

            $code = $request->code;
            $otp = $request->otp;
            $user = DB::table('user')->where([['code', $code],['otp', $otp]])->first();

            if ($user) {
                return response()->json(['error' => false, 'message' => 'OTP Valid', 'code' => $request->code]);
            } else {
                return response()->json(['error' => true, 'message' => 'Invalid Otp!']);
            }

        } catch (\Throwable $th) {
            return response()->json(['error' => true, 'message' => $th->getmessage()]);
        }
    }

    public function password(Request $request){
        try {
            $Required = ['code' , 'password'];
            for ($i = 0; $i < count($Required); $i++) {if ($request->{$Required[$i]} == null) {return response()->json(['error' => true, 'message' => $Required[$i] . ' Is Null']);}}

            $code = $request->code;
            DB::table('user')->where([['code', $code]])->update(['password' => hash::make($request->password)]);

            return response()->json(['error' => false, 'message' => 'Password Changed']);


        } catch (\Throwable $th) {
            return response()->json(['error' => true, 'message' => $th->getmessage()]);
        }
    }
    public function resend(Request $request){
        try {
            $Required = ['code'];
            for ($i = 0; $i < count($Required); $i++) {if ($request->{$Required[$i]} == null) {return response()->json(['error' => true, 'message' => $Required[$i] . ' Is Null']);}}

            $otp = mt_rand(100000, 999999);
            DB::table('user')->where('code', $request->code)->update(['otp' => $otp]);

            $email = DB::table('user')->wherecode($request->code)->pluck('email')->first();
            $detail = ['otp' => $otp]; mail::to($email)->send(new otp($detail));

            return response()->json(['error' => false, 'message' => 'OTP Resend']);


        } catch (\Throwable $th) {
            return response()->json(['error' => true, 'message' => $th->getmessage()]);
        }
    }
}
