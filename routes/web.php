<?php

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::prefix('admin')->middleware('auth')->group(function(){
    Route::resource('/dashboard','Admin\DashboardController');
    Route::resource('/blog','Admin\AdminBlogController');
    Route::resource('/author','Admin\AuthorController');
    Route::resource('/kategori','Admin\KategoriController');
    Route::resource('/subkategori','Admin\SubKategoriController');
    Route::resource('/tags','Admin\TagsController');
    Route::resource('/status','Admin\StatusController');
    Route::resource('/about','Admin\AboutController');
    Route::resource('/contact','Admin\ContactController');
    Route::get('/contact-user','Admin\ContactController@indexPage')->name('contact.user.index');
});
    

Route::prefix('/user')->group(function(){
    Route::get('/home','BlogController@index')->name('home.index');
    Route::get('/post-detail','BlogController@detail')->name('detail.index');
    Route::get('/post-list','BlogController@list')->name('list.index');
    Route::get('/about','BlogController@about')->name('about.index');
    Route::get('/contact','BlogController@contact')->name('contact.page');
    Route::post('/contact','BlogController@contactStore')->name('contact.user.store');
});


// Route::get('/customer/home', 'Auth\CustomerLoginController@index')->middleware('auth:customer');
// Route::get('/customer/login', 'Auth\CustomerLoginController@showLoginForm')->name('customer.loginform');
// Route::get('/customer/register', 'Auth\CustomerLoginController@showRegisterForm')->name('customer.registerform');
// Route::post('/customer/login', 'Auth\CustomerLoginController@login')->name('customer.login');
// Route::post('/customer/register', 'Auth\CustomerLoginController@register')->name('customer.register');
// Route::get('/customer/logout', 'Auth\CustomerLoginController@logout')->name('customer.logout');

// Route::get('/home', 'HomeController@index')->name('home');
