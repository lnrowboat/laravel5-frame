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

/*Route::get('/', function(){
    return json_encode(array('created' => false));
});
*/

Auth::routes();

Route::get('/home', 'HomeController@index');
Route::get('/search', 'CommonController@index');

Route::group(['prefix' => 'search'], function () {
    Route::get('{action}', 'ItemSearchController@index');
});

Route::get('items-lists', ['as'=>'items-lists','uses'=>'ItemSearchController@index']);
Route::post('create-item', ['as'=>'create-item','uses'=>'ItemSearchController@create']);


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

// First route that user visits on consumer app
Route::get('/', function () {
    // Build the query parameter string to pass auth information to our request
    $query = http_build_query([
        'client_id' => 6,
        'redirect_uri' => 'callback',
        'response_type' => 'code',
        'scope' => 'conference'
    ]);

    // Redirect the user to the OAuth authorization page
    return redirect('oauth/authorize?' . $query);
});

// Route that user is forwarded back to after approving on server
Route::get('/callback', function (Request $request) {
    $http = new GuzzleHttp\Client;
    //return para

    $response = $http->post('http://localhost/laravel-frame/public/oauth/token', [
        'form_params' => [
            'grant_type' => 'authorization_code',
            'client_id' => 6, // from admin panel above
            'client_secret' => 'Zc1CtyCLbD52liw9JqQidYbUkA7H6yzTyJ1bm3SM', // from admin panel above
            'redirect_uri' => 'http://somewahere.com',
            'code' => $request->code // Get code from the callback
        ]
    ]);

    // echo the access token; normally we would save this in the DB
    return json_decode((string) $response->getBody(), true)['access_token'];
});


Route::get('/getuser', function () {
    $http = new GuzzleHttp\Client;
    return $http->request('GET', '/api/user', [
        'headers' => [
            'Accept' => 'application/json',
            'Authorization' => 'Bearer '.$accessToken,
        ],
    ]);
});

