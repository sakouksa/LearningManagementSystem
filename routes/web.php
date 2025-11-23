<?php

use App\Http\Controllers\AdminProfileController;
use App\Http\Controllers\backend\AdminController;
use App\Http\Controllers\backend\AdminInstructorController;
use App\Http\Controllers\backend\CategoryController;
use App\Http\Controllers\backend\CourseController;
use App\Http\Controllers\backend\CourseSectionController;
use App\Http\Controllers\backend\InfoController;
use App\Http\Controllers\backend\InstructorProfileController;
use App\Http\Controllers\backend\instuctorController;
use App\Http\Controllers\backend\LectureController;
use App\Http\Controllers\backend\SliderController;
use App\Http\Controllers\backend\SubCategoryController;
use App\Http\Controllers\backend\UserController;
use App\Http\Controllers\backend\UserProfileController;
use App\Http\Controllers\frontend\FrontendDashboardController;
use Illuminate\Support\Facades\Route;

// start Admin login logout
Route::get('/admin/login', [AdminController::class, 'login'])->name('admin.login');

Route::middleware(['auth', 'verified', 'role:admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
    Route::post('/logout', [AdminController::class, 'destroy'])->name('logout');

    // profile Admins routes
    Route::get('/profile', [AdminProfileController::class, 'index'])->name('profile');
    Route::post('/profile/store', [AdminProfileController::class, 'store'])->name('profile.store');
    Route::get('/setting', [AdminProfileController::class, 'setting'])->name('setting');
    Route::post('/password/setting', [AdminProfileController::class, 'passwordSetting'])->name('passwordSetting');
    // Category routes for admin
    Route::resource('category', CategoryController::class);
    // SubCategory routes for admin
    Route::resource('subcategory', SubCategoryController::class);
    // Route Slider controller
    Route::resource('slider', SliderController::class);
    // Route Info controller
    Route::resource('info', InfoController::class);
    // Instructor routes for admin
    Route::resource('/instructor', AdminInstructorController::class);

    // Control instructor
    Route::resource('/instructor', AdminInstructorController::class);
    Route::post('/update-status', [AdminInstructorController::class, 'updateStatus'])->name('instructor.status');
    Route::get('/instructor-active-list', [AdminInstructorController::class, 'instructorActive'])->name('instructor.active');
});
// end Admin login logout

// start instuctor => Teacher
Route::get('/instructor/login', [InstuctorController::class, 'login'])->name('instructor.login');

Route::middleware(['auth', 'verified', 'role:instructor'])->prefix('instructor')->name('instructor.')->group(function () {
    Route::get('/dashboard', [InstuctorController::class, 'dashboard'])->name('dashboard');
    Route::post('/logout', [InstuctorController::class, 'destroy'])->name('logout');
    // profile instruct routes
    Route::get('/profile', [InstructorProfileController::class, 'index'])->name('profile');
    Route::post('/profile/store', [InstructorProfileController::class, 'store'])->name('profile.store');
    Route::get('/setting', [InstructorProfileController::class, 'setting'])->name('setting');
    Route::post('/password/setting', [InstructorProfileController::class, 'passwordSetting'])->name('passwordSetting');

    // Manage cours
    Route::resource('course', CourseController::class);
    // Manage cours Section
    Route::resource('course-section', CourseSectionController::class);

    Route::get('get-subcategories/{categoryId}', [CategoryController::class, 'getSubCategories'])->name('get-subcategories');

    // Manage lecture
    Route::resource('lecture', LectureController::class);
});
// end instuctor => Teacher

// start User Modal list
Route::middleware(['auth', 'verified', 'role:user'])->prefix('user')->name('user.')->group(function () {
    Route::get('/dashboard', [UserController::class, 'dashboard'])->name('dashboard');
    Route::post('/logout', [UserController::class, 'destroy'])->name('logout');

    // Profile routes
    Route::get('/profile', [UserProfileController::class, 'index'])->name('profile');
    Route::post('/profile/store', [UserProfileController::class, 'store'])->name('profile.store');
    // Update password
    Route::post('/password/setting', [UserProfileController::class, 'passwordSetting'])->name('passwordSetting');

});
// End start User

// Frontend Route
Route::get('/', [FrontendDashboardController::class, 'home'])->name('frontend.home');
Route::get('/course-details/{slug}', [FrontendDashboardController::class, 'view'])->name('course-details');

require __DIR__.'/auth.php';