<?php

use Illuminate\Support\Facades\Route;

Route::get('policies', 'MakeBridgeController@policies')
	->name('policies');

Route::get('policy', 'MakeBridgeController@policy')
	->name('policy');

Route::get('index', 'MakeBridgeController@index')
	->name('index');

Route::get('show', 'MakeBridgeController@show')
	->name('show');

Route::post('create', 'MakeBridgeController@create')
	->name('create');

Route::put('update', 'MakeBridgeController@update')
	->name('update');

Route::delete('delete', 'MakeBridgeController@delete')
	->name('delete');

Route::post('restore', 'MakeBridgeController@restore')
	->name('restore');

Route::delete('force-delete', 'MakeBridgeController@forceDelete')
	->name('force.delete');

Route::post('export', 'MakeBridgeController@export')
	->name('export');