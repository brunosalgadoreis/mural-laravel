<?php

use App\Http\Controllers\IntraController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use PhpParser\Node\Expr\FuncCall;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|


Route::get('/', function () {
    return view('welcome');
});
*/

Route::middleware(['auth'])->group(function () {
    Route::get('/intra', 'Intra\IntraController@index')->name('wall');

    Route::middleware(['admin'])->group(function () {

        Route::get('/intra/user', 'Intra\UserController@create')->name('cad_user');
        Route::post('/intra/user', 'Intra\UserController@store');
        Route::get('/intra/user/edit/{id}', 'Intra\UserController@edit');
        Route::put('/intra/user/update/{id}', 'Intra\UserController@update');
        Route::delete('/intra/user/{id}', 'Intra\UserController@destroy');

        Route::get('/intra/operation', 'Intra\OperationController@create')->name('cad_operation');
        Route::post('/intra/operation', 'Intra\OperationController@store');
        Route::delete('/intra/operation/{id}', 'Intra\OperationController@destroy');

        Route::get('/intra/role', 'Intra\RoleController@create')->name('cad_role');
        Route::post('/intra/role', 'Intra\RoleController@store');
        Route::delete('/intra/role/{id}', 'Intra\RoleController@destroy');

        Route::get('/intra/wall', 'Intra\WallController@create')->name('cad_wall');
        Route::post('/intra/wall', 'Intra\WallController@store');
        Route::delete('/intra/wall/{id}', 'Intra\WallController@destroy');
    });
});
Route::get('/intra/login', 'Intra\LoginController@index')->name('loginsw');
Route::post('/intra/login', 'Intra\LoginController@login');

Route::get('/intra/register', 'Intra\RegisterController@create')->name('register');
Route::post('/intra/register', 'Intra\RegisterController@store');

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/exit', function () {

    Auth::logout();
    return redirect('intra/login');
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
