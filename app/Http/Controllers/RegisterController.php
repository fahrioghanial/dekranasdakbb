<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Territory;
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
      'noktp' => 'required|numeric|unique:contacts',
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
      'profile_picture' => 'image|file|required',
      'kodepos' => 'required|numeric',
      'kecamatan' => 'required',
      'kelurahan_desa' => 'required',
    ]);


    $dataUser = [
      'name' => $validatedData['name'],
      'business_name' => $validatedData['business_name'],
      'username' => $validatedData['username'],
      'email' => $validatedData['email'],
      'password' => $validatedData['password'],
    ];
    $dataContact = [
      'noktp' => $validatedData['noktp'],
      'phone' => $validatedData['phone'],
      'address' => $validatedData['address'],
      'rt' => $validatedData['rt'],
      'rw' => $validatedData['rw'],
      'profile_picture' => $validatedData['profile_picture'],
    ];
    dd($dataContact);
    $dataTerritory = [
      'kodepos' => $validatedData['kodepos'],
      'kecamatan' => $validatedData['kecamatan'],
      'kelurahan_desa' => $validatedData['kelurahan_desa'],
    ];

    // $dataContact['profile_picture'] = $request->file('profile_picture')->store('profile-pictures');
    // $dataUser['password'] = bcrypt($validatedData['password']);
    // $dataUser['status_keanggotaan'] = true;
    // Contact::create($dataContact);
    // Territory::create($dataTerritory);
    // $contactId = Contact::where('noktp', $dataContact['noktp'])->get();
    // $territoryId = Territory::where('kodepos', $dataTerritory['kodepos'])->get();
    // $validatedDataUser['contact_id'] = $contactId['id'];
    // $validatedDataUser['territory_id'] = $territoryId['id'];
    // User::create($validatedDataUser);

    // return redirect('/login')->with('success', 'Registrasi Berhasil!, Silakan Masuk');
  }

  public function adminAddUser(Request $request)
  {
    $validatedData = $request->validate([
      'name' => 'required|max:255',
      'business_name' => 'required',
      'username' => 'required|min:5|max:255|unique:users',
      'email' => 'required|email|unique:users',
      'contact' => [
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
    $validatedData['updated_by'] = auth()->user()->id;

    User::create($validatedData);

    return redirect('/dashboard/adminuser/')->with('success', 'Anggota Berhasil Ditambahkan');
  }

  public function checkUsername(Request $request)
  {
    $username = SlugService::createSlug(User::class, 'username', $request->name);
    return response()->json(['username' => $username]);
  }
}
