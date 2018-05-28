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
    if (auth()->check()) {
        switch (auth()->user()->role) {
            case \App\User::ADMINISTRATOR:
                return redirect('/admin');
            case \App\User::TEACHER:
                return redirect('/dashboard');
        }
    }

    return redirect('/login');
});
Auth::routes();


/*
 * Teacher Routes
 */
Route::middleware('auth')->group(function () {
    // Logout
    Route::get('/logout', 'Auth\LoginController@logout')->name('logout');
    // Teacher
    Route::get('/dashboard','Teacher\DashboardController@index')->name('teacher.index');
    Route::get('/couple/{couple}','Teacher\JournalsController@couple')->name('teacher.couple');
    Route::get('/journal/{mouth}/{year}/couple/{couple}','Teacher\JournalsController@show')->name('journal.show');
    Route::get('/journal/create/{couple}','Teacher\JournalsController@create')->name('journal.create');
    Route::post('/journal/store/{couple}','Teacher\JournalsController@store')->name('journal.store');
//Black list
    Route::get('/black-list/','BlackListController@index')->name('black-list.index');
    // Rating
    Route::get('/rating','Teacher\RatingsController@index')->name('rating.index');
    Route::get('/rating/show/{group}','Teacher\RatingsController@show')->name('rating.show');
    /*
     * Admin Routes
     */
    Route::middleware('admin')->prefix('admin')->group(function () {
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
        //Couples
        Route::get('couples', 'Admin\CoupleController@index')->name('couples.index');
        Route::get('couples/create', 'Admin\CoupleController@create')->name('couples.create');
        Route::post('couples/store', 'Admin\CoupleController@store')->name('couples.store');
        Route::delete('couples/delete/{couple}', 'Admin\CoupleController@delete')->name('couples.delete');
    });
});
