<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\WebViewerCount;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class LoginController extends Controller
{
  public function index()
  {
    if (url()->previous() == url("/") . "/") {
      WebViewerCount::first()->increment('count');
    }

    return view('login.index');
  }

  public function authenticate(Request $request)
  {
    $credentials = $request->validate([
      'email' => 'required|email',
      'password' => 'required'
    ]);

    if (Auth::attempt($credentials)) {
      $request->session()->regenerate();

      return redirect()->intended('/');
    }

    return back()->with('loginError', 'Masuk gagal!');
  }

  public function logout(Request $request)
  {
    Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();
    return redirect('/');
  }

  public function showForgotForm()
  {
    return view('login.forgotpassword');
  }

  public function sendResetLink(Request $request)
  {
    $request->validate([
      'email' => 'required|email|exists:users',
    ]);

    $token = Str::random(64);
    DB::table('password_resets')->insert([
      'email' => $request->email,
      'token' => $token,
      'created_at' => Carbon::now(),
    ]);

    $action_link = route('resetpassword', [
      'token' => $token,
      'email' => $request->email
    ]);
    $body = "Permintaan reset kata sandi untuk akun " . $request->email . " telah diterima. Anda dapat mereset kata sandi dengan menekan link di bawah ini";
    Mail::send(
      'login.email-forgot',
      [
        'action_link' => $action_link,
        'body' => $body,
      ],
      function ($message) use ($request) {
        $message->from('devdekranasdakbb@gmail.com', 'Dekranasda KBB');
        $message->to($request->email)
          ->subject('Reset Kata Sandi');
      }
    );

    return back()->with('success', 'Link reset kata sandi sudah dikirimkan ke email Anda, silakan cek email Anda (termasuk folder spam)');
  }

  public function showResetForm(Request $request, $token = null)
  {
    return view('login.resetpassword', [
      'token' => $token,
      'email' => $request->email,
    ]);
  }

  public function resetPassword(Request $request)
  {
    $request->validate([
      'email' => 'required|email|exists:users',
      'password' => 'required|min:5|max:255|confirmed',
      'password_confirmation' => 'required',
    ]);
    $check_token = DB::table('password_resets')->where([
      'email' => $request->email,
      'token' => $request->token,
    ])->first();
    if (!$check_token) {
      return back()->withInput()->with('fail', 'Token Tidak Valid');
    } else {
      User::where('email', $request->email)->update([
        'password' => Hash::make($request->password)
      ]);
      DB::table('password_resets')->where([
        'email' => $request->email
      ])->delete();
      return redirect('/login')->with('success', 'Kata sandi berhasil diubah, silakan masuk kembali');
    }
  }
}
