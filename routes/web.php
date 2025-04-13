<?php

use App\Livewire\Courses;
use App\Livewire\Courses\Create;
use App\Livewire\Courses\Edit;
use App\Livewire\Enrollments;
use App\Livewire\Settings\Appearance;
use App\Livewire\Settings\Password;
use App\Livewire\Settings\Profile;
use App\Livewire\Students;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Route::get('settings/profile', Profile::class)->name('settings.profile');
    Route::get('settings/password', Password::class)->name('settings.password');
    Route::get('settings/appearance', Appearance::class)->name('settings.appearance');

    Route::get('/courses', Courses::class)->name('courses.index');
    Route::get('/courses/create', Create::class)->name('courses.create');
    Route::get('/courses/{course}/edit', Edit::class)->name('courses.edit');

    Route::get('/students', Students::class)->name('students.index');
    Route::get('/students/create', \App\Livewire\Students\Create::class)->name('students.create');
    Route::get('/students/{student}/edit', \App\Livewire\Students\Edit::class)->name('students.edit');

    Route::get('/enrollments', Enrollments::class)->name('enrollments.index');
    Route::get('/enrollments/create', \App\Livewire\Enrollments\Create::class)->name('enrollments.create');
});

require __DIR__.'/auth.php';
