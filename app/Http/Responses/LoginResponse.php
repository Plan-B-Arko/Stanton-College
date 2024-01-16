<?php

namespace App\Http\Responses;

use Illuminate\Support\Facades\Auth;
use Laravel\Fortify\Contracts\LoginResponse as LoginResponseContract;

class LoginResponse implements LoginResponseContract
{

    public function toResponse($request)
    {
        $role = Auth::user()->role;

        return $request->wantsJson()
            ? response()->json(['two_factor' => false])
            : redirect()->intended(
                match ($role) {
                    'Admin' => '/dashboard',
                    'Student' => '/student_dashboard',
                    default => '/',
                }



            );
    }
}
