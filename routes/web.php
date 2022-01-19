<?php

use App\Http\Controllers\IntraController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/intra', 'IntraController@index')->name('mural');

Route::get('/intra/user', 'UserController@create')->name('cad_user');
Route::post('/intra/user', 'UserController@store');

Route::get('/intra/operacao', 'OperacaoController@create')->name('cad_operacao');
Route::post('/intra/operacao', 'OperacaoController@store');

Route::get('/intra/cargo', 'CargoController@create')->name('cad_cargo');
Route::post('/intra/cargo', 'CargoController@store');

Route::get('/intra/mural', 'MuralController@create')->name('cad_mural');
Route::post('/intra/mural', 'MuralController@store');

Route::get('/intra/entrar', 'EntrarController@index')->name('entrar');
Route::post('/intra/entrar', 'EntrarController@entrar');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/sair', function () {

    Auth::logout();
    return redirect('/intra/entrar');
});