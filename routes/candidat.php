
<?php

use Illuminate\Support\Facades\Route;


Route::group([
    'namespace'  => 'App\Http\Controllers\Front',
    'prefix'     => 'candidature',
    'middleware' => ['auth'],
], function () {
    Route::resource('user', 'CandidatureController');
    // Route::resource('role', 'RoleController');
    // Route::resource('offre', 'OffreController');
});
