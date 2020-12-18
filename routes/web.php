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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// CUSTOMER

Route::get('/dash', function() {
    return view('home.index');
});

Route::get('/login_consumer', function() {
    return view('home.pages.login');
});

Route::get('/register_consumer', function() {
    return view('home.pages.register');
});

Route::get('/movie_lists', function() {
    return view('home.pages.movie_lists');
});

Route::get('/movie_details', function() {
    return view('home.pages.movie_details');
});

Route::get('/gallery', function() {
    return view('home.pages.gallery');
});

Route::get('/thankyou', function() {
    return view('home.pages.thankyou');
});

Route::get('/checkout', function() {
    return view('home.pages.checkout');
});

Route::get('/transaction_history', function() {
    return view('home.pages.transaction');
});

Route::get('/construction', function() {
    return view('home.pages.under_construction');
});

Route::get('/404', function() {
    return view('home.pages.404');
});

// PORTAL

Route::get('/portal', function() {
    return view('portal.pages.index');
})->name('home');

// members

Route::get('/members', function() {
    return view('portal.pages.manage_members');
})->name('members');

Route::get('/recently_members', function() {
    return view('portal.pages.recently_members');
})->name('recently_members');

Route::get('/waiting_members', function() {
    return view('portal.pages.waiting_members');
})->name('waiting_members');

// customers

Route::get('/customers', function() {
    return view('portal.pages.manage_customers');
})->name('customers');

Route::get('/free_customers', function() {
    return view('portal.pages.free_customers');
})->name('free_customers');

Route::get('/premium_customers', function() {
    return view('portal.pages.premium_customers');
})->name('premium_customers');

// items

Route::get('/cinemas', function() {
    return view('portal.pages.cinemas');
})->name('cinemas');

Route::get('/films', function() {
    return view('portal.pages.films');
})->name('films');

Route::get('/cinema_seats', function() {
    return view('portal.pages.cinema_seats');
})->name('cinema_seats');

// ticket management

Route::get('/ticket', function() {
    return view('portal.pages.ticket');
})->name('ticket');

Route::get('/promote_code', function() {
    return view('portal.pages.promote_code');
})->name('promote_code');

// transaction

Route::get('/transaction', function() {
    return view('portal.pages.transaction');
})->name('transaction');

// additional features

// User settings

Route::get('/user_settings', function() {
    return view('portal.pages.user_settings');
})->name('user_settings');

Route::get('/user_settings/edit', function() {
    return view('portal.pages.user_setting_edit');
})->name('user_settings_edit');

// auth

Route::get('/register', function() {
    return view('portal.pages.register');
})->name('login');

Route::get('/login', function() {
    return view('portal.pages.login');
})->name('login');

Route::get('/logout', function() {
    return view('portal.index');
})->name('user_settings');

