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
                    'Admin' => '/admin_dashboard',
                    'Student' => '/student_dashboard',
                    'Teacher' => '/teacher_dashboard',
                    'Parents' => '/parents_dashboard',
                    default => '/login',
                }
            );
    }
}


