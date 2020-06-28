<?php

namespace App\Http\Controllers\Dashboard\API;

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
      return User::get();
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
