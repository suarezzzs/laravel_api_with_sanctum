<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    abort(403, "Access denied to the root path.");
});
