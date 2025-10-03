<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use App\Notifications\TwoFactorCodeNotification;
use App\Models\Reader;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'phone' => ['required', 'string', 'max:20'],
            'address' => ['required', 'string', 'max:255'],

            // Datos de lector
            'birth_date' => ['nullable', 'date'],
            'gender' => ['nullable', 'in:masculino,femenino,mestizo,otro'],
            'dpi' => ['required', 'unique:readers,dpi'],
            'occupation' => ['nullable', 'string'],
           'ethnicity' => ['nullable', 'in:maya,ladina,garifuna,xinca,mestizo,otro'],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'password' => Hash::make($request->password),
        ]);

        Reader::create([
            'user_id' => $user->id,
            'birth_date' => $request->birth_date,
            'gender' => $request->gender,
            'dpi' => $request->dpi,
            'occupation' => $request->occupation,
            'ethnicity' => $request->ethnicity,
        ]);

        event(new Registered($user));

        Auth::login($user);

        // 🔹 Generamos y enviamos el código
        $user->regenerateTwoFactorCode();
        $user->notify(new TwoFactorCodeNotification());

        // 🔹 Redirigimos al flujo de verificación (ya tienes esta vista y rutas listas)
        return redirect()->route('verify')->with('success', 'Te enviamos un código a tu correo.');
    }
}
