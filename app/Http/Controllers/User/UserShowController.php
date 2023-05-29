<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserShowController extends Controller
{
    public function __invoke(User $user)
    {
        return view('user.show', compact('user'));
    }
}
