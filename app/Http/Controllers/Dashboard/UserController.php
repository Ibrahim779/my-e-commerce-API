<?php

namespace App\Http\Controllers\Dashboard;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    /**
     * @return mixed
     */
    public function index()
    {
      $users = User::get();
      return view('dashboard.user.index', compact('users'));
    }
    public function create()
    {
        return view('dashboard.user.create');
    }
    public function store()
    {

    }
    public function edit(User $user)
    {
        return view('dashboard.user.edit', compact('user'));
    }
    /**
     * @param User $user
     * @throws \Exception
     */
    public function destroy(User $user)
    {
       $user->delete();
    }
}
