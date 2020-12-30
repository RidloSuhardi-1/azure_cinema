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

Route::get('/home', 'HomeController@index');

//-----------------------Customer login----------------------------//
Auth::routes();
Route::get('/login_consumer', 'UserController@indexLogin');
Route::post('/hhhh', 'UserController@login');
Route::get('/register_consumer', 'UserController@indexRegister');
Route::post('/proses', 'UserController@register');
Route::post('/logout_consumer', 'UserController@logout');

//--------------------------Customers All logic------------------------//
Route::post('/customer/store', 'ManageUserController@store');
Route::get('/customer/id/{id}/edit', 'ManageUserController@viewUpdate');
Route::post('/customer/id/{id}/update', 'ManageUserController@update');
Route::get('/customer/id/{id}/destroy', 'ManageUserController@destroy');
Route::get('/customer/search/{key}', 'ManageUserController@search')->name('customer.search');

//--------------------------Customers Premium Logic-------------------//
Route::post('/premium_customer/store', 'ManageUserController@store');
Route::get('/premium_customer/id/{id}/edit', 'ManageUserController@viewUpdate');
Route::post('/premium_customer/id/{id}/update', 'ManageUserController@update');
Route::get('/premium_customer/id/{id}/destroy', 'ManageUserController@destroy');
Route::get('/premium_customer/search/{key}', 'ManageUserController@search')->name('customerpremium.search');

//--------------------------Customers Free Logic-------------------//
Route::post('/free_customer/store', 'ManageUserController@store');
Route::get('/free_customer/id/{id}/edit', 'ManageUserController@viewUpdate');
Route::post('/free_customer/id/{id}/update', 'ManageUserController@update');
Route::get('/free_customer/id/{id}/destroy', 'ManageUserController@destroy');
Route::get('/free_customer/search/{key}', 'ManageUserController@search')->name('customerfree.search');

//--------------------------Manage All Customer-------------------------//
 Route::get('/free_customers','ManageUserController@show')->name('customers.free');
 Route::get('/premium_customers','ManageUserController@showpremium')->name('customers.premium');
 Route::get('/usermanage', 'ManageUserController@manage')->name('customers');

//--------------------------Manage All Member------------------------------//
Route::get('/membermanage', 'ManageMemberController@manage')->name('members');

//--------------------------Members All Logic-----------------------------//
Route::post('/member/store', 'ManageMemberController@store');
Route::get('/member/id/{id}/edit', 'ManageMemberController@viewUpdate');
Route::post('/member/id/{id}/update', 'ManageMemberController@update');
Route::get('/member/id/{id}/destroy', 'ManageMemberController@destroy');
Route::get('/member/search/{key}', 'ManageMemberController@search')->name('member.search');


 // ------------------------- Landing---------------------------- //
Route::get('/', function() {
    return view('portal.index');
});

//-------------------------Manage User--------------------------//


// ------------------------- Cinema---------------------------- //
Route::get('/cinemas', 'CinemaController@viewCinemas')->name('cinemas');
Route::get('/cinema/id/{id}/edit', 'CinemaController@viewUpdate');

// cinemas logic
Route::post('/cinema/store', 'CinemaController@store');
Route::post('/cinema/id/{id}/update', 'CinemaController@update');
Route::get('/cinema/id/{id}/destroy', 'CinemaController@destroy');
Route::get('/cinema/search/{key}', 'CinemaController@search')->name('cinema.search');

// ------------------------- Cinema Seats ---------------------------- //

Route::get('/cinema/id/{id}/seats', 'SeatController@viewSeats')->name('seats');
Route::get('/cinema/seat/id/{id}/edit', 'SeatController@viewUpdate');

// cinema seats logic
Route::post('/cinema/id/{id}/seat/store', 'SeatController@store');
Route::post('/cinema/seat/id/{id}/update', 'SeatController@update');
Route::get('/cinema/seat/id/{id}/destroy', 'SeatController@destroy');

// ------------------------- Films ---------------------------- //

Route::get('/films', 'FilmController@viewFilms')->name('films');
Route::get('/film/id/{id}', 'FilmController@viewFilmDetails');
Route::get('/film/id/{id}/edit', 'FilmController@viewUpdate');

// films logic
Route::post('/film/store', 'FilmController@store');
Route::post('/film/id/{id}/update', 'FilmController@update');
Route::get('/film/id/{id}/destroy', 'FilmController@destroy');
Route::get('/film/search/{key}', 'FilmController@search')->name('film.search');

// ------------------------- Ticket ---------------------------- //

Route::get('/tickets', 'TicketController@viewTickets')->name('tickets');
Route::get('/ticket/id/{id}/edit', 'TicketController@viewUpdate');

// tickets logic
Route::post('/ticket/store', 'TicketController@store');
Route::get('/ticket/id/{id}/destroy', 'TicketController@destroy');

// ------------------------- Promote Code ---------------------------- //

Route::get('/codes', 'CodeController@viewCodes')->name('codes');
Route::get('/code/id/{id}/edit', 'CodeController@viewUpdate');

// promote code logic
Route::post('/code/store', 'CodeController@store');
Route::post('/code/id/{id}/update', 'CodeController@update');
Route::get('/code/id/{id}/destroy', 'CodeController@destroy');
Route::get('/code/search/{key}', 'CodeController@search')->name('code.search');

// ------------------------- Transaction ---------------------------- //

Route::get('/transactions', 'TransactController@viewTransactions')->name('transactions');
Route::get('/transaction/add', 'TransactController@add')->name('transaction.add');
Route::get('/transaction/id/{id}/details', 'TransactController@viewDetails');

// promote code logic
Route::get('/transaction/id/{id}/destroy', 'TransactController@destroy');
Route::get('/transaction/search/{key}', 'TransactController@search')->name('transaction.search');

// ------------------------- Text Here ---------------------------- //



// CUSTOMER

Route::get('/dash', function() {
    return view('home.index');
});

// Route::get('/login_consumer', function() {
//     return view('home.pages.login');
// });

// Route::get('/register_consumer', function() {
//     return view('home.pages.register');
// });

// Route::get('/movie_lists', function() {
//     return view('home.pages.movie_lists');
// });

// Route::get('/movie_details', function() {
//     return view('home.pages.movie_details');
// });

// Route::get('/gallery', function() {
//     return view('home.pages.gallery');
// });

// Route::get('/thankyou', function() {
//     return view('home.pages.thankyou');
// });

// Route::get('/checkout', function() {
//     return view('home.pages.checkout');
// });

// Route::get('/transaction_history', function() {
//     return view('home.pages.transaction');
// });

// Route::get('/construction', function() {
//     return view('home.pages.under_construction');
// });

// Route::get('/404', function() {
//     return view('home.pages.404');
// });

// // PORTAL

// Route::get('/portalEmployee', function() {
//     return view('portal.pages.index');
// })->name('home');

// // members

// Route::get('/members', function() {
//     return view('portal.pages.manage_members');
// })->name('members');

// Route::get('/recently_members', function() {
//     return view('portal.pages.recently_members');
// })->name('recently_members');

// Route::get('/waiting_members', function() {
//     return view('portal.pages.waiting_members');
// })->name('waiting_members');

// // customers

// Route::get('/customers', function() {
//     return view('portal.pages.manage_customers');
// })->name('customers');

// Route::get('/free_customers', function() {
//     return view('portal.pages.free_customers');
// })->name('free_customers');

// Route::get('/premium_customers', function() {
//     return view('portal.pages.premium_customers');
// })->name('premium_customers');

// // items

// Route::get('/cinemas', 'CinemaController@showCinemas')->name('cinemas');

// Route::get('/films', function() {
//     return view('portal.pages.films');
// })->name('films');

// Route::get('/cinema_seats', function() {
//     return view('portal.pages.cinema_seats');
// })->name('cinema_seats');

// // ticket management

// Route::get('/ticket', function() {
//     return view('portal.pages.ticket');
// })->name('ticket');

// Route::get('/promote_code', function() {
//     return view('portal.pages.promote_code');
// })->name('promote_code');

// // transaction

// Route::get('/transaction', function() {
//     return view('portal.pages.transaction');
// })->name('transaction');

// // additional features

// // User settings

// Route::get('/user_settings', function() {
//     return view('portal.pages.user_settings');
// })->name('user_settings');

// Route::get('/user_settings/edit', function() {
//     return view('portal.pages.user_setting_edit');
// })->name('user_settings_edit');

// // auth

// Route::get('/register', function() {
//     return view('portal.pages.register');
// })->name('login');

// Route::get('/login', function() {
//     return view('portal.pages.login');
// })->name('login');



