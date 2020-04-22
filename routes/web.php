<?php

    use Illuminate\Support\Facades\Auth;
    use Illuminate\Support\Facades\Route;

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

    Route::redirect('/', '/login', 301);

    Auth::routes();

    Route::get('/home', 'HomeController@index')->name('home');


    Route::resource('bids', 'BiddingController');
    Route::resource('message', 'MessageController');

    Route::group([
        'prefix' => 'procurement/', 'namespace' => 'Procurement', 'as' => 'procurement.', 'middleware' => ['auth']],
        function () {
            Route::get('dashboard', 'HomeController@index')->name('dashboard');
            Route::resource('tender', 'TenderController');

            Route::prefix('tenders/')->group(function () {
                Route::get('bidders', 'HomeController@tenders')->name('tender-bidders');
                Route::get('create', 'HomeController@createTenders')->name('create-tenders');
                Route::get('evaluation', 'HomeController@tenderEvaluation')->name('tender-evaluation');
                Route::get('rejection', 'HomeController@rejectedTenders')->name('rejected-tenders');
                Route::post('publish-results', 'HomeController@publishResults')->name('publish-results');
            });
        });

    Route::group(['prefix' => 'bidder', 'namespace' => 'Bidder', 'as' => 'bidder.', 'middleware' => ['auth']],
        function () {
            Route::get('dashboard', 'HomeController@index')->name('dashboard');
            Route::get('awards', 'HomeController@awards')->name('awards');
            Route::get('tenders', 'HomeController@tenders')->name('tenders');
            Route::get('/show-tender/{tender}', 'HomeController@showTender')->name('show-tender');
            Route::post('/submit-tender', 'HomeController@submitTender')->name('submit-tender');
        });
