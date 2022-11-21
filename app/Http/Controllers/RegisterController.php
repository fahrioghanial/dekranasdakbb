<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\WebViewerCount;
use Cviebrock\EloquentSluggable\Services\SlugService;

class RegisterController extends Controller
{
  public function index()
  {
    if (url()->previous() == url("/") . "/") {
      WebViewerCount::first()->increment('count');
    }

    return view('register.index');
  }

  public function store(Request $request)
  {
    $validatedData = $request->validate([
      'name' => 'required|max:255',
      'username' => 'required|min:5|max:255|unique:users',
      'email' => 'required|email|unique:users',
      'password' => 'required|min:5|max:255|confirmed',
      'contact' => 'required',
      'address' => 'required',
      'rt' => 'required|numeric',
      'rw' => 'required|numeric',
      'noktp' => 'required|numeric|unique:users',
      'kodepos' => 'required|numeric',
      'profile_picture' => 'image|file|required',
      'kecamatan' => 'required',
      'kelurahan_desa' => 'required',
    ]);

    $validatedData['profile_picture'] = $request->file('profile_picture')->store('profile-pictures');
    $validatedData['password'] = bcrypt($validatedData['password']);

    User::create($validatedData);

    return redirect('/login')->with('success', 'Registrasi Berhasil!, Silakan Masuk');
  }

  public function addUser(Request $request)
  {
    $validatedData = $request->validate([
      'name' => 'required|max:255',
      'username' => 'required|min:5|max:255|unique:users',
      'email' => 'required|email|unique:users',
      // 'password' => 'required|min:5|max:255|confirmed',
      'contact' => 'required',
      'address' => 'required',
      'rt' => 'required|numeric',
      'rw' => 'required|numeric',
      'noktp' => 'required|numeric|unique:users',
      'kodepos' => 'required|numeric',
      'profile_picture' => 'image|file|required',
      'kecamatan' => 'required',
      'kelurahan_desa' => 'required',
      'instagram' => [function ($attribute, $value, $fail) {
        if (str_starts_with($value, '@')) {
          $fail('Pastikan format sesuai dengan contoh!');
        }
      }],
      'facebook' => [function ($attribute, $value, $fail) {
        if (str_starts_with($value, '@')) {
          $fail('Pastikan format sesuai dengan contoh!');
        }
      }],
      'whatsapp' => [function ($attribute, $value, $fail) {
        if ($value != null) {
          if (!is_numeric($value)) {
            $fail('Atribut ini harus berupa angka!');
          } else if (!str_starts_with($value, '0')) {
            $fail('Pastikan format sesuai dengan contoh!');
          }
        }
      }],
    ]);

    $validatedData['profile_picture'] = $request->file('profile_picture')->store('profile-pictures');
    // $validatedData['password'] = bcrypt($validatedData['password']);
    $validatedData['password'] = bcrypt($validatedData['noktp']);
    $validatedData['status_keanggotaan'] = true;

    User::create($validatedData);

    return redirect('/dashboard/adminuser/')->with('success', 'Anggota Berhasil Ditambahkan');
  }

  public function checkUsername(Request $request)
  {
    $username = SlugService::createSlug(User::class, 'username', $request->name);
    return response()->json(['username' => $username]);
  }
}
