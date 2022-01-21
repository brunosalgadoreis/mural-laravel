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
    Route::get('/intra/user', 'Intra\UserController@create')->name('cad_user');
    Route::post('/intra/user', 'Intra\UserController@store');
    Route::get('/intra/operacao', 'Intra\OperacaoController@create')->name('cad_operacao');
    Route::post('/intra/operacao', 'Intra\OperacaoController@store');
    Route::delete('/intra/operacao/{id}', 'Intra\OperacaoController@destroy');
    Route::get('/intra/cargo', 'Intra\CargoController@create')->name('cad_cargo');
    Route::post('/intra/cargo', 'Intra\CargoController@store');
    Route::delete('/intra/cargo/{id}', 'Intra\CargoController@destroy');
    Route::get('/intra/mural', 'Intra\MuralController@create')->name('cad_mural');
    Route::post('/intra/mural', 'Intra\MuralController@store');
});
Route::get('/intra/entrar', 'Intra\EntrarController@index')->name('entrar');
Route::post('/intra/entrar', 'Intra\EntrarController@entrar');


Auth::routes();



    Route::get('/home', 'HomeController@index')->name('home');

    Route::get('/sair', function () {

    Auth::logout();
    return redirect('intra/entrar');
});


