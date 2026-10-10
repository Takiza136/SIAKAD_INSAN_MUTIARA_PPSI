<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;

class LoginController extends Controller
{
    public function create(): View
    {
        return view('auth.login');
    }

    public function store(Request $request): RedirectResponse
    {
        $credentials = $request->validate([
            'username' => ['required', 'string'],
            'password' => ['required', 'string'],
        ], [
            'username.required' => 'Username wajib diisi.',
            'password.required' => 'Password wajib diisi.',
        ]);

        $user = User::where('username', $credentials['username'])->first();

        if (! $user || ! Hash::check($credentials['password'], $user->password)) {
            return back()
                ->withInput($request->only('username', 'remember'))
                ->with('login_error', [
                    'title' => 'Username atau password belum sesuai',
                    'message' => 'Periksa kembali penulisan username dan password Anda.',
                ]);
        }

        if (! $user->is_active) {
            return back()
                ->withInput($request->only('username', 'remember'))
                ->with('login_error', [
                    'title' => 'Akun tidak aktif',
                    'message' => 'Akun Anda tidak aktif. Hubungi administrator sekolah untuk mengaktifkan kembali akun.',
                ]);
        }

        Auth::login($user, $request->boolean('remember'));
        $request->session()->regenerate();

        return redirect()->intended(route('dashboard'))->with('login_success', [
            'title' => 'Masuk berhasil',
            'message' => 'Anda berhasil masuk ke E-Rapor Insan Mutiara. Silakan lanjutkan penilaian dan laporan hasil belajar.',
        ]);
    }

    public function destroy(Request $request): RedirectResponse
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}
