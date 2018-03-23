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

Route::get('/', 'AppController@start')->name('start');
Route::get('/match', 'AppController@makeMatch')->name('match');
Route::get('/pinwall', 'LocationsController@showPinwall')->name('pinwall');
Route::get('/intro', function(){
	return view('intro');
});
Route::get('/click', function(){
	return redirect('/');
});

Route::get('/chat/messages', 'Chat\ChatMessageController@index');
Route::post('/chat/messages', 'Chat\ChatMessageController@store');


// Static Stuff 
Route::get('/frequentquestions', 'Statics\FrequentAskedQuestionsController@index');
Route::get('/survey', function(){
	return view('survey');
})->name('survey');

// Send Feedback
Route::post('/feedback','Feedback\FeedbackController@store');

// Subscribe to Notificaitons
Route::post('/subscribeToNotifications','Account\AccountsController@subscribeToNotifications');
Route::get('/subscribe/activate','Account\AccountsController@activate')->name('subscription.activate');

// send send Mail with token
Route::post('/translateViaMail', 'Account\AccountsController@translateViaMail');
// login via QRCode or sending Email with token and this url
Route::get('/tokenLogin','Account\AccountsController@loginViaToken')->name('login.token');

// unsubscribe from email
Route::get('/unsubscirbe', 'Account\AccountsController@unsubscirbeFromEmail')->name('unsubscirbe');

// umatch api
Route::post('/unmatch','MatchesController@unmatch');

// OneSignal Get Player ID
Route::any('/onesignalid', 'Account\AccountsController@onesignalidAdd')->name('onesignalid');

// dashboard
Route::get('/dashboard', 'Account\AccountsController@dashboard')->name('dashboard');

// Avatar Upload
Route::post('/account/avatar', 'Account\AvatarController@store')->name('account.avatar.store');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


// Api Routen für axios
Route::get('/api/match', 'MatchesController@show')->name('match--api');
