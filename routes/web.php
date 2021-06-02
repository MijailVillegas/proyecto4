<?php

use App\Exports\ArticuloExport;
use App\Exports\ClienteExport;
use App\Exports\VentaExport;
use App\Http\Controllers\ChartController;
use App\Http\Controllers\ArticuloController;
use Illuminate\Support\Facades\Route;

use Maatwebsite\Excel\Facades\Excel;
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
    return view('auth.login');
    //return view('welcome');
});


/*
//En caso de usar desde vistas
Route::get('articulos/excel-export', function () {
    return(new ArticuloExport)->download('articulos-report' . date("Y-m-d") . '.xlsx');
});
*/

/*
gráficos 
Route::get('export/gráficos', [ChartController::class, 'index']);
*/

/*
exportar en excel
*/
Route::get('ventas/excel-export', function () {
    return Excel::download(new VentaExport, 'ventas-report' . date("Y-m-d") . '.xlsx');
});
Route::get('articulos/excel-export', function () {
    return Excel::download(new ArticuloExport, 'articulos-report' . date("Y-m-d") . '.xlsx');
});

Route::get('cliente/excel-export', function () {
    return Excel::download(new ClienteExport, 'clientes-report' . date("Y-m-d") . '.xlsx');
});

/*
exportar en PDF
*/
Route::post('articulos-report', [ChartController::class, 'exportPDF']);

Route::get('articulos-report' . date("Y-m-d") . '.pdf', 'App\Http\Controllers\ArticuloController@exportPDF')->name('articulos.export');
//Route::post('articulos-report.pdf', 'App\Http\Controllers\ArticuloController@exportPDF')->name('articulos.export');

Route::get('clientes-report' . date("Y-m-d") . '.pdf', 'App\Http\Controllers\ChartController@exportPDF')->name('clientes.export');


/*Controladores*/

//Route::resource('export', 'App\Http\Controllers\ExportController');
Route::resource('articulos', 'App\Http\Controllers\ArticuloController');
Route::resource('clientes', 'App\Http\Controllers\ClienteController');
Route::resource('detalle_ventas', 'App\Http\Controllers\Detalle_VentaController');
Route::resource('ventas', 'App\Http\Controllers\VentaController');
Route::resource('empleados', 'App\Http\Controllers\EmpleadoController');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard.index');
})->name('dashboard');
