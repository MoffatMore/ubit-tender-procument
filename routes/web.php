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


Route::group([
    'prefix' => 'procument/tenders', 'namespace' => 'Procument', 'as' => 'procument.', 'middleware' => ['auth']],
    function () {
    Route::get('bidders', 'HomeController@tenders')->name('tender-bidders');
    Route::get('create', 'HomeController@createTenders')->name('create-tenders');
    Route::get('evaluation', 'HomeController@tenderEvaluation')->name('tender-evaluation');
    Route::get('rejection', 'HomeController@rejectedTenders')->name('rejected-tenders');
    Route::resource('tender', 'TenderController');
});
