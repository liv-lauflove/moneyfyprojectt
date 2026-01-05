<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\ConfirmablePasswordController;
use App\Http\Controllers\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\PasswordController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\VerifyEmailController;
use Illuminate\Support\Facades\Route;

// file ini bagi jadi 2 kelompok berdasarkan middleware yaitu guest (tamu/blm login) dan auth(sudag login)

//klompok guest
Route::middleware('guest')->group(function () { //smua rute di grup hanya bisa diakses oleh org yg blm login
    Route::get('register', [RegisteredUserController::class, 'create']) //tampilkan formulir register url file register, panggil controller RegisteredUserController method create
        ->name('register');

    Route::post('register', [RegisteredUserController::class, 'store']); //terima data dri form dan buat user baru di database

    Route::get('login', [AuthenticatedSessionController::class, 'create']) //tampikan formulir login
        ->name('login');

    Route::post('login', [AuthenticatedSessionController::class, 'store']); //terima data form login dan proses data untuk masuk

    Route::get('forgot-password', [PasswordResetLinkController::class, 'create']) //tampikan form utk masukkan email utk yg lupa pass
        ->name('password.request');

    Route::post('forgot-password', [PasswordResetLinkController::class, 'store']) //terima data form lupa pass dan kirim email dgn link reset pass
        ->name('password.email');

    Route::get('reset-password/{token}', [NewPasswordController::class, 'create']) //halaman yg muncul saat user klik link di email untuk input pass baru
        ->name('password.reset');

    Route::post('reset-password', [NewPasswordController::class, 'store']) //proses nyimpan pass baru ke db
        ->name('password.store');
});

// klompok auth (sdh login)
Route::middleware('auth')->group(function () { //smua rute di grup hanya bisa diakses oleh org yg sdh login
    Route::get('verify-email', EmailVerificationPromptController::class) //utk verifikasi email
        ->name('verification.notice');

    Route::get('verify-email/{id}/{hash}', VerifyEmailController::class) //rute yang dipanggil ketika user klik link verifikasi di inbox email mreka
        ->middleware(['signed', 'throttle:6,1']) //middleware signed: pastikan link url tidak diubah2, throttle: batasi jumlah klik agar tidak spam
        ->name('verification.verify');

    Route::post('email/verification-notification', [EmailVerificationNotificationController::class, 'store']) //tombol untuk kirimulang email verifikasi
        ->middleware('throttle:6,1')
        ->name('verification.send');

    Route::get('confirm-password', [ConfirmablePasswordController::class, 'show']) //konfirmasi pass, tampilkan form input password
        ->name('password.confirm');

    Route::post('confirm-password', [ConfirmablePasswordController::class, 'store']); //proses konfirmasi pass

    Route::put('password', [PasswordController::class, 'update'])->name('password.update'); //utk ganti pass saat sdh login, PUT krn sifatnya update data

    Route::post('logout', [AuthenticatedSessionController::class, 'destroy']) //hapus sesi login user dan arahkan kembali ke halaman depan
        ->name('logout');
});
