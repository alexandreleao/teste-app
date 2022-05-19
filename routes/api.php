<?php

use App\Http\Controllers\EnderecoController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Http;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/enderecos', [EnderecoController::class,'index']);
Route::post('/endereco', [EnderecoController::class, 'store']);
Route::put('/endereco/{id}', [EnderecoController::class, 'update']);
Route::delete('/endereco/{id}', [EnderecoController::class, 'destroy']);

Route::get('/cidades', [EnderecoController::class, 'listar']);
