<?php

use App\Http\Livewire\Admin\ApproveUser;
use App\Http\Livewire\Admin\Category;
use App\Http\Livewire\Admin\Dashboard as AdminDashboard;
use App\Http\Livewire\Admin\Document as AdminDocument;
use App\Http\Livewire\Admin\Login as AdminLogin;
use App\Http\Livewire\User\Dashboard;
use App\Http\Livewire\User\Document;
use App\Http\Livewire\User\Login;
use App\Http\Livewire\User\Register;
use Illuminate\Support\Facades\Route;

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

Route::middleware(['guest'])->group(function () {
    Route::get('/', Register::class)->name('user.register');
    Route::get('/login', Login::class)->name('user.login');
});
Route::middleware(['auth'])->group(function () {
    Route::get('/user/dashboard', Dashboard::class)->name('user.dashboard');
    Route::get('/user/document', Document::class)->name('user.documents');
});


// admin routes
Route::middleware(['guest:admin'])->group(function () {
    Route::get('/admin/login', AdminLogin::class)->name('admin.login');
});

Route::middleware(['auth:admin'])->group(function () {
    Route::get('/admin/dashboard', AdminDashboard::class)->name('admin.dashboard');
    Route::get('/admin/category', Category::class)->name('admin.category');
    Route::get('/admin/users', ApproveUser::class)->name('admin.users');
    Route::get('/admin/document', AdminDocument::class)->name('admin.document');
});
