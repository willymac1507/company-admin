<?php

use App\Http\Controllers\CompanyController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\HomeController;
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

Auth::routes();

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('companies', [CompanyController::class, 'index'])->name('companies');
Route::get('companies/{company:id}', [CompanyController::class, 'show'])->name('showCompany');
Route::get('companies/{company:id}/edit', [CompanyController::class, 'edit'])->name('editCompany');

Route::get('company/create', [CompanyController::class, 'create'])->name('createCompany');
Route::post('company/create', [CompanyController::class, 'store'])->name('storeCompany');
Route::patch('companies/{company:id}/edit', [CompanyController::class, 'update'])->name('updateCompany');
Route::delete('companies/{company:id}/delete', [CompanyController::class, 'destroy'])->name('deleteCompany');

Route::get('employees', [EmployeeController::class, 'index'])->name('employees');
Route::get('employees/{employee:id}', [EmployeeController::class, 'show'])->name('showEmployee');
Route::get('employee/create', [EmployeeController::class, 'create'])->name('createEmployee');
Route::post('employee/create', [EmployeeController::class, 'store'])->name('storeEmployee');
