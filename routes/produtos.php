<?php

use App\Http\Controllers\Produto\ProdutoApiController;
use App\Http\Controllers\Produto\ProdutoController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth')->group(function () {
    Route::get('/produtos', [ProdutoController::class, 'index'])->name('produtos.index');
    Route::get('/produtos/editar/{produto}', [ProdutoController::class, 'edit'])->name('produtos.edit');

    Route::delete('/produtos/{produto}', [ProdutoController::class, 'destroy'])->name('produtos.destroy');
    Route::put('/produtos/{produto}', [ProdutoController::class, 'update'])->name('produtos.update');

    Route::get('/produtos/importar', [ProdutoApiController::class, 'importar'])->name('produtos.importar');
    Route::get('/produtos/create', [ProdutoController::class, 'create'])->name('produtos.create');
});
