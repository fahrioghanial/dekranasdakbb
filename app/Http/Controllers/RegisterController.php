<?php

namespace App\Http\Controllers;

use App\Models\Identity;
use App\Models\Territory;
use App\Models\UpdateHistory;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\WebViewerCount;
use Cviebrock\EloquentSluggable\Services\SlugService;

class RegisterController extends Controller
{
  public function index()
  {
    if (url()->previous() == url("/") . "/") {
      if (WebViewerCount::first() == null) {
        $data['count'] = 1;
        WebViewerCount::create($data);
      } else {
        WebViewerCount::first()->increment('count');
      }
    }

    return view('register.index');
  }

  public function store(Request $request)
  {
    $validatedData = $request->validate([
      'name' => 'required|max:255',
      'business_name' => 'required',
      'username' => 'required|min:5|max:255|unique:users',
      'email' => 'required|email|unique:users',
      'password' => 'required|min:5|max:255|confirmed',
      'phone' => [
        'required', 'numeric',
        function ($attribute, $value, $fail) {
          if ($value != null) {
            if (!is_numeric($value)) {
              $fail('Atribut ini harus berupa angka!');
            } else if (!str_starts_with($value, '0')) {
              $fail('Pastikan format sesuai dengan contoh!');
            }
          }
        }
      ],
      'address' => 'required',
      'rt' => 'required|numeric',
      'rw' => 'required|numeric',
      'noktp' => 'required|numeric|unique:identities',
      'kodepos' => 'required|numeric',
      'profile_picture' => 'image|file|required',
      'kecamatan' => 'required',
      'kelurahan_desa' => 'required',
    ]);

    $validatedData['profile_picture'] = $request->file('profile_picture')->store('profile-pictures');
    $validatedData['password'] = bcrypt($validatedData['password']);
    $validatedData['status_keanggotaan'] = true;
    $identityData = [
      'noktp' => $validatedData['noktp'],
      'phone' => $validatedData['phone'],
      'address' => $validatedData['address'],
      'rt' => $validatedData['rt'],
      'rw' => $validatedData['rw'],
      'profile_picture' => $validatedData['profile_picture'],
    ];
    $territoryData = [
      'kodepos' => $validatedData['kodepos'],
      'kecamatan' => $validatedData['kecamatan'],
      'kelurahan_desa' => $validatedData['kelurahan_desa'],
    ];
    Identity::create($identityData);
    Territory::create($territoryData);
    $getIdentityId = Identity::where('phone', $identityData['phone'])->get();
    $getTerritoryId = Territory::where('kodepos', $territoryData['kodepos'])->get();
    $userData = [
      'name' => $validatedData['name'],
      'email' => $validatedData['email'],
      'password' => $validatedData['password'],
      'identity_id' => $getIdentityId->first()->id,
      'territory_id' => $getTerritoryId->first()->id,
      'business_name' => $validatedData['business_name'],
      'username' => $validatedData['username'],
      'status_keanggotaan' => $validatedData['status_keanggotaan'],
    ];
    User::create($userData);

    return redirect('/login')->with('success', 'Registrasi Berhasil!, Silakan Masuk');
  }

  public function adminAddUser(Request $request)
  {
    $validatedData = $request->validate([
      'name' => 'required|max:255',
      'business_name' => 'required',
      'username' => 'required|min:5|max:255|unique:users',
      'email' => 'required|email|unique:users',
      'phone' => [
        'required', 'numeric',
        function ($attribute, $value, $fail) {
          if ($value != null) {
            if (!is_numeric($value)) {
              $fail('Atribut ini harus berupa angka!');
            } else if (!str_starts_with($value, '0')) {
              $fail('Pastikan format sesuai dengan contoh!');
            }
          }
        }
      ],
      'address' => 'required',
      'rt' => 'required|numeric',
      'rw' => 'required|numeric',
      'noktp' => 'required|numeric|unique:identities',
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
    $validatedData['password'] = bcrypt($validatedData['noktp']);
    $validatedData['status_keanggotaan'] = true;

    $identityData = [
      'noktp' => $validatedData['noktp'],
      'phone' => $validatedData['phone'],
      'address' => $validatedData['address'],
      'rt' => $validatedData['rt'],
      'rw' => $validatedData['rw'],
      'instagram' => $validatedData['instagram'],
      'facebook' => $validatedData['facebook'],
      'whatsapp' => $validatedData['whatsapp'],
      'profile_picture' => $validatedData['profile_picture'],
    ];
    $territoryData = [
      'kodepos' => $validatedData['kodepos'],
      'kecamatan' => $validatedData['kecamatan'],
      'kelurahan_desa' => $validatedData['kelurahan_desa'],
    ];
    Identity::create($identityData);
    Territory::create($territoryData);
    $getIdentityId = Identity::where('phone', $identityData['phone'])->get();
    $getTerritoryId = Territory::where('kodepos', $territoryData['kodepos'])->get();
    $userData = [
      'name' => $validatedData['name'],
      'email' => $validatedData['email'],
      'password' => $validatedData['password'],
      'identity_id' => $getIdentityId->first()->id,
      'territory_id' => $getTerritoryId->first()->id,
      'business_name' => $validatedData['business_name'],
      'username' => $validatedData['username'],
      'status_keanggotaan' => $validatedData['status_keanggotaan'],
    ];
    User::create($userData);
    $getUserId = User::where('email', $userData['email'])->get();
    $updateHistoryData = [
      'admin_id' => auth()->user()->id,
      'user_id' => $getUserId->first()->id,
    ];
    UpdateHistory::create($updateHistoryData);

    return redirect('/dashboard/adminuser/')->with('success', 'Anggota Berhasil Ditambahkan');
  }

  public function checkUsername(Request $request)
  {
    $username = SlugService::createSlug(User::class, 'username', $request->name);
    return response()->json(['username' => $username]);
  }
}
