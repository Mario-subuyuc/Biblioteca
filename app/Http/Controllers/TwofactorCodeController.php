<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Notifications\TwoFactorCodeNotification;
use Illuminate\Support\Facades\Auth;

class TwofactorCodeController extends Controller
{
     public function verify()
    {
        return view("auth.verify");
    }

    public function resend()
    {
        $user = Auth::user();

        if ($user) {
            $user->regenerateTwoFactorCode();
            $user->notify(new TwoFactorCodeNotification());

            return back()->with("success", "El código ha sido reenviado.");
        }

        return back()->with("error", "No se pudo reenviar el código.");
    }

    public function verifyPost(Request $request){
        $request->validate([
            "code"=>"required",
        ]);

        $user = auth()->user();
        if($user->two_factor_code !== $request->code){
            return back()->with("error", "Código incorrecto");

        }

        if($user->two_factor_expires_at < now()){
            return back()->with("error", "Código expirado");

        }

        $user->clearTwoFactorCode();

        return redirect()->route("dashboard");
    }
}
