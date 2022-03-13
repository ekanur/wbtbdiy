<?php

use Illuminate\Support\Facades\Route;

use App\Http\Livewire\Auth\ForgotPassword;
use App\Http\Livewire\Auth\ResetPassword;
use App\Http\Livewire\Auth\SignUp;
use App\Http\Livewire\Auth\Login;
// use App\Http\Livewire\Billing;
// use App\Http\Livewire\Profile;
// use App\Http\Livewire\Tables;
// use App\Http\Livewire\StaticSignIn;
// use App\Http\Livewire\StaticSignUp;
// use App\Http\Livewire\Rtl;

// use App\Http\Livewire\LaravelExamples\UserProfile;
// use App\Http\Livewire\LaravelExamples\UserManagement;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\PencatatanController;

use App\Http\Livewire\User\Dashboard;
use App\Http\Livewire\User\Pengusulan;
use App\Http\Livewire\User\PengusulanEdit;

use App\Http\Livewire\Admin\Dashboard as AdminDashboard;
use App\Http\Livewire\Admin\Berita as AdminBerita;
use App\Http\Livewire\Admin\Pengusulan as AdminPengusulan;
use App\Http\Livewire\Admin\Pencatatan as AdminPencatatan;
use App\Http\Livewire\Admin\Event as AdminEvent;


use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [IndexController::class, 'index'])->name('index');
Route::get("/ajukan", [IndexController::class, 'ajukan'])->name('ajukan');
Route::post("/ajukan", [PencatatanController::class, 'simpan']);
Route::get('/wbtb', [IndexController::class, 'wbtb'])->name('wbtb');
Route::get('/wbtb/{wbtb}', [IndexController::class, 'detail'])->name('detail');
Route::get('/preview/{id}', [IndexController::class, 'preview'])->name('preview');
Route::get('/berita', [IndexController::class, 'berita'])->name('berita');
Route::get('/berita/{berita}', [IndexController::class, 'detailBerita'])->name('detail-berita');
Route::get('/event', [IndexController::class, 'event'])->name("event");
Route::get('/event/{event}', [IndexController::class, 'detailEvent'])->name("detail-event");


// Route::get('/sign-up', SignUp::class)->name('sign-up');
Route::get('/login', Login::class)->name('login');

// Route::get('/login/forgot-password', ForgotPassword::class)->name('forgot-password');
 
// Route::get('/reset-password/{id}',ResetPassword::class)->name('reset-password')->middleware('signed');

Route::middleware('auth')->prefix('user')->name('user.')->group(function () {
    Route::get('/', Dashboard::class)->name('dashboard');
    // Route::get('/billing', Billing::class)->name('billing');
    // Route::get('/profile', Profile::class)->name('profile');
    // Route::get('/tables', Tables::class)->name('tables');
    // Route::get('/static-sign-in', StaticSignIn::class)->name('sign-in');
    // Route::get('/static-sign-up', StaticSignUp::class)->name('static-sign-up');
    // Route::get('/rtl', Rtl::class)->name('rtl');
    Route::get('/pengusulan', Pengusulan::class)->name('pengusulan');
    Route::get('/pengusulan/{pengusulan}', PengusulanEdit::class)->name('pengusulan.edit');

});


Route::middleware('admin')->prefix('admin')->name('admin.')->group(function(){
    Route::get('/', AdminDashboard::class)->name('dashboard');
    Route::get('/pengusulan', AdminPengusulan::class)->name('penetapan');
    Route::get('/pencatatan', AdminPencatatan::class)->name('pencatatan');
    Route::get('/berita', AdminBerita::class)->name('berita');
    Route::get('/event', AdminEvent::class)->name('event');
    // Route::get()->name('halaman');
    // Route::get()->name('event');
});
Route::fallback(function(){ return response()->view('errors.404', [], 404); });