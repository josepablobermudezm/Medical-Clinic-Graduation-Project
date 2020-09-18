<?php

use Illuminate\Support\Facades\Route;


use Illuminate\Http\Request;

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
Route::get('/Reportes', function () {
    return view('Reportes');
})->name('reportes');

Route::get('/auth', function () {
    return view('auth.register');
})->name('auth');

Route::post('/upload','usuariosController@subirImagen');

Route::get('pdf/{user}', 'ReportGeneratorController@ReporteCurriculum')->name('pdf');//Reportecurriculum
Route::get('pdf2', 'ReportGeneratorController@ReporteEmpleos')->name('pdf2');//ReporteEmpresa
Route::get('pdf3/{user}', 'ReportGeneratorController@ReporteEmpresa')->name('pdf3');//ReporteEmpresa
Route::get('pdf4/{user}', 'ReportGeneratorController@ReporteOferta')->name('pdf4');//Reporteoferta
Route::get('pdf5', 'ReportGeneratorController@ReporteGrafico')->name('pdf5');//ReporteGrafico

Route::get('requisitos/offer/{id}', 'requisitosController@offer')->name('offer');
Route::get('experiencias/curriculum/{id}', 'experienciasController@curriculum')->name('exp');
Route::get('formaciones/curriculum/{id}', 'formacionesController@curriculum')->name('form');

Route::post('usuarios/save', 'usuariosController@save');

Route::get('ofertas/filter/', [
    'as' => 'filter', 'uses' => 'ofertasController@filter'
]);

Route::get('usuarios/filtro/', [
    'as' => 'filtro', 'uses' => 'usuariosController@filtro'
]);


Route::get('pacientes/VerExpediente/{id}', 'pacientesController@VerExpediente')->name('VerExpediente');
Route::get('expediente/VerAntecedenteGinecologico/{id}', 'expedienteController@VerAntecedenteGinecologico')->name('VerAntecedenteGinecologico');
Route::get('expediente/create/{id}', 'expedienteController@create')->name('createExp');
Route::get('antecedentesginecologicos/create/{id}', 'antecedentesginecologicosController@create')->name('create');

Route::post('expediente/store/{id}', [
    'as' => 'store', 'uses' => 'expedienteController@store'
]);

Route::post('antecedentesginecologicos/store/{id}', [
    'as' => 'store', 'uses' => 'antecedentesginecologicosController@store'
]);

Route::get('requisitos/show/{id}/{oferta}', [
    'as' => 'show', 'uses' => 'requisitosController@show'
]);

Route::get('usuarios/listaEmpresas/', [
    'as' => 'listaEmpresas', 'uses' => 'usuariosController@listaEmpresas'
]);

Route::get('ofertas/listaOfertas/', [
    'as' => 'listaOfertas', 'uses' => 'ofertasController@listaOfertas'
]);

Route::get('ofertas/listaEmpleos/', [
    'as' => 'listaEmpleos', 'uses' => 'ofertasController@listaEmpleos'
]);

Route::post('ofertas/inscribir/{ofID}', [
    'as' => 'inscribir', 'uses' => 'ofertasController@inscribir'
]);

Route::get('ofertas/listaCandidatos/{ofID}', [
    'as' => 'listaCandidatos', 'uses' => 'ofertasController@listaCandidatos'
]);

Route::get('requisitos/edit/{id}/{oferta}', [
    'as' => 'edit', 'uses' => 'requisitosController@edit'
]);

Route::patch('requisitos/update/{id}/{oferta}', [
    'as' => 'update', 'uses' => 'requisitosController@update'
]);

Route::delete('requisitos/destroy/{id}/{oferta}', [
    'as' => 'destroy', 'uses' => 'requisitosController@destroy']);



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('curriculums', 'curriculumsController');
Route::resource('usuarios', 'usuariosController');
Route::resource('experiencias', 'experienciasController');
Route::resource('ofertas', 'ofertasController');
Route::resource('requisitos', 'requisitosController');
Route::resource('formaciones', 'formacionesController');
Route::resource('pacientes', 'pacientesController');
Route::resource('expediente', 'expedienteController');
Route::resource('antecedentesginecologicos', 'antecedentesginecologicosController');
Route::get('/agenda', 'agendaController@index');
Route::get('/agenda/listar', 'agendaController@listar');
Route::post('/agenda/guardar', 'agendaController@guardar');
Route::post('/agenda/editar', 'agendaController@editar');
Route::post('/agenda/eliminar', 'agendaController@eliminar');
