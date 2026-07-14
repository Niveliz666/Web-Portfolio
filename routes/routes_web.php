<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PortfolioController;
use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\Admin\SkillController;
use App\Http\Controllers\Admin\ContactController;

// Public Portfolio
Route::get('/', [PortfolioController::class, 'index'])->name('home');
Route::post('/contact', [PortfolioController::class, 'sendContact'])->name('contact.send');

// Admin Panel
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/', fn() => redirect()->route('admin.projects.index'));
    Route::resource('projects', ProjectController::class);
    Route::resource('skills', SkillController::class);
    Route::get('contacts', [ContactController::class, 'index'])->name('contacts.index');
    Route::get('contacts/{contact}', [ContactController::class, 'show'])->name('contacts.show');
    Route::delete('contacts/{contact}', [ContactController::class, 'destroy'])->name('contacts.destroy');
});