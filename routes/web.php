<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\AdminAuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ReservationController;
use App\Http\Controllers\Admin\HolidayController;
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
    // 今後の休診日を取得（今日以降、3件まで）
    $upcomingHolidays = \App\Models\Holiday::where('holiday_date', '>=', now()->toDateString())
        ->orderBy('holiday_date', 'asc')
        ->take(3)
        ->get();
    
    return view('welcome', compact('upcomingHolidays'));
});

// Static pages
Route::get('/about', function () {
    return view('pages.about');
})->name('about');

Route::get('/services', function () {
    return view('pages.services');
})->name('services');

Route::get('/access', function () {
    return view('pages.access');
})->name('access');

Route::get('/testimonials', function () {
    return view('pages.testimonials');
})->name('testimonials');

Route::get('/faq', function () {
    return view('pages.faq');
})->name('faq');

Route::get('/news', function () {
    // 今後の休診日を取得（今日以降の日付）
    $upcomingHolidays = \App\Models\Holiday::where('holiday_date', '>=', now()->toDateString())
        ->orderBy('holiday_date', 'asc')
        ->get();
    
    // 最近追加された休診日（過去30日以内に登録されたもの）
    $recentHolidays = \App\Models\Holiday::where('created_at', '>=', now()->subDays(30))
        ->orderBy('created_at', 'desc')
        ->get();
    
    return view('pages.news', compact('upcomingHolidays', 'recentHolidays'));
})->name('news');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
    // Customer reservations
    Route::resource('reservations', \App\Http\Controllers\ReservationController::class);
});

// Admin Routes
Route::prefix('admin')->name('admin.')->group(function () {
    // Authentication routes
    Route::get('/login', [AdminAuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AdminAuthController::class, 'login']);
    Route::get('/register', [AdminAuthController::class, 'showRegistrationForm'])->name('register');
    Route::post('/register', [AdminAuthController::class, 'register']);
    Route::post('/logout', [AdminAuthController::class, 'logout'])->name('logout');

    // Protected admin routes
    Route::middleware('auth:admin')->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
        Route::resource('reservations', ReservationController::class);
        Route::resource('holidays', HolidayController::class);
    });
});

// API Routes for AJAX
Route::get('/api/holidays', function() {
    return \App\Models\Holiday::where('holiday_date', '>=', now()->toDateString())
        ->pluck('holiday_date')
        ->map(fn($date) => \Carbon\Carbon::parse($date)->format('Y-m-d'));
});

require __DIR__.'/auth.php';
