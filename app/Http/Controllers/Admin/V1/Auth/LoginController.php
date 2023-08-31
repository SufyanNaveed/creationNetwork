<?php

namespace App\Http\Controllers\Admin\V1\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Services\Auth\LoginService;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    protected $loginService;

    public function __construct(LoginService $loginService)
    {
        $this->loginService = $loginService;
    }
    public function login(LoginRequest $request)
    {
        $credentials = $request->only('email', 'password');

        if ($this->loginService->loginUser($credentials)) {
            
            return view('Admin.index');
           // return redirect()->intended('/Admin/index');
        }

        return redirect()->back()->withInput()->withErrors([
            'email' => 'Invalid credentials',
        ]);
    }
}
