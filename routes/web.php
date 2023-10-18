<?php

use App\Http\Controllers\FormController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('form');
// });

Route::get("/", [FormController::class, "form"])->name("/");
Route::post("store_data", [FormController::class, "store_data"])->name("store_data");
Route::post("update_data/{id}", [FormController::class, "update_data"])->name("update_data");
Route::get("show", [FormController::class, "show"])->name("show");
Route::get("delete/{id}", [FormController::class, "delete"])->name("delete");
Route::get("edit/{id}", [FormController::class, "edit"])->name("edit");
