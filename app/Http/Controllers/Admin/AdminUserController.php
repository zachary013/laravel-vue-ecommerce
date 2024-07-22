<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Inertia\Inertia;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class AdminUserController extends Controller
{
    /**
     * Display a listing of users.
     *
     * @return \Inertia\Response
     */
    public function index()
    {
        $users = User::all();
        return Inertia::render('Admin/User/Index', [
            'users' => $users,
        ]);
    }

    /**
     * Store a newly created user.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'isAdmin' => $request->isAdmin ?? 0,
        ]);

        return redirect()->route('admin.users.index'); // Ensure this matches the route name
    }

    /**
     * Display the specified user.
     *
     * @param \App\Models\User $user
     * @return \Inertia\Response
     */
    public function show(User $user)
    {
        return Inertia::render('Admin/User/Show', [
            'user' => $user,
        ]);
    }

    /**
     * Show the form for editing the specified user.
     *
     * @param \App\Models\User $user
     * @return \Inertia\Response
     */
    public function edit(User $user)
    {
        return Inertia::render('Admin/User/Edit', [
            'user' => $user,
        ]);
    }

    /**
     * Update the specified user in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\User $user
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'password' => 'nullable|string|min:8',
        ]);

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password ? Hash::make($request->password) : $user->password,
            'isAdmin' => $request->isAdmin ?? $user->isAdmin,
        ]);

        return redirect()->route('admin.users.index'); // Ensure this matches the route name
    }

    /**
     * Remove the specified user from storage.
     *
     * @param \App\Models\User $user
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('admin.users.index'); // Ensure this matches the route name
    }
}
