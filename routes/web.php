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

Route::get('/', 'HomeController@landingPage')->name('landingpage');
Route::get('pesantren/', 'HomeController@pesantrenAll')->name('pesantren.public.all');
Route::get('pesantren/{slug}', 'HomeController@pesantren')->name('pesantren.public');
Route::get('pesantren/{slug}/register', 'HomeController@createSantri')->name('santri.create');
Route::post('pesantren/{slug}/register', 'HomeController@storeSantri')->name('santri.store');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/unauthorized', function(){
    return view('errors.401');
})->name('unauthorized');

/**
 * Absent
 */
Route::post('/absent', 'AbsentController@store')->name('absent.store');

Route::namespace('SuperAdmin')->prefix('superadmin')->middleware('auth', 'checkSuperAdmin')->name('superadmin.')->group(function () {
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/profile', 'HomeController@profile')->name('profile.edit');
    Route::put('/profile', 'HomeController@updateProfile')->name('profile.update');

    /** 
     * Pesantren Routes
    */
    // Suspend
    Route::get('pesantren/suspend', 'PesantrenController@listSuspend')->name('pesantren.listSuspend');
    Route::put('pesantren/suspend/{pesantren}', 'PesantrenController@changeSuspend')->name('pesantren.changeSuspend');
    // Account
    Route::post('pesantren/{pesantren}/account', 'PesantrenController@storeAccount')->name('pesantren.storeAccount');
    Route::get('pesantren/{pesantren}/account/{user}', 'PesantrenController@editAccount')->name('pesantren.editAccount');
    Route::put('pesantren/{pesantren}/account/{user}', 'PesantrenController@updateAccount')->name('pesantren.updateAccount');
    Route::delete('pesantren/{pesantren}/account/{user}', 'PesantrenController@destroyAccount')->name('pesantren.destroyAccount');
    // CRUD Pesantren 
    Route::resource('pesantren', 'PesantrenController');
});

Route::namespace('PesantrenAdmin')->prefix('pesantrenadmin')->middleware('auth', 'checkPesantrenAdmin')->name('pesantrenadmin.')->group(function () {
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/profile', 'HomeController@profile')->name('profile.edit');
    Route::put('/profile', 'HomeController@updateProfile')->name('profile.update');

    // Pesantren
    Route::get('/pesantren/edit', 'PesantrenController@edit')->name('pesantren.edit');
    Route::put('/pesantren/update/{pesantren}', 'PesantrenController@update')->name('pesantren.update');

    // Admin
    Route::resource('/admin', 'AdminController');
});

Route::namespace('AdministrationAdmin')->prefix('administrationadmin')->middleware('auth', 'checkAdministrationAdmin')->name('administrationadmin.')->group(function () {
    Route::get('/home', 'HomeController@index')->name('home');
    Route::post('/online_registration', 'HomeController@onlineRegistration')->name('online_registration');
    Route::get('/profile', 'HomeController@profile')->name('profile.edit');
    Route::put('/profile', 'HomeController@updateProfile')->name('profile.update');
    
    // Subject
    Route::resource('subject', 'SubjectController');

    // Class
    Route::get('class/{class}/input', 'ClassesController@input')->name('class.input');
    Route::post('class/{class}/insert', 'ClassesController@insert')->name('class.insert');
    Route::delete('class/{class}/remove', 'ClassesController@remove')->name('class.remove');
    Route::resource('class', 'ClassesController');

    /**
     * Asatidz Routes
     */
    Route::resource('asatidz', 'AsatidzController');
    // Family
    Route::get('asatidzfamily/create/{asatidz}', 'AsatidzFamilyController@create')->name('asatidzfamily.create');
    Route::resource('asatidzfamily', 'AsatidzFamilyController')->except('create');
    // Schedule
    Route::get('asatidzschedule/create-bluk', 'AsatidzScheduleController@createBulk')->name('asatidzschedule.createBulk');
    Route::post('asatidzschedule/create-bluk', 'AsatidzScheduleController@storeBulk')->name('asatidzschedule.storeBulk');
    Route::get('asatidzschedule/create/{asatidz}', 'AsatidzScheduleController@create')->name('asatidzschedule.create');
    Route::resource('asatidzschedule', 'AsatidzScheduleController')->except('create');
    // Subject
    Route::get('asatidzsubject/create/{subject}', 'AsatidzSubjectController@create')->name('asatidzsubject.create');
    Route::resource('asatidzsubject', 'AsatidzSubjectController')->except('create');
    // Absent
    Route::resource('asatidzabsent', 'AsatidzAbsentController');

    /**
    * Santri Routes
     */
     Route::get('santri/verification', 'SantriController@verification')->name('santri.verification');
     Route::get('santri/verification/{santri}', 'SantriController@verificationCheck')->name('santri.verification.show');
     Route::post('santri/verification/', 'SantriController@verify')->name('santri.verification.verify');
     Route::get('santri/verification/{santri}/detail', 'SantriController@verificationDetail')->name('santri.verification.detail');
     Route::delete('santri/verification/{santri}', 'SantriController@verificationReject')->name('santri.verification.reject');
     Route::resource('santri', 'SantriController');
     Route::get('santri/family/{user}', 'AsatidzFamilyController@createSantri')->name('asatidzfamily.createSantri');

     // Report
     Route::resource('report', 'ReportController');

     // Pesantren Type
     Route::resource('pesantrentype', 'PesantrenTypeController');
     
     // Registration
     Route::resource('registration', 'RegistrationController');

     // Announcement
     Route::resource('announcement', 'AnnouncementController')->except('show');

     /**
      * Chat Routes
      */
      Route::get('chat', 'ChatController@index')->name('chat.index');
      Route::get('chat/{chat}', 'ChatController@show')->name('chat.show');
      Route::post('chat', 'ChatController@store')->name('chat.store');
});

Route::namespace('FinanceAdmin')->prefix('financeadmin')->middleware('auth', 'checkFinanceAdmin')->name('financeadmin.')->group(function () {
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/profile', 'HomeController@profile')->name('profile.edit');
    Route::put('/profile', 'HomeController@updateProfile')->name('profile.update');

    // Salary
    Route::get('salary/unreceived', 'SalaryController@unreceived')->name('salary.unreceived');
    Route::resource('salary', 'SalaryController');

    // Bill
    Route::resource('bill', 'BillController');

    // Bill Transaction
    Route::get('bill/transaction/{billTransaction}/invoice', 'BillTransactionController@invoice')->name('billTransaction.invoice');
    Route::get('bill/transaction/index', 'BillTransactionController@index')->name('billTransaction.index');
    Route::get('bill/transaction/{bill}/create', 'BillTransactionController@create')->name('billTransaction.create');
    Route::get('bill/transaction/unpaid', 'BillTransactionController@unpaid')->name('billTransaction.unpaid');
    Route::get('bill/transaction/confirm', 'BillTransactionController@confirm')->name('billTransaction.confirm');
    Route::get('bill/transaction/confirm/{billtransaction}/{status}', 'BillTransactionController@doConfirm')->name('billTransaction.doConfirm');
    Route::post('bill/transaction/store', 'BillTransactionController@store')->name('billTransaction.store');
    Route::post('bill/transaction/storeAll', 'BillTransactionController@storeAll')->name('billTransaction.storeAll');

    // Top Up
    Route::get('topup/santri', 'TopupController@santri')->name('topup.santri');
    Route::post('topup/{topup}/confirm', 'TopupController@confirm')->name('topup.confirm');
    Route::resource('topup', 'TopupController');


    /**
     * Chat Routes
    */
    Route::get('chat', 'ChatController@index')->name('chat.index');
    Route::get('chat/{chat}', 'ChatController@show')->name('chat.show');
    Route::post('chat', 'ChatController@store')->name('chat.store');
});

Route::namespace('Asatidz')->prefix('asatidz')->middleware('auth', 'checkAsatidz')->name('asatidz.')->group(function () {
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/profile', 'HomeController@profile')->name('profile.edit');
    Route::put('/profile', 'HomeController@updateProfile')->name('profile.update');

    // Schedules
    Route::get('schedule', 'ScheduleController@index')->name('schedule.index');

    // Tahfidzs
    Route::resource('tahfidz', 'TahfidzController');

    // Salary
    Route::get('salary', 'HomeController@salary')->name('salary');
    Route::get('salary/{salary}', 'HomeController@salaryConfirm')->name('salary.confirm');
});

Route::namespace('Santri')->prefix('santri')->middleware('auth', 'checkSantri')->name('santri.')->group(function () {
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/profile', 'HomeController@profile')->name('profile.edit');
    Route::put('/profile', 'HomeController@updateProfile')->name('profile.update');
    
    // Tahfdiz
    Route::get('/tahfidz', 'TahfidzController@index')->name('tahfidz.index');

    // Report
    Route::get('/report', 'ReportController@index')->name('report.index');

    // Bill Transaction
    Route::post('billtransaction/pay', 'BillTransactionController@pay')->name('billTransaction.pay');
    Route::get('billtransaction/{billTransaction}/invoice', 'BillTransactionController@invoice')->name('billTransaction.invoice');

    // Topup
    Route::post('topup', 'TopupController@store')->name('topup.store');

    // Chat
    Route::get('chat/{type}', 'ChatController@index')->name('chat.index');
    Route::post('chat', 'ChatController@store')->name('chat.store');
});