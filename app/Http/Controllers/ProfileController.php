<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

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
    if ($user->id != auth()->user()->id) {
      abort(403);
    }
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
    if ($user->id != auth()->user()->id) {
      abort(403);
    }
    // dd(Hash::check($request->old_password, $user->password));
    $rules = [
      'name' => 'required|max:255',
      // 'password' => 'required|min:5|max:255',
      'contact' => 'required',
      'address' => 'required',
      'rt' => 'required|numeric',
      'rw' => 'required|numeric',
      'kodepos' => 'required|numeric',
      // 'profile_picture' => 'image|file|required',
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
    ];

    if ($request->username != $user->username) {
      $rules['username'] = 'required|min:5|max:255|unique:users';
    }
    if ($request->email != $user->email) {
      $rules['email'] = 'required|email|unique:users';
    }
    if ($request->noktp != $user->noktp) {
      $rules['noktp'] = 'required|numeric|unique:users';
    }

    if ($request->profile_picture) {
      $rules['profile_picture'] = 'image|file|required';
    }

    if ($request->old_password) {
      if (Hash::check($request->old_password, $user->password)) {
        $rules['password'] = 'required|min:5|max:255|confirmed';
      } else {
        return redirect('/dashboard/user/' . $user->id . '/edit')->with('fail', 'Kata sandi lama salah!');
      }
    }

    $validatedData = $request->validate($rules);

    if ($request->old_password) {
      $validatedData['password'] = bcrypt($validatedData['password']);
    }

    if ($request->oldImage != "profile-pictures/contoh-foto.png" && $request->profile_picture) {
      Storage::delete($request->oldImage);
    }
    if ($request->profile_picture) {
      $validatedData['profile_picture'] = $request->file('profile_picture')->store('profile-pictures');
    } else $validatedData['profile_picture'] = $request->oldImage;

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

  public function editUser(Request $request, User $user)
  {
    $rules = [
      'name' => 'required|max:255',
      // 'password' => 'required|min:5|max:255',
      'contact' => 'required',
      'address' => 'required',
      'rt' => 'required|numeric',
      'rw' => 'required|numeric',
      'kodepos' => 'required|numeric',
      // 'profile_picture' => 'image|file|required',
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
    ];

    if ($request->username != $user->username) {
      $rules['username'] = 'required|min:5|max:255|unique:users';
    }
    if ($request->email != $user->email) {
      $rules['email'] = 'required|email|unique:users';
    }
    if ($request->noktp != $user->noktp) {
      $rules['noktp'] = 'required|numeric|unique:users';
    }

    if ($request->profile_picture) {
      $rules['profile_picture'] = 'image|file|required';
    }

    if ($request->old_password) {
      if (Hash::check($request->old_password, $user->password)) {
        $rules['password'] = 'required|min:5|max:255|confirmed';
      } else {
        return redirect('/dashboard/user/' . $user->id . '/edit')->with('fail', 'Kata sandi lama salah!');
      }
    }

    $validatedData = $request->validate($rules);

    if ($request->old_password) {
      $validatedData['password'] = bcrypt($validatedData['password']);
    }

    if ($request->oldImage != "profile-pictures/contoh-foto.png" && $request->profile_picture) {
      Storage::delete($request->oldImage);
    }
    if ($request->profile_picture) {
      $validatedData['profile_picture'] = $request->file('profile_picture')->store('profile-pictures');
    } else $validatedData['profile_picture'] = $request->oldImage;

    User::where('id', $user->id)->update($validatedData);

    return redirect('/dashboard/adminuser')->with('success', 'Profil anggota berhasil diubah!');
  }

  public function deleteUser(User $user)
  {
    if ($user->profile_picture != "article-covers/contoh-cover.jpg") {
      Storage::delete($user->profile_picture);
    }

    User::destroy($user->id);

    return redirect('/dashboard/adminuser')->with('success', 'Anggota berhasil dihapus!');
  }
}
