<?php 

namespace App\Services\Auth;
use App\Repositories\Auth\LoginRepository;
use Auth;

class LoginService {
    
    protected $loginRepository;

    public function __construct(LoginRepository $loginRepository)
    {
        $this->loginRepository = $loginRepository;
    }


    public function loginUser(array $credentials)
    {
        if (Auth::attempt($credentials)) {
            return true;
        }
        return false;
    }
}