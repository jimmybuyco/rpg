

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
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");
header('Content-Type: text/html');

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

});


Route::get('login','loginController@login');
Route::post('doLogin','loginController@doLogin');
Route::get('logout','loginController@logout');

