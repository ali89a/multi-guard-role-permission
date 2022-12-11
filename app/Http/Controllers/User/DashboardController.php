<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;

use App\Repository\Interfaces\UserInterface;

class DashboardController extends Controller
{

    protected $userRepo;

    public function __construct(UserInterface $user)
    {
        $this->userRepo = $user;
    }

    public function index()
    {
        return view('user.dashboard.dashboard');
    }
}
