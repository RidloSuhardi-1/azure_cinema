<?php

// Auth::routes();


//-----------------------Customer login----------------------------//
Auth::routes();

Route::get('/consumer/login', 'UserController@indexLogin')->name('consumer.login');
Route::post('/consumer/login/process', 'UserController@login')->name('consumer.login.process');
Route::get('/consumer/register', 'UserController@indexRegister')->name('consumer.register');
Route::post('/consumer/register/process', 'UserController@register')->name('consumer.register.process');
Route::post('/consumer/logout', 'UserController@logout')->name('consumer.logout');

//--------------------------Customers All logic------------------------//
Route::post('/customer/store', 'ManageUserController@store');
Route::get('/customer/id/{id}/edit', 'ManageUserController@viewUpdate');
Route::post('/customer/id/{id}/update', 'ManageUserController@update');
Route::get('/customer/id/{id}/destroy', 'ManageUserController@destroy');
Route::get('/customer/search/{key}', 'ManageUserController@search')->name('customer.search');

//--------------------------Customers Premium Logic-------------------//

Route::get('/portal/premium_customer/id/{id}/destroy', 'ManageUserController@destroy');
Route::get('/portal/premium_customer/search/{key}', 'ManageUserController@search')->name('customerpremium.search');

//--------------------------Customers Free Logic-------------------//

Route::get('/portal/free_customer/id/{id}/destroy', 'ManageUserController@destroy');
Route::get('/portal/free_customer/search/{key}', 'ManageUserController@search')->name('customerfree.search');

//--------------------------Manage All Customer-------------------------//
 Route::get('/portal/customer/free','ManageUserController@viewCustomerFree')->name('customers.free');
 Route::get('/portal/customer/premium','ManageUserController@viewCustomerVip')->name('customers.premium');
 Route::get('/portal/customers', 'ManageUserController@viewCustomers')->name('customers');

 Route::get('/portal/customers/print', 'ManageUserController@print')->name('customers.print');


// Customer logic

 Route::get('/portal/customer/{id}/delete', 'ManageUserController@viewCustomers')->name('customer.destroy');
 Route::get('/portal/customer/search/{key}', 'ManageUserController@search')->name('customer.search');
 Route::get('/portal/customer/free/search/{key}', 'ManageUserController@searchFree')->name('customer.free.search');
 Route::get('/portal/customer/premium/search/{key}', 'ManageUserController@searchPremium')->name('customer.premium.search');

//--------------------------Manage All Member------------------------------//
Route::get('/portal/members', 'ManageMemberController@viewMembers')->name('members');

//--------------------------Members All Logic-----------------------------//
Route::post('/portal/member/store', 'ManageMemberController@store')->name('member.store');
Route::get('/portal/member/id/{id}/edit', 'ManageMemberController@viewUpdate')->name('member.edit');
Route::post('/portal/member/id/{id}/update', 'ManageMemberController@update')->name('member.update');
Route::get('/portal/member/id/{id}/destroy', 'ManageMemberController@destroy')->name('member.destroy');
Route::get('/portal/member/search/{key}', 'ManageMemberController@search')->name('member.search');

// Customer

// ------------------------- Homepage Customer---------------------------- //

Route::get('/', 'HomeController@index')->name('home');

// ------------------------- Movie Details ---------------------------- //

Route::get('/movie/id/{id}', 'PageController@viewMovie')->name('movie.details');
Route::get('/movie/lists', 'PageController@viewMovieLists')->name('movie.lists');
Route::get('/movie/id/{id}/cart', 'PageController@viewMovieCart')->name('movie.carts');

Route::post('/movie/id/{id}/checkout', 'PageController@checkout')->name('movie.checkout');
Route::post('/movie/checkout/process', 'PageController@checkoutProcess')->name('movie.checkout.process');
Route::get('/movie/transactions', 'PageController@viewTransactions')->name('movie.transactions');

// ------------------------- Print ---------------------------- //

Route::get('/movie/ticket/id/{id}/print', 'PageController@print')->name('movie.ticket.print');

// ------------------------- TEXT ---------------------------- //
// ------------------------- TEXT ---------------------------- //

// Portal

// ------------------------- Landing Portal---------------------------- //

Route::get('/portal', function() {
    return view('portal.index');
})->name('portal');

// ------------------------- Homepage Employee ---------------------------- //

Route::get('/portal/home', 'PortalController@index')->name('portal.dashboard');

// ------------------------- Cinema ---------------------------- //

Route::get('/portal/cinemas', 'CinemaController@viewCinemas')->name('cinemas');
Route::get('/portal/cinema/id/{id}/edit', 'CinemaController@viewUpdate')->name('cinema.edit');

// cinemas logic
Route::post('/portal/cinema/store', 'CinemaController@store')->name('cinema.store');
Route::post('/portal/cinema/id/{id}/update', 'CinemaController@update')->name('cinema.update');
Route::get('/portal/cinema/id/{id}/destroy', 'CinemaController@destroy')->name('cinema.destroy');
Route::get('/portal/cinema/search/{key}', 'CinemaController@search')->name('cinema.search');

// ------------------------- Cinema Seats ---------------------------- //

Route::get('/portal/cinema/id/{id}/seats', 'SeatController@viewSeats')->name('seats');
Route::get('/portal/cinema/seat/id/{id}/edit', 'SeatController@viewUpdate')->name('seat.edit');

// cinema seats logic
Route::post('/portal/cinema/id/{id}/seat/store', 'SeatController@store')->name('seat.store');
Route::post('/portal/cinema/seat/id/{id}/update', 'SeatController@update')->name('seat.update');
Route::get('/portal/cinema/seat/id/{id}/destroy', 'SeatController@destroy')->name('seat.destroy');

// ------------------------- Films ---------------------------- //

Route::get('/portal/films', 'FilmController@viewFilms')->name('films');
Route::get('/portal/film/id/{id}', 'FilmController@viewFilmDetails')->name('film.detail');
Route::get('/portal/film/id/{id}/edit', 'FilmController@viewUpdate')->name('film.edit');

// films logic
Route::post('/portal/film/store', 'FilmController@store')->name('film.store');
Route::post('/portal/film/id/{id}/update', 'FilmController@update')->name('film.update');
Route::get('/portal/film/id/{id}/destroy', 'FilmController@destroy')->name('film.destroy');
Route::get('/portal/film/search/{key}', 'FilmController@search')->name('film.search');

// ------------------------- Ticket ---------------------------- //

Route::get('/portal/tickets', 'TicketController@viewTickets')->name('tickets');
Route::get('/portal/ticket/id/{id}/edit', 'TicketController@viewUpdate')->name('ticket.edit');

// tickets logic
Route::post('/portal/ticket/store', 'TicketController@store')->name('ticket.store');
Route::get('/portal/ticket/id/{id}/destroy', 'TicketController@destroy')->name('ticket.destroy');

// ------------------------- Promote Code ---------------------------- //

Route::get('/portal/codes', 'CodeController@viewCodes')->name('codes');
Route::get('/portal/code/id/{id}/edit', 'CodeController@viewUpdate')->name('code.edit');

// promote code logic
Route::post('/portal/code/store', 'CodeController@store')->name('code.store');
Route::post('/portal/code/id/{id}/update', 'CodeController@update')->name('code.update');
Route::get('/portal/code/id/{id}/destroy', 'CodeController@destroy')->name('code.destroy');
Route::get('/portal/code/search/{key}', 'CodeController@search')->name('code.search');

// ------------------------- Transaction ---------------------------- //

Route::get('/portal/transactions', 'TransactController@viewTransactions')->name('transactions');
Route::get('/portal/transaction/add', 'TransactController@add')->name('transaction.add');
Route::get('/portal/transaction/id/{id}/details', 'TransactController@viewDetails');

// promote code logic
Route::get('/portal/transaction/id/{id}/destroy', 'TransactController@destroy');
Route::get('/portal/transaction/search/{key}', 'TransactController@search')->name('transaction.search');

// ------------------------- Text Here ---------------------------- //



// CUSTOMER

// Route::get('/')

// Route::get('/dash', function() {
//     return view('home.index');
// });

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

// Route::get('/portal', function() {
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

// Route::get('/logout', function() {
//     return view('portal.index');
// })->name('user_settings');

