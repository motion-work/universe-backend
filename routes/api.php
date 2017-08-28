<?php

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


Route::middleware(['auth:api'])->group(function () {

    /**
     * Galaxy
     */
    Route::resource('galaxy', 'GalaxyController');
    Route::post('galaxy/invite/{permalink}', 'InviteController@process')->name('process');
    Route::get('invite/accept/{permalink}/{token}', 'InviteController@accept')->name('accept');

    Route::prefix('galaxy')->group(function () {
        Route::post('{permalink}/createSkillSet', 'GalaxyController@storeSkillSet');
        Route::get('{permalink}/skillSets', 'GalaxyController@getSkillSets');
    });

    /**
     * Skill Set
     */
    Route::resource('skill', 'SkillSetController');

    /**
     * Auth
     */
    Route::get('me', 'AuthController@me');
    Route::get('me/galaxies', 'AuthController@joinedGalaxies');

});
