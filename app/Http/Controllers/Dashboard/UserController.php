<?php

namespace App\Http\Controllers\Dashboard;


use App\City;
use App\Traits\SaveData\UserSaveData;
use App\User;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    use UserSaveData;
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
        $cities = City::all();
        return view('dashboard.user.create', compact('cities'));
    }
    public function store()
    {
        $this->saveData(new User());
        return redirect()->route('users.index');
    }
    public function edit(User $user)
    {
        $cities = City::all();
        return view('dashboard.user.edit', compact('user', 'cities'));
    }
    public function update(User $user)
    {
        $this->saveData($user);
        return redirect()->route('users.index');
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
