<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Crypt;
use Carbon\Carbon;

class commonController extends Controller
{
    public function generateToken($userId, $days)
    {
        return Crypt::encryptString($userId . '|' . Carbon::now()->addDays($days));
    }
}
