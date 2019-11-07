<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function users(User $user)
    {
        $users = $user->all();

        return response()->json($users);
    }
}
