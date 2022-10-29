<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CertificateController as CertificateController;
use Barryvdh\DomPDF\Facade\Pdf;
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
    return redirect()->route('certificates.index');
    //return view('admin.home');
});


Route::get('certificates', [CertificateController::class, 'index'])->name('certificates.index');
Route::post('certificate', [CertificateController::class, 'store'])->name('certificates.store');
Route::put('certificate/{id}', [CertificateController::class, 'update'])->name('certificates.update');

Route::get('certificate/print/{id}', [CertificateController::class, 'print'])->name('certificates.print');
Route::get('certificate/do_print/{id}', [CertificateController::class, 'do_print'])->name('certificates.print');


Route::get('/pdf', function () {
    return view('pdf');
});

Route::get('test', function(){
   
$data = ['name'=>'test'];
    $pdf = Pdf::loadView('pdf', $data);
    return $pdf->download('invoice.pdf');
});