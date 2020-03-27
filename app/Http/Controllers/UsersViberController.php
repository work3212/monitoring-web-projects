<?php

namespace App\Http\Controllers;

use App\Models\ViberUser;
use Illuminate\Http\Request;

class UsersViberController extends Controller
{
    public function index()
    {
        $users = ViberUser::all();
        return view('cms.users.index', compact('users'));
    }
}
