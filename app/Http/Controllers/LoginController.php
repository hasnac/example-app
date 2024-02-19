<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function login()
    {
        $data['title'] = 'Login';
        return view('login', $data);
    }
    public function login_action(Request $request)
    {
        $cek = $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);
        if (Auth::attempt(["username" => $cek["username"], "password" => $cek["password"]])) {
            $request->session()->regenerate();

            if (auth()->user()->role == 'admin') {

                return redirect()->intended('dashboard');
            } elseif (auth()->user()->role == 'staff') {
                return redirect()->intended('dashboard');
            } else {
                return redirect()->intended('/');
            }
            return redirect()->intended('/dashboard');
        }
        return back()->withErrors([
            'password' => 'Wrong username or password',
        ]);
    }
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }

    public function create()
    {
        $data['title'] = 'Register';
        return view('register', $data);
    }
    public function register(Request $request)
    {
        $credentials = $request->validate([
            'name' => 'required',
            'nik' => 'required|unique:users',
            'username' => 'required|unique:users',
            'password' => 'required',
            'password_confirm' => 'required|same:password',
        ], [
            'name.required' => 'Required',
            'nik.required'  => 'Required',
            'nik.unique'  => 'Required',
            'username.required'  => 'Required',
            'username.unique'  => 'Required',
            'password.required' => 'Password harus diisi',
            'password_confirm.required' => 'Password harus diisi'

        ]);

        $user = User::create($credentials);
        return redirect()->route('login')->with('success', 'Registration success. Please login!');
    }
    public function index()
    {
        $data = User::orderBy('id_user', 'asc')
            ->where('role', 'staff')
            ->paginate(5);
        return view('petugas.index', compact('data'));
    }
    public function user()
    {
        $data = User::orderBy('id_user', 'asc')
            ->where('role', 'user')
            ->paginate(5);
        return view('user.index', compact('data'));
    }
}
