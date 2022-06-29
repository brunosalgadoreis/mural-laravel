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
*/

Route::get('/', function () {
    return view('welcome');
});


Route::middleware(['auth'])->group(function () {
    Route::get('/intra', 'Intra\IntraController@index')->name('mural');

    Route::middleware(['admin'])->group(function () {

        Route::get('/intra/user', 'Intra\UserController@create')->name('cad_user');
        Route::post('/intra/user', 'Intra\UserController@store');
        Route::get('/intra/user/edit/{id}', 'Intra\UserController@edit');
        Route::put('/intra/user/update/{id}', 'Intra\UserController@update');
        Route::delete('/intra/user/{id}', 'Intra\UserController@destroy');

        Route::get('/intra/operacao', 'Intra\OperacaoController@create')->name('cad_operacao');
        Route::post('/intra/operacao', 'Intra\OperacaoController@store');
        Route::delete('/intra/operacao/{id}', 'Intra\OperacaoController@destroy');

        Route::get('/intra/cargo', 'Intra\CargoController@create')->name('cad_cargo');
        Route::post('/intra/cargo', 'Intra\CargoController@store');
        Route::delete('/intra/cargo/{id}', 'Intra\CargoController@destroy');

        Route::get('/intra/mural', 'Intra\MuralController@create')->name('cad_mural');
        Route::post('/intra/mural', 'Intra\MuralController@store');
        Route::delete('/intra/mural/{id}', 'Intra\MuralController@destroy');
    });
});
Route::get('/intra/entrar', 'Intra\EntrarController@index')->name('entrar');
Route::post('/intra/entrar', 'Intra\EntrarController@entrar');

Route::get('/intra/register', 'Intra\RegisterController@create')->name('register');
Route::post('/intra/register', 'Intra\RegisterController@store');

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/sair', function () {

    Auth::logout();
    return redirect('intra/entrar');
});




Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
