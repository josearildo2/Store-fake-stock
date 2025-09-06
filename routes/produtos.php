<?php

use App\Http\Controllers\Produto\ProdutoController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth')->group(function () {
    Route::get('/produtos', [ProdutoController::class, 'index'])->name('produtos.index');
});
