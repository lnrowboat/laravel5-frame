<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
use Illuminate\Http\Request;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index');

Route::group(['prefix' => 'git'], function () {
    Route::get('/', 'GitController@notice');
    Route::get('user/{action}', 'GitController@user');
    Route::get('commit', 'GitController@commit');
    Route::get('token', 'GitController@authority1');
    Route::get('repobranches', 'GitController@repobranches');
});


Route::group(['prefix' => 'queue'], function () {
    Route::get('/{action}', 'PodcastController@index');
});


Route::get('/abcd', function(){
    $query = http_build_query([
        'client_id' => 3,
        'redirect_uri' => 'callback',
        'response_type' => 'code',
        'scope' => 'conference',
    ]);
    return redirect('oauth/authorize?'.$query); 
});

Route::get('/callback', function (Request $request) {
    $http = new GuzzleHttp\Client;

    $response = $http->post('oauth/token', [
        'form_params' => [
            'grant_type' => 'authorization_code',
            'client_id' => 5,
            'client_secret' => 'yHJVO7indPQB4SLctv71i5FOopCem9We3k6D4LMV',
            'redirect_uri' => 'callback',
            'code' => $request->code,
        ],
    ]);

    return json_decode((string) $response->getBody(), true);
});