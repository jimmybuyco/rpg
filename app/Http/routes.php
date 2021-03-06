

<?php
use Illuminate\Support\Facades\Auth;
/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/


Route::group(['middleware' => 'guest'], function() {
    Route::get('/', 'loginController@welcome');
    Route::get('stats','statsController@getStats');
    Route::get('mine','unitsController@mine');
    Route::get('gather','unitsController@gather');
    Route::get('collect','unitsController@collect');
    Route::get('buy','unitsController@buy');
    Route::get('sell','unitsController@sell');
    Route::get('levelUp','unitsController@levelUp');
    Route::get('attack','combatController@attack');
    Route::get('useItem','itemController@useItem');
    Route::get('defChange','unitsController@defChange');
    Route::get('user/{id}','Controller@viewUser');

});


Route::get('login','loginController@login');
Route::post('doLogin','loginController@doLogin');
Route::get('logout','loginController@logout');

