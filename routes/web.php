<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController; 

// Route for the home page
Route::get('/', function () {
    return view('home'); 
});

// Authentication routes
Route::get('login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('login', [AuthController::class, 'login']);
Route::get('signup', [AuthController::class, 'showSignupForm'])->name('signup');
Route::post('signup', [AuthController::class, 'register']);


// Admin and User routes
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;

Route::middleware('auth')->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::get('/user/user', [UserController::class, 'index'])->name('user.user');
});


// Logout route
use App\Http\Controllers\Auth\LoginController;

Route::middleware('auth')->group(function () {
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
});

// Admin routes
use App\Http\Controllers\BarangayController;
use App\Http\Controllers\ResidentController;
use App\Http\Controllers\HealthController;
use App\Http\Controllers\ClearanceController;
use App\Http\Controllers\ReportController;

Route::middleware('auth')->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
    // Route::get('/barangay-officials', [BarangayController::class, 'index'])->name('barangay.officials');
    Route::get('/resident-profiling', [ResidentController::class, 'index'])->name('resident.profiling');
    Route::get('/health-sanitation', [HealthController::class, 'index'])->name('health.sanitation');
    Route::get('/clearances-forms', [ClearanceController::class, 'index'])->name('clearances.forms');
    Route::get('/reports', [ReportController::class, 'index'])->name('reports');
});

// Resident/Dash routes
Route::get('/residents', [ResidentController::class, 'index'])->name('residents.index');
Route::post('/residents', [ResidentController::class, 'store'])->name('residents.store');
Route::get('/admin/dashboard', [ResidentController::class, 'dashboard'])->name('admin.dashboard');
Route::get('/residents/{id}', [ResidentController::class, 'show'])->name('residents.show');
Route::get('/residents/{id}/edit', [ResidentController::class, 'edit'])->name('residents.edit');
Route::put('/residents/{id}', [ResidentController::class, 'update'])->name('residents.update');
Route::delete('/residents/{id}', [ResidentController::class, 'destroy'])->name('residents.destroy');

// Route for creating a new barangay
Route::get('barangays/create', [BarangayController::class, 'create'])->name('barangays.create');

// Route for storing a new barangay
Route::post('barangays', [BarangayController::class, 'store'])->name('barangays.store');

Route::get('barangays/officials', [BarangayController::class, 'officials'])->name('barangays.officials');

Route::resource('barangays', BarangayController::class);

// Route for creating a health
Route::prefix('health')->group(function () {
    Route::get('sanitation', [HealthController::class, 'index'])->name('health.sanitation');
    Route::get('medicine/create', [HealthController::class, 'createMedicine'])->name('health.medicine.create');
    Route::post('medicine', [HealthController::class, 'storeMedicine'])->name('health.medicine.store');
    Route::get('medicine/{medicine}/edit', [HealthController::class, 'editMedicine'])->name('health.medicine.edit');
    Route::put('medicine/{medicine}', [HealthController::class, 'updateMedicine'])->name('health.medicine.update');
    Route::delete('medicine/{medicine}', [HealthController::class, 'destroyMedicine'])->name('health.medicine.destroy');

    Route::get('personnel/create', [HealthController::class, 'createPersonnel'])->name('health.personnel.create');
    Route::post('personnel', [HealthController::class, 'storePersonnel'])->name('health.personnel.store');
    Route::get('personnel/{personnel}/edit', [HealthController::class, 'editPersonnel'])->name('health.personnel.edit');
    Route::put('personnel/{personnel}', [HealthController::class, 'updatePersonnel'])->name('health.personnel.update');
    Route::delete('personnel/{personnel}', [HealthController::class, 'destroyPersonnel'])->name('health.personnel.destroy');
});

use App\Http\Controllers\BarangayOfficialController;
use App\Http\Controllers\HealthSanitationController;
use App\Http\Controllers\ClearanceFormController;
use App\Http\Controllers\CommunityReportController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\EventController;

// Route for profile
Route::middleware(['auth'])->group(function () {
    Route::get('/user/profile', [UserController::class, 'show'])->name('user.profile');
    Route::get('/user/profile/edit', [UserController::class, 'edit'])->name('user.profile.edit');
    Route::post('/user/profile/update', [UserController::class, 'update'])->name('user.profile.update');
    Route::post('/user/profile/delete', [UserController::class, 'destroy'])->name('user.profile.delete');
    Route::get('/user/show', [UserController::class, 'show'])->name('user.show');
    Route::get('/user/{id}/edit', [UserController::class, 'edit'])->name('user.edit');
    Route::post('/user/profile/update', [UserController::class, 'update'])->name('user.profile.update');

    Route::post('/user/destroy', [UserController::class, 'destroy'])->name('user.destroy');
});
// User Routes
Route::prefix('user')->group(function () {
    Route::get('/dashboard', [UserController::class, 'dashboard'])->name('user.dashboard');
    Route::get('/barangay', [BarangayOfficialController::class, 'index'])->name('user.barangay');
    Route::get('/health', [HealthSanitationController::class, 'index'])->name('user.health');
    Route::get('/clearance', [ClearanceFormController::class, 'index'])->name('user.clearance');
    Route::get('/report', [CommunityReportController::class, 'index'])->name('user.report'); // Corrected to singular
    Route::get('/notification', [NotificationController::class, 'index'])->name('user.notification');
    Route::get('/event', [EventController::class, 'index'])->name('user.event');
// web.php
    Route::get('/user/barangay-officials', [UserController::class, 'barangayOfficials'])->name('user.barangay.officials');

});


Route::resource('clearances', ClearanceController::class);

use App\Http\Controllers\PaperController;
Route::resource('papers', PaperController::class);

Route::patch('/clearances/{id}/update-status', [ClearanceController::class, 'updateStatus'])->name('clearances.updateStatus');

Route::get('/user/barangay', [UserController::class, 'barangayOfficials'])->name('user.barangay.index');
Route::get('/user/barangay-officials', [UserController::class, 'barangayOfficials'])->name('user.barangay');
Route::get('/user/health', [UserController::class, 'healthSanitation'])->name('user.health');

// Create request
Route::middleware(['auth'])->group(function () {
    Route::get('/user/requests', [UserController::class, 'listRequests'])->name('user.requests.index');
    Route::get('/user/requests/create', [UserController::class, 'createRequest'])->name('user.requests.create');
    Route::post('/user/requests', [UserController::class, 'storeRequest'])->name('user.requests.store');
});

//Admin request
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin/requests', [AdminController::class, 'manageRequests'])->name('admin.requests.index');
    Route::patch('/admin/requests/{id}', [AdminController::class, 'updateRequest'])->name('admin.requests.update');
});
Route::get('/health', [UserController::class, 'healthSanitation'])->name('user.health');
Route::get('/user/health', [UserController::class, 'healthSanitation'])->name('user.health')->middleware('auth');
Route::get('/admin/health-sanitation', [AdminController::class, 'healthSanitation'])->name('admin.health.sanitation');

// Admin Routes to handle approval/rejection
use App\Http\Controllers\RequestController;

// Admin Routes to handle approval/rejection
Route::get('/admin/requests/{request}/approve', [RequestController::class, 'approve'])->name('admin.request.approve');
Route::get('/admin/requests/{request}/reject', [RequestController::class, 'reject'])->name('admin.request.reject');


Route::get('admin/health', [AdminController::class, 'index'])->name('admin.health');
Route::get('/health', [HealthController::class, 'index'])->name('health.sanitation');
Route::get('/health', [HealthController::class, 'healthSanitation'])->name('health.sanitation');
// Define the health sanitation route
Route::get('/health/sanitation', [HealthController::class, 'healthSanitation'])->name('health.sanitation');

Route::prefix('admin')->name('admin.')->middleware('auth')->group(function() {
    Route::get('/requests', [AdminController::class, 'health'])->name('health');
    Route::get('/requests/{request}/approve', [AdminController::class, 'approve'])->name('request.approve');
    Route::get('/requests/{request}/reject', [AdminController::class, 'reject'])->name('request.reject');
});
use App\Http\Controllers\ReportsController;

Route::get('/reports', [ReportController::class, 'index'])->name('reports.index');
Route::get('/clearances', [ClearanceController::class, 'index'])->name('clearances.index');
Route::get('/reports', [ReportController::class, 'index'])->name('reports');

use App\Http\Controllers\AdminRequestController;
use App\Http\Controllers\UserRequestController;
Route::middleware('auth:admin')->group(function () {
    Route::get('/admin/requests', [AdminRequestController::class, 'index'])->name('admin.requests.index');
    Route::post('/admin/requests/{request}/approve', [AdminRequestController::class, 'approve'])->name('admin.request.approve');
    Route::post('/admin/requests/{request}/reject', [AdminRequestController::class, 'reject'])->name('admin.request.reject');
});

Route::get('/admin/health/index', [AdminController::class, 'index'])->name('admin.requests.index');
Route::post('/admin/request/approve/{request}', [AdminController::class, 'approve'])->name('admin.request.approve');
Route::post('/admin/request/reject/{request}', [AdminController::class, 'reject'])->name('admin.request.reject');

Route::get('/user/requests', [UserController::class, 'index'])->name('user.requests.index');

Route::get('/admin/health/index', [AdminController::class, 'index'])->name('admin.requests.index');
Route::post('/admin/request/approve/{request}', [AdminController::class, 'approve'])->name('admin.request.approve');
Route::post('/admin/request/reject/{request}', [AdminController::class, 'reject'])->name('admin.request.reject');

Route::get('clearances', [ClearanceController::class, 'index'])->name('clearances.index');
Route::post('clearances', [ClearanceController::class, 'store'])->name('clearances.store');
Route::patch('clearances/{id}/status', [ClearanceController::class, 'updateStatus'])->name('clearances.updateStatus');
Route::middleware(['auth'])->group(function () {
    Route::post('/clearances', [ClearanceController::class, 'store'])->name('clearances.store');
});
// Routes for admin to update clearance status and release date
Route::patch('clearances/{id}/status', [ClearanceController::class, 'updateStatus'])->name('clearances.updateStatus');
Route::patch('clearances/{id}/release-date', [ClearanceController::class, 'updateReleaseDate'])->name('clearances.updateReleaseDate');
Route::post('/clearance/store', [ClearanceFormController::class, 'store'])->name('clearance.store');
Route::post('clearance/{id}/approve', [ClearanceFormController::class, 'approve'])->name('clearance.approve');
Route::post('clearance/{id}/release', [ClearanceFormController::class, 'release'])->name('clearance.release');

Route::post('/admin/request/approve/{id}', [RequestController::class, 'approve'])->name('admin.request.approve');
Route::post('/admin/request/reject/{id}', [RequestController::class, 'reject'])->name('admin.request.reject');
Route::post('/user/requests', [UserController::class, 'storeRequest'])->name('user.requests.store');
Route::get('/user/health/index', [HealthSanitationController::class, 'index'])->name('user.health.index');
Route::get('/admin/requests', [RequestController::class, 'index'])->name('admin.requests');
Route::post('/admin/request/approve/{id}', [RequestController::class, 'approve'])->name('admin.request.approve');
Route::post('/admin/request/reject/{id}', [RequestController::class, 'reject'])->name('admin.request.reject');
Route::post('/clearance', [UserController::class, 'store'])->name('clearance.store');
Route::post('/admin/clearance/{id}/approve', [AdminController::class, 'approve'])->name('admin.request.approve');
Route::post('/admin/clearance/{id}/reject', [AdminController::class, 'reject'])->name('admin.request.reject');
Route::get('/admin/clearances/report', [AdminController::class, 'generateReport'])->name('admin.clearances.report');
Route::post('/clearance', [UserController::class, 'store'])->name('clearance.store');
Route::post('/admin/clearance/{id}/approve', [AdminController::class, 'approve'])->name('admin.request.approve');
Route::post('/admin/clearance/{id}/reject', [AdminController::class, 'reject'])->name('admin.request.reject');
Route::get('/reports', [ReportController::class, 'index'])->name('reports');
Route::post('/residents', [ResidentController::class, 'store'])->name('residents.store');
Route::resource('clearances', ClearanceController::class);

Route::post('clearances/store', [ClearanceController::class, 'store'])->name('clearances.store');
Route::get('/reports', [ReportController::class, 'showReports'])->name('reports');
Route::middleware(['auth'])->group(function () {
    Route::get('admin/health', [HealthController::class, 'index'])->name('health.index');
    Route::post('admin/health/medicine', [HealthController::class, 'createMedicine'])->name('health.medicine.create');
    Route::post('admin/health/personnel', [HealthController::class, 'createPersonnel'])->name('health.personnel.create');
    Route::resource('admin/requests', RequestController::class)->only(['index', 'store', 'approve', 'reject']);
});