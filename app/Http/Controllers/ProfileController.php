<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $user = User::all()->find(auth()->user()->id);
    return view('dashboard.profile.index', [
      'user' => $user
    ]);
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    //
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
    //
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Models\User  $user
   * @return \Illuminate\Http\Response
   */
  public function show(User $user)
  {
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Models\User  $user
   * @return \Illuminate\Http\Response
   */
  public function edit(User $user)
  {
    return view('dashboard.profile.edit', [
      'user' => $user,
    ]);
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Models\User  $user
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, User $user)
  {
    // dd(Hash::check($request->old_password, $user->password));
    $rules = [
      'name' => 'required|max:255',
      // 'password' => 'required|min:5|max:255',
      'contact' => '',
      'address' => '',
      'social_media' => '',
    ];

    if ($request->username != $user->username) {
      $rules['username'] = 'required|min:5|max:255|unique:users';
    }
    if ($request->email != $user->email) {
      $rules['email'] = 'required|email|unique:users';
    }

    if ($request->old_password) {
      if (Hash::check($request->old_password, $user->password)) {
        $rules['password'] = 'required|min:5|max:255';
      } else {
        return redirect('/dashboard/user/' . $user->id . '/edit')->with('fail', 'Kata sandi lama salah!');
      }
    }

    $validatedData = $request->validate($rules);
    if ($request->old_password) {
      $validatedData['password'] = bcrypt($validatedData['password']);
    }

    User::where('id', $user->id)->update($validatedData);

    return redirect('/dashboard/user')->with('success', 'Profil berhasil diubah!');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Models\User  $user
   * @return \Illuminate\Http\Response
   */
  public function destroy(User $user)
  {
    //
  }
}
