<?php

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;

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

Route::get('/dashboard', [Controller::class, 'index'])->name('dashboard');

Route::get('/dashboard/find', [Controller::class, 'show']);

Route::get('/dashboard/addEmployee', function (){
    return view('addEmployee');
})->name('addEmployee');

Route::post('/dashboard/addEmployee', [Controller::class, 'addEmployee']);
