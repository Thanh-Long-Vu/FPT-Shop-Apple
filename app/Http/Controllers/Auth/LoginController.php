<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;
class LoginController extends Controller
{
    use AuthenticatesUsers;

    protected function authenticated(Request $request, $user)
    {
        if($user) {
            $role = $user->role->name_role;
            $msg = array(
                'status' => true,
                'text' => 'Login success',
                'role' => $role
            );
            return response()-> json($msg);
        }
    }

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
