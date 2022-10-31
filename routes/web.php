<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentsController;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auth\GoogleController;
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

Route::get('/', function () {

    return view('welcome');
});



Route::get('posts/index', [PostController::class, 'index'])->name('posts.index')->middleware('auth');
Route::get('posts/create', [PostController::class, 'create'])->name('posts.create')->middleware('auth');
Route::post('posts', [PostController::class, 'store'])->name('posts.store')->middleware('auth');
Route::get('posts/{post}/edit', [PostController::class, 'edit'])->name('posts.edit')->middleware('auth');
Route::get('posts/{post}/show', [PostController::class, 'show'])->name('posts.show')->middleware('auth');
Route::put('posts/{post}/update', [PostController::class, 'update'])->name('posts.update')->middleware('auth');
Route::delete('posts/{post}', [PostController::class, 'destroy'])->name('posts.destroy')->middleware('auth');

Route::get('posts/{post}/comment', [CommentsController::class, 'index'])->name('posts.comments.show')->middleware('auth');
Route::post('posts/comment/storeComment', [CommentsController::class, 'storeComment'])->name('posts.comments.storeComment')->middleware('auth');
// Route::get('posts/{post}/comment', [CommentsController::class, 'destroy'])->name('posts.comments.delete')->middleware('auth');
// Route::post('posts/{post}/comment', [CommentsController::class, 'edit'])->name('posts.comments.edit')->middleware('auth');



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


use Laravel\Socialite\Facades\Socialite;
//Socialites
Route::get('/auth/redirect', function () {
    return Socialite::driver('github')->redirect();
})->name('auth.github');

Route::get('/auth/callback', function () {
    $githubUser = Socialite::driver('github')->user();

    $user = User::where('email', $githubUser->email)->first();
    if($user) {
        $user->update([
            'name' => $githubUser->name,
        ]);
    } else {
        $user = User::create([
            'email' => $githubUser->email,
            'name' => $githubUser->name,
        ]);
    }
    // $user = User::updateOrCreate([
    //     'email' => $githubUser->email,
    // ], [
    //     'name' => $githubUser->name,
    //     'email' => $githubUser->email,
    //     'github_token' => $githubUser->token,
    //     'github_refresh_token' => $githubUser->refreshToken,
    // ]);

    Auth::login($user);

    return redirect('/dashboard');
    dd($user);
    // $user->token
});

//google
// Route::get('auth/google', function () {
//     return Socialite::driver('google')->redirect();
// })->name('auth.google');
Route::get('auth/google', [GoogleController::class, 'redirectToGoogle']);
Route::get('auth/google/callback', [GoogleController::class, 'handleGoogleCallback']);
