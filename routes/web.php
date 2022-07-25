<?php

use App\Models\Photo;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('photos', function () {
    return Inertia::render('Guest/Photos', [
        'photos' => Photo::all(), ## 👈 Pass a collection of photos, the key will become our prop in the component
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
    ]);
});

Route::middleware(['auth:sanctum', 'verified'])->prefix('admin')->name('admin.')->group(function () {

    Route::get('/', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');

    // other admin routes here

    Route::get('/photos', function () {
        return inertia('Admin/Photos',[
            'photos'=>Photo::orderByDesc('id')->get()
        ]);
    })->name('photos');

    Route::get('/photos/create',function () {
 return inertia('Admin/PhotoCreate');
    })->name('photos.create');

    Route::post('/photos',function () {
        $validate_data= Request::validate([
            'path' => ['required', 'image','max:500'],
            'description' => ['required','max:500'],
        ]);
        $path = Storage::disk('public')->put('photos',Request::file('path'));
        $validate_data['path'] = $path;
//        dd($validate_data);
        Photo::create($validate_data);
             return to_route('admin.photos');
    })->name('photos.store');
});
