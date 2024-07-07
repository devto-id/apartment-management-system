<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::get();

        return view('user.index', [
            "_title" => "User",
            "_menu" => "user",
            "_breadcrumbs" => [
                [route('dashboard.index'), "Dashboard"],
                [route('user.index'), "User"],
            ],
            "users" => $users
        ]);
    }

    public function create()
    {
        return view('user.form', [
            "_title" => "New User",
            "_menu" => "user",
            "_breadcrumbs" => [
                [route('dashboard.index'), "Dashboard"],
                [route('user.index'), "User"],
                [route('user.create'), "New User"],
            ],
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            "name" => "required",
            "email" => "required|email|unique:users,email",
            "password" => "required",
            "role" => "required|in:sales,manager"

        ]);

        User::create($validated);

        return redirect()->route('user.index')
            ->with('message', [
                ["success", "User created successfully"]
            ]);
    }

    public function edit(User $user)
    {
        return view('user.form', [
            "_title" => "New User",
            "_menu" => "user",
            "_breadcrumbs" => [
                [route('dashboard.index'), "Dashboard"],
                [route('user.index'), "User"],
                [route('user.create'), "New User"],
            ],
            "data" => $user
        ]);
    }

    public function update(Request $request, User $user)
    {
        $validated = $request->validate([
            "name" => "required",
            "email" => "required|email|unique:users,email," . $user->id,
            "role" => "required|in:sales,manager"
        ]);

        $user->update($validated);

        return redirect()->route('user.index')
            ->with('message', [
                ["success", "User updated successfully"]
            ]);
    }

    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('user.index')
            ->with('message', [
                ["success", "User deleted successfully"]
            ]);
    }
}
