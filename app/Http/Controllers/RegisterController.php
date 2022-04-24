<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class RegisterController extends Controller
{
  public function index()
  {
    return view('register.index');
  }

  public function store(Request $request)
  {
    $validatedData = $request->validate([
      'name' => 'required|max:255',
      'username' => 'required|min:5|max:255|unique:users',
      'email' => 'required|email|unique:users',
      'password' => 'required|min:5|max:255',
      'contact' => '',
      'address' => '',
      'social_media' => '',
    ]);

    $validatedData['password'] = bcrypt($validatedData['password']);

    User::create($validatedData);

    return redirect('/login')->with('success', 'Registrasi Berhasil!, Silakan Masuk');
  }
}
