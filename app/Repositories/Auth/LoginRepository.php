<?php

namespace App\Repositories\Auth;

use App\Models\User;
use App\Repositories\BaseRepository;

class LoginRepository extends BaseRepository
{

    public function __construct(User $user)
    {
        parent::__construct($user);
    }
}