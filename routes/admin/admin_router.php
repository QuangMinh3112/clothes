<?php

use Illuminate\Support\Facades\Route;

// ADMIN MANAGER ROUTER
Route::group(['middleware' => 'auth'], function () {
    Route::get('/users', App\Livewire\User\Index::class)->name('user.index');
    Route::get('/suppliers', App\Livewire\Supplier\Index::class)->name('supplier.index');
    Route::get('/attributes', App\Livewire\Attribute\Index::class)->name('attributes.index');
    Route::get('/categories', App\Livewire\Category\Index::class)->name('categories.index');
    Route::get('/products', App\Livewire\Product\Index::class)->name('products.index');
    Route::get('/products/create', App\Livewire\Product\Create::class)->name('products.create');

});
