<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PortfolioController;
use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\Admin\SkillController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Middleware\AdminAuth;

// Home - Redirect to Portfolio
Route::get('/', function () {
    return redirect('/portfolio');
})->name('home');

// Portfolio Frontend
Route::prefix('portfolio')->group(function () {
    Route::get('/', [PortfolioController::class, 'index'])->name('portfolio.index');
    Route::post('/contact', [PortfolioController::class, 'sendContact'])->name('portfolio.sendContact');
});

// Admin Login (public)
Route::get('/admin/login', [AuthController::class, 'showLoginForm'])->name('admin.login');
Route::post('/admin/login', [AuthController::class, 'login']);

// Admin Panel (protected)
Route::prefix('admin')->name('admin.')->middleware(AdminAuth::class)->group(function () {
    Route::get('/', fn() => redirect()->route('admin.projects.index'));
    
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    
    // Projects CRUD
    Route::get('/projects', [ProjectController::class, 'index'])->name('projects.index');
    Route::get('/projects/create', [ProjectController::class, 'create'])->name('projects.create');
    Route::post('/projects', [ProjectController::class, 'store'])->name('projects.store');
    Route::get('/projects/{project}/edit', [ProjectController::class, 'edit'])->name('projects.edit');
    Route::put('/projects/{project}', [ProjectController::class, 'update'])->name('projects.update');
    Route::delete('/projects/{project}', [ProjectController::class, 'destroy'])->name('projects.destroy');
    
    // Skills CRUD
    Route::get('/skills', [SkillController::class, 'index'])->name('skills.index');
    Route::get('/skills/create', [SkillController::class, 'create'])->name('skills.create');
    Route::post('/skills', [SkillController::class, 'store'])->name('skills.store');
    Route::get('/skills/{skill}/edit', [SkillController::class, 'edit'])->name('skills.edit');
    Route::put('/skills/{skill}', [SkillController::class, 'update'])->name('skills.update');
    Route::delete('/skills/{skill}', [SkillController::class, 'destroy'])->name('skills.destroy');
    
    // Contacts
    Route::get('/contacts', [ContactController::class, 'index'])->name('contacts.index');
    Route::get('/contacts/{contact}', [ContactController::class, 'show'])->name('contacts.show');
    Route::delete('/contacts/{contact}', [ContactController::class, 'destroy'])->name('contacts.destroy');
});