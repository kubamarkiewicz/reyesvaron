<?php

Route::get('/api', 'KubaMarkiewicz\Reyesvaron\Api\Index@index');

Route::get('/api/contact', 'KubaMarkiewicz\Reyesvaron\Api\Contact@send');
