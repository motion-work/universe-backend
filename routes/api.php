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
     * Search
     */
    Route::get('search/skillSets/{query}', 'SearchController@skillSets');

    /**
     * Galaxy
     */
    Route::resource('galaxy', 'GalaxyController');
    Route::post('galaxy/invite/{permalink}', 'InviteController@process')->name('process');
    Route::get('invite/accept/{permalink}/{token}', 'InviteController@accept')->name('accept');

    Route::prefix('galaxy')->group(function () {
        Route::post('{permalink}/createSkillSet', 'GalaxyController@storeSkillSet');
    });

    /**
     * SkillSet
     */
    Route::get('skillSets', 'SkillSetController@getSkillSets');
    Route::get('skillSet/{skillSetPermalink}', 'SkillSetController@getSkillSet');

    /**
     * User
     */
    Route::post('user/skillSet/{id}/subscribe', 'UserController@subscribeToSkillSet');
    Route::post('user/skillSet/{id}/unsubscribe', 'UserController@unsubscribeToSkillSet');
    Route::get('user/my-skills', 'UserController@mySkills');

    /**
     * Tag
     */
    Route::resource('tag', 'TagController');

    /**
     * Auth
     */
    Route::get('me', 'AuthController@me');
    Route::get('me/galaxies', 'AuthController@joinedGalaxies');

});
