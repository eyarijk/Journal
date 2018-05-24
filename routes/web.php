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
    return redirect('/admin');
});

Auth::routes();


/*
 * Teacher Routes
 */

Route::get('/dashboard','Teacher\DashboardController@index');


/*
 * Admin Routes
 */

Route::prefix('admin')->group(function () {
    Route::get('/','Admin\AdminController@index')->name('admin.dashboard');
    // Groups
    Route::get('groups', 'Admin\GroupController@index')->name('groups.index');
    Route::get('groups/create', 'Admin\GroupController@create')->name('groups.create');
    Route::post('groups/store', 'Admin\GroupController@store')->name('groups.store');
    Route::delete('groups/delete/{group}', 'Admin\GroupController@delete')->name('groups.delete');
    //Subjects
    Route::get('subjects', 'Admin\SubjectController@index')->name('subjects.index');
    Route::get('subjects/create', 'Admin\SubjectController@create')->name('subjects.create');
    Route::post('subjects/store', 'Admin\SubjectController@store')->name('subjects.store');
    Route::delete('subjects/delete/{subject}', 'Admin\SubjectController@delete')->name('subjects.delete');
    // Teachers
    Route::get('teachers', 'Admin\TeachersController@index')->name('teachers.index');
    Route::get('teachers/create', 'Admin\TeachersController@create')->name('teachers.create');
    Route::post('teachers/store', 'Admin\TeachersController@store')->name('teachers.store');
    Route::delete('teachers/delete/{user}', 'Admin\TeachersController@delete')->name('teachers.delete');
    // Students
    Route::get('students', 'Admin\StudentsController@index')->name('students.index');
    Route::get('students/create', 'Admin\StudentsController@create')->name('students.create');
    Route::post('students/store', 'Admin\StudentsController@store')->name('students.store');
    Route::delete('students/delete/{subject}', 'Admin\StudentsController@delete')->name('students.delete');
});