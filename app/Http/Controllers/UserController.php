<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $users = User::all();
        return view('users.index', compact('users'));
    }

    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        if (auth()->attempt(['username' => $request->username, 'password' => $request->password])) {
            return redirect()->route('dashboard');
        } else {
            return redirect()->back()->with('error', 'Username atau Password Salah');
        }
    }

    public function logout() {

        auth()->logout();
        return redirect()->route('login');
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        // dd($request->all());
        $validated = $request->validate([
            'username' => 'required|unique:users|max:255',
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users|max:255',
            'password' => 'required|string|min:8|confirmed',
            'role' => 'required|string|max:255',
        ]);

        if ($request->has('password')) {
            $validated['password'] = bcrypt($request->password);
        }

        try {
            User::create($validated);
            return redirect()->route('users.index')->with('success', 'User Berhasil Ditambahkan');
        } catch (\Throwable $th) {
            return redirect()->route('users.index')->with('error', 'User Gagal Ditambahkan'. $th);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        //
        return view('users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        //
        $validated = $request->validate([
            'username' => 'required|max:255|unique:users,username,'. $user->id,
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,'. $user->id,
            'password' => 'nullable|string|min:8|confirmed',
            'role' => 'required|string|max:255',
        ]);

        $data = [
            'username' => $request->username,
            'name' => $request->name,
            'email' => $request->email,
            'role' => $request->role
        ];

        $existingUser = User::where('username', $request->username)->first();
        if ($existingUser && $existingUser->id !== $user->id) {
            return redirect()->route('users.index')->with('error', 'Username sudah terdaftar');
        }


        if ($request->filled('password')) {
            $data['password'] = bcrypt($request->password);
        }

        try {
            $user->update($data);
            return redirect()->route('users.index')->with('success', 'User Berhasil Diubah');
        } catch (\Throwable $th) {
            return redirect()->route('users.index')->with('error', 'User Gagal Diubah'. $th);
        }
        
    }



    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        try {
            $user->delete();
            return redirect()->route('users.index')->with('success', 'User Berhasilh Dihapus');
        } catch (\Throwable $th) {
            return redirect()->route('users.index')->with('error', 'User Gagal Dihapus');
        }
    }
}
