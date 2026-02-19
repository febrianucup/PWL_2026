<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PhotoController;
use App\Http\Controllers\WelcomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index']);

Route::get('/about', [AboutController::class, 'about']);

Route::get('/articles/{id}', [ArticleController::class, 'articles']);

Route::get('/hello', [WelcomeController::class, 'hello']);

Route::get('/world', function() {
    return 'World';
});

Route::get('/massage', function() {
    return 'Selamat Datang';
});

Route::get('/user/{name?}', function($name='Jhon') {
    return 'Nama saya ' . $name;
});

Route::get('/posts/{post}/comments/{comment}', function ($postId, $commentId) {
    return 'Pos ke-'.$postId." Komentar ke-: ".$commentId;
});

// Route::resource('photos', PhotoController::class);

// Jika tidak semua route pada resource controller dibutuhkan dapat dikurangi dengan mengupdate route pada web.php menjadi seperti berikut ini.

Route::resource('photos', PhotoController::class)->only([
    'index', 'show'
]);

Route::resource('photos', PhotoController::class)->except([
    'create', 'store', 'update', 'destroy'
]);

// Route::get('/greeting', function() {
//     return view('hello', ['name' => 'Febrian']);
// });

// Route::get('/greeting', function() {
//     return view('blog.hello', ['name' => 'Febrian']);
// });

Route::get('/greeting', [WelcomeController::class, 'greeting']);