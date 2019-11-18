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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('home', 'HomeController@index')->name('home');
Route::get('studregister', 'StudentsController@index')->name('studregister.index');
Route::post('studregister', 'StudentsController@saveStudent')->name('studregister.step1');
Route::get('student/{id}', 'StudentsController@showDetails')->name('student.detail');
Route::get('student/{id}/edit', 'StudentsController@edit')->name('student.edit');
Route::post('student/{id}/update', 'StudentsController@update')->name('student.update');
Route::get('students', 'StudentsController@viewAll')->name('student.viewall');
Route::get('student/{id}/delete', 'StudentsController@delete')->name('student.destroy');
Route::get('bus/{id}/delete', 'StudentsController@stopBus')->name('bus.destroy');
Route::get('preclass/{id}/delete', 'StudentsController@stopPre')->name('preclass.destroy');
// Student edit
Route::get('student/{id}/basic','StudentsController@basic')->name('student.basic');
Route::get('student/{id}/guardian','StudentsController@guardian')->name('student.guardian');
Route::get('student/{id}/bus', 'StudentsController@bus')->name('student.bus');
Route::get('student/{id}/preclass', 'StudentsController@preclass')->name('student.preclass');
Route::post('student/{id}/basic','StudentsController@basicUpdate')->name('student.basic.update');
Route::post('student/{id}/guardian','StudentsController@guardianUpdate')->name('student.guardian.update');
Route::post('student/{id}/bus', 'StudentsController@busUpdate')->name('student.bus.update');
Route::post('student/{id}/preclass', 'StudentsController@preclassUpdate')->name('student.preclass.update');



Route::get('payment/{id}', 'PaymentsController@showDetails' )->name('payment.detail');
Route::get('search', 'PaymentsController@liveSearch')->name('payment.search');
Route::post('payment/{id}', 'PaymentsController@recievePayment')->name('payment.recieve');

// filter unpaid
Route::get('payment/{month}/notpaid','PaymentsController@notPaid')->name('payment.notpaid');

// stat 

Route::get('stat','StatController@index')->name('stat.index');
Route::get('filter','StatController@filter')->name('stat.filter');
Route::get('closepayment', 'PaymentsController@closePayment')->name('payment.close');


