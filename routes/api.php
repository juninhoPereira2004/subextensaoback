<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfissaoController;

Route::get('/', function () {
    return response()->json(['message' => 'Salafácil API', 'status' => 'Connected']);
});

// Rota pública para login
Route::post('/profissao/login', [ProfissaoController::class, 'login']);

// Rotas protegidas por token
Route::prefix('profissao')->group(function () {
    Route::get('/', [ProfissaoController::class, 'index']);
    Route::post('/', [ProfissaoController::class, 'store']);
    Route::get('/{id}', [ProfissaoController::class, 'show']);
    Route::put('/{id}', [ProfissaoController::class, 'update']);
    Route::delete('/{id}', [ProfissaoController::class, 'destroy']);
});
Route::middleware('jwt.auth')->group(function () {

});
