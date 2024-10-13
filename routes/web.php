<?php

use App\Livewire\Auth\Login;
use App\Livewire\Auth\Register;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Livewire\Admin\Competitor\Profile as CompetitorProfile;
use App\Livewire\Admin\Quiz\Edit as QuizEdit;
use App\Livewire\Admin\Quiz\Index as QuizIndex;
use App\Livewire\Admin\Tier\Index as TierIndex;
use App\Livewire\Admin\Quiz\Create as QuizCreate;
use App\Livewire\Admin\Quiz\Detail as QuizDetail;
use App\Livewire\Admin\Competitor\Index as CompetitorIndex;
use App\Livewire\Admin\Competitor\Detail as CompetitorDetail;








Route::middleware('auth')->group(function(){
    Route::get('/', \App\Livewire\Home\Index::class)->name('dashboard');
    Route::prefix('/quizs')->group(function () {
        Route::get('/', QuizIndex::class)->name('quizIndex');
        Route::get('/create', QuizCreate::class)->name('quizCreate');
        Route::get('/{id}/show', QuizDetail::class)->name('quizDetail');
        Route::get('/{id}/edit', QuizEdit::class)->name('quizEdit');
        Route::get('/tingkat', TierIndex::class)->name('tierIndex');
    });
    Route::get('/peserta', CompetitorIndex::class)->name('competitorIndex');
    Route::get('/peserta', CompetitorIndex::class)->name('competitorIndex');
    Route::get('/peserta/{id}', CompetitorDetail::class)->name('competitorDetail');
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/profile', CompetitorProfile::class)->name('competitorProfile');

    Route::get('/olimpiode', \App\Livewire\Home\Start::class)->name('starting');
    Route::get('/olimpiode/{slug}', App\Livewire\Home\Exam::class)->name('start.quiz');
});

Route::middleware('guest')->group(function(){
    Route::get('/login', Login::class)->name('login');
    Route::get('/register', Register::class)->name('register');
});