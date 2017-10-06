<?php

Route::get('/api', 'KubaMarkiewicz\Neotecman\Api\Index@index');

Route::get('/api/contact', 'KubaMarkiewicz\Neotecman\Api\Contact@send');
