<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\BankController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// Dashboard
Route::middleware(['auth', 'verified'])->prefix('dashboard')->group(function () {
    Route::post('/new-financial', [DashboardController::class, 'newFinancial'])->name('dashboard.new-financial');
});

// Logged in
Route::middleware('auth')->group(function () {
    // Profile
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    //Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');
    Route::post('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');
    Route::delete('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');
    Route::post('/dashboard/new-expense', [DashboardController::class, 'newExpense'])->name('dashboard.new-expense');
    Route::post('/dashboard/new-income', [DashboardController::class, 'newIncome'])->name('dashboard.new-income');

    // Category
    Route::get('/category', [CategoryController::class, 'index'])->name('category.index');
    Route::post('/category', [CategoryController::class, 'create'])->name('category.create');
    Route::delete('/category/{category_id}', [CategoryController::class, 'destroy'])->name('category.destroy');

    // Bank
    Route::get('/bank', [BankController::class, 'index'])->name('bank.index');
    Route::post('/bank', [BankController::class, 'create'])->name('bank.create');
    Route::delete('/bank/{bank_id}', [BankController::class, 'destroy'])->name('bank.destroy');
});
require __DIR__ . '/auth.php';

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
