<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller //bikin controller registrasi user gunaakan smua fitur dasar laravel controller
{
    /**
     * Display the registration view.
     */
    public function create(): View //method create yang akan kembalikan tampilan/view
    {
        return view('auth.register'); //tampilin file register di folder auth di dalem folder views
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException //penanda bahwa kode dibawahnya bisa hasilkan kesalahan,jenis kesalahan validasi data gagal
     */
    public function store(Request $request): RedirectResponse //method store utk terima data dari form (Request) kembalikan RedirectResponse utk ngarahin user ke halaman lain setelah registrasi berhasil
    {
        $request->validate([ //utk cek apakah data yg dikirim sesuai aturan
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class], //tdk boleh sama dengan email di tabel users
            'password' => ['required', 'confirmed', Rules\Password::defaults()], //ikuti standar aturan password default laravel
        ]);

        $user = User::create([ //insert data user baru ke database gunakan fillables di user model utk define field mana saja yg boleh diisi
            'name' => $request->name, //ambil data dari form
            'email' => $request->email,
            'password' => Hash::make($request->password), //enskripsi pass sebelum disimpan
        ]);

        event(new Registered($user)); //jalankan event Registered bawa data user baru, utk keperluan listener lain misal utk kirim email verifikasi

        Auth::login($user); //otomatis login user baru setelah registrasi berhasil

        return redirect(route('dashboard', absolute: false)); //arahkan user ke halaman dashboard setelah registrasi dan login berhasil
    }
}
