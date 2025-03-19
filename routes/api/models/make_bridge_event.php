<?php

use Illuminate\Support\Facades\Route;

Route::get('policies', 'MakeBridgeEventController@policies')
	->name('policies');

Route::get('policy', 'MakeBridgeEventController@policy')
	->name('policy');

Route::get('index', 'MakeBridgeEventController@index')
	->name('index');

Route::get('show', 'MakeBridgeEventController@show')
	->name('show');

Route::post('create', 'MakeBridgeEventController@create')
	->name('create');

Route::put('update', 'MakeBridgeEventController@update')
	->name('update');

Route::delete('delete', 'MakeBridgeEventController@delete')
	->name('delete');

Route::post('restore', 'MakeBridgeEventController@restore')
	->name('restore');

Route::delete('force-delete', 'MakeBridgeEventController@forceDelete')
	->name('force.delete');

Route::post('export', 'MakeBridgeEventController@export')
	->name('export');