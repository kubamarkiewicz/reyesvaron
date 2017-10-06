<?php

Route::get('/api/{locale}/translations', 'KubaMarkiewicz\Translations\Api\Translations@index');
Route::post('/api/{locale}/translations', 'KubaMarkiewicz\Translations\Api\Translations@add');
