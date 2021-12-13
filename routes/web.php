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

Route::get('/', [Controller::class, 'index'])->name('dashboard');

Route::get('/dashboard/find', [Controller::class, 'show']);

Route::get('/dashboard/addEmployee', function (){
    return view('addEmployee');
})->name('addEmployee');

Route::post('/dashboard/addEmployee', [Controller::class, 'addEmployee']);

Route::delete('/dashboard/deleteEmployee', [Controller::class, 'deleteEmployee']);

Route::get('/dashboard/editEmployee/{user_id}', [Controller::class, 'showEdit'])->name('editEmployee');

Route::put('/dashboard/editEmployee', [Controller::class, 'editEmployee']);
