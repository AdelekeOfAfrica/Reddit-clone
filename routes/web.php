<?php


use Inertia\Inertia;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Application;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Frontend\Communities;
use App\Http\Controllers\Backend\communityController;
use App\Http\Controllers\Backend\CommunityPostController;




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

Route::get('/r/{slug}',[Communities::class,'show'])->name('frontend.community.show');


//rewriting the default middleware 
Route::group(['middleware'=> ['auth', 'verified']], function(){
    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');

Route::resource('/communities',communityController::class);
Route::resource('/dashboard/communities.post',CommunityPostController::class);
    
});



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
