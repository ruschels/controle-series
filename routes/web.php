<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SeriesController;


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
    return redirect('series');
});

/*

Route::get('/series', [SeriesController::class, 'index']);

Route::get('/series/criar', [SeriesController::class, 'create']);

Route::post('/series/salvar', [SeriesController::class, 'store']);
*/

/*Forma nova de organizar rotas de um mesmo controller:

Route::controller(SeriesController::class)->group(function() {
    Route::get('/series', 'index')->name('series.index');
    Route::get('/series/criar', 'create')->name('series.create');
    Route::post('/series/salvar', 'store')->name('series.store');
}); */



//Route::resource('/series', SeriesController::class);
/* assim o laravel já cria diversas rotas para o controller
listar as rotas criadas: php artisan route:list

GET|HEAD        series ............... series.index › SeriesController@index
  POST            series ............... series.store › SeriesController@store
  GET|HEAD        series/create ...... series.create › SeriesController@create
  GET|HEAD        series/{series} ........ series.show › SeriesController@show
  PUT|PATCH       series/{series} .... series.update › SeriesController@update
  DELETE          series/{series} .. series.destroy › SeriesController@destroy
  GET|HEAD        series/{series}/edit ... series.edit › SeriesController@edit
  */

Route::resource('/series', SeriesController::class)
    ->only(['index', 'create', 'store', 'destroy']);
    //assim usamos a sintaxe resource para criar somente as rotas desejadas.

//Route::delete('/series/destroy/{series}', [SeriesController::class, 'destroy'])
    //->name('series.destroy');

