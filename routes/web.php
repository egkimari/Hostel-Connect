<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HostelController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Landlord\DashboardController as LandlordDashboardController;
use App\Http\Controllers\Landlord\HostelController as LandlordHostelController;
use App\Http\Controllers\Landlord\ProfileController as LandlordProfileController;
use App\Http\Controllers\Student\DashboardController as StudentDashboardController;
use App\Http\Controllers\Student\HostelController as StudentHostelController;
use App\Http\Controllers\Student\ProfileController as StudentProfileController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\PaymentStatusController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and assigned to the "web" middleware group.
| Now create something great!
|
*/

// Route to the main layout (example)
Route::get('/', function () {
    return view('frontend.layout');
});

// Route for home page
Route::get('/home', [HomeController::class, 'index'])->name('home');

//Route for about page 
Route::get('/about', function () {
    return view('frontend.about');
})->name('about');


// Route for contact page (GET and POST)
Route::get('/contact', [ContactController::class, 'showContactForm'])->name('contact');
Route::post('/contact', [ContactController::class, 'submit'])->name('contact.submit');


// Route for displaying all hostels (resourceful)
Route::resource('/hostels', HostelController::class)->names([
    'index' => 'hostels.index',
    'create' => 'hostels.create',
    'store' => 'hostels.store',
    'show' => 'hostels.show',
    'edit' => 'hostels.edit',
    'update' => 'hostels.update',
    'destroy' => 'hostels.destroy',
]);

// Authentication routes
Auth::routes();

// Custom login and register routes (optional)
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);
// Admin Routes
Route::middleware('auth:admin')->group(function () {
    Route::get('/admin/dashboard', 'AdminController@index')->name('admin.dashboard');
    // Other admin routes can be defined here
});


// Landlord Routes
Route::prefix('landlord')->middleware('auth:landlord')->group(function () {
    Route::get('/', [LandlordDashboardController::class, 'index'])->name('landlord.dashboard');
    Route::resource('/hostels', LandlordHostelController::class)->names([
        'index' => 'landlord.hostels.index',
        'create' => 'landlord.hostels.create',
        'store' => 'landlord.hostels.store',
        'show' => 'landlord.hostels.show',
        'edit' => 'landlord.hostels.edit',
        'update' => 'landlord.hostels.update',
        'destroy' => 'landlord.hostels.destroy',
    ]);
    Route::get('/profile', [LandlordProfileController::class, 'index'])->name('landlord.profile');
    Route::post('/profile', [LandlordProfileController::class, 'update'])->name('landlord.profile.update');
});
// Student Profile contoller

    Route::get('/profile', [StudentProfileController::class, 'index'])->name('student.profile');
    Route::post('/profile', [StudentProfileController::class, 'update'])->name('student.profile.update');

// Grouping routes that require user authentication
Route::middleware(['auth'])->group(function () {
    // Route for authenticated user's profile (example)
    Route::get('/profile', function () {
        return view('frontend.profile');
    });
});
