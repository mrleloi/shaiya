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

// Login Routes...
Route::get('dang-nhap', 'Auth\LoginController@showLoginForm')->name('dang-nhap');
Route::post('dang-nhap', 'Auth\LoginController@login')->name('action-dang-nhap');

// Logout Routes...
Route::post('dang-xuat', 'Auth\LoginController@logout')->name('dang-xuat');

// Registration Routes...
Route::get('dang-ky', 'Auth\RegisterController@showRegistrationForm')->name('dang-ky');
Route::post('dang-ky', 'Auth\RegisterController@register')->name('action-dang-ky');

// Password Reset Routes...
Route::get('quen-mat-khau', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('quen-mat-khau');
Route::post('quen-mat-khau', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('action-quen-mat-khau');
Route::get('reset-mat-khau/{token}', 'Auth\ResetPasswordController@showResetForm')->name('reset-mat-khau');
Route::post('reset-mat-khau', 'Auth\ResetPasswordController@reset')->name('action-reset-mat-khau');

Route::middleware(['auth:web'])->group(function () {
    Route::get('doi-mat-khau','UserController@changePassword')->name('doi-mat-khau');
    Route::post('doi-mat-khau','UserController@actionChangePassword')->name('action-doi-mat-khau');

    Route::get('doi-email','UserController@changeEmail')->name('doi-email');
    Route::post('doi-email','UserController@actionChangeEmail')->name('action-doi-email');
});

// Web Pages
Route::get('/', 'HomeController@index')->name('home');
Route::get('/server-info', 'ServerInfoController@index')->name('server-info');
Route::get('/chien-tich', 'ChienTichController@index')->name('chien-tich');
Route::get('/download', 'DownloadController@index')->name('download');
Route::get('/huong-dan', 'HuongDanController@index')->name('huong-dan');
Route::get('/nap-the', 'NapTheController@index')->name('nap-the');
Route::get('/quy-dinh', 'QuyDinhController@index')->name('quy-dinh');
Route::get('/top-rank', 'TopRankController@index')->name('top-rank');

// ADMIN

Route::group(['prefix' => 'admin', 'namespace' => 'Admin'], function () {
    \Illuminate\Support\Facades\Auth::routes();
});

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin'], function () {
    Route::redirect('/', '/login');

    Route::get('/home', function () {
        if (session('status')) {
            return redirect()->route('admin.home')->with('status', session('status'));
        }

        return redirect()->route('admin.home');
    });

    Route::group(['prefix' => 'profile', 'as' => 'profile.', 'namespace' => 'Auth', 'middleware' => ['auth:admin']], function () {
        // Change password
        if (file_exists(app_path('Http/Controllers/Admin/Auth/ChangePasswordController.php'))) {
            Route::get('password', 'ChangePasswordController@edit')->name('password.edit');
            Route::post('password', 'ChangePasswordController@update')->name('password.update');
            Route::post('profile', 'ChangePasswordController@updateProfile')->name('password.updateProfile');
            Route::post('profile/destroy', 'ChangePasswordController@destroy')->name('password.destroyProfile');
        }
    });

    Route::group(['middleware' => ['auth:admin']], function () {
        Route::get('/', 'HomeController@index')->name('home');
        // Permissions
        Route::delete('permissions/destroy', 'PermissionsController@massDestroy')->name('permissions.massDestroy');
        Route::resource('permissions', 'PermissionsController');

        // Roles
        Route::delete('roles/destroy', 'RolesController@massDestroy')->name('roles.massDestroy');
        Route::resource('roles', 'RolesController');

        // Users
        Route::delete('users/destroy', 'UsersController@massDestroy')->name('users.massDestroy');
        Route::resource('users', 'UsersController');

        // Post Event
        Route::delete('post-events/destroy', 'PostEventController@massDestroy')->name('post-events.massDestroy');
        Route::post('post-events/media', 'PostEventController@storeMedia')->name('post-events.storeMedia');
        Route::post('post-events/ckmedia', 'PostEventController@storeCKEditorImages')->name('post-events.storeCKEditorImages');
        Route::resource('post-events', 'PostEventController');

        // Post New
        Route::delete('post-news/destroy', 'PostNewController@massDestroy')->name('post-news.massDestroy');
        Route::post('post-news/media', 'PostNewController@storeMedia')->name('post-news.storeMedia');
        Route::post('post-news/ckmedia', 'PostNewController@storeCKEditorImages')->name('post-news.storeCKEditorImages');
        Route::resource('post-news', 'PostNewController');

        // Setting General
        Route::post('setting-generals/media', 'SettingGeneralController@storeMedia')->name('setting-generals.storeMedia');
        Route::post('setting-generals/ckmedia', 'SettingGeneralController@storeCKEditorImages')->name('setting-generals.storeCKEditorImages');
        Route::resource('setting-generals', 'SettingGeneralController', ['except' => ['create', 'store', 'destroy']]);

        // Setting Server Info
        Route::post('setting-server-infos/media', 'SettingServerInfoController@storeMedia')->name('setting-server-infos.storeMedia');
        Route::post('setting-server-infos/ckmedia', 'SettingServerInfoController@storeCKEditorImages')->name('setting-server-infos.storeCKEditorImages');
        Route::resource('setting-server-infos', 'SettingServerInfoController', ['except' => ['create', 'store', 'destroy']]);

        // Setting Top Rank
        Route::resource('setting-top-ranks', 'SettingTopRankController', ['except' => ['create', 'store', 'destroy']]);

        // Setting Chien Tich
        Route::resource('setting-chien-tiches', 'SettingChienTichController', ['except' => ['create', 'store', 'destroy']]);

        // Setting Download
        Route::post('setting-downloads/media', 'SettingDownloadController@storeMedia')->name('setting-downloads.storeMedia');
        Route::post('setting-downloads/ckmedia', 'SettingDownloadController@storeCKEditorImages')->name('setting-downloads.storeCKEditorImages');
        Route::resource('setting-downloads', 'SettingDownloadController', ['except' => ['create', 'store', 'destroy']]);

        // Setting Nap The
        Route::post('setting-nap-thes/media', 'SettingNapTheController@storeMedia')->name('setting-nap-thes.storeMedia');
        Route::post('setting-nap-thes/ckmedia', 'SettingNapTheController@storeCKEditorImages')->name('setting-nap-thes.storeCKEditorImages');
        Route::resource('setting-nap-thes', 'SettingNapTheController', ['except' => ['create', 'store', 'destroy']]);

        // Setting Huong Dan
        Route::post('setting-huong-dans/media', 'SettingHuongDanController@storeMedia')->name('setting-huong-dans.storeMedia');
        Route::post('setting-huong-dans/ckmedia', 'SettingHuongDanController@storeCKEditorImages')->name('setting-huong-dans.storeCKEditorImages');
        Route::resource('setting-huong-dans', 'SettingHuongDanController', ['except' => ['create', 'store', 'destroy']]);

        // Setting Quy Dinh
        Route::post('setting-quy-dinhs/media', 'SettingQuyDinhController@storeMedia')->name('setting-quy-dinhs.storeMedia');
        Route::post('setting-quy-dinhs/ckmedia', 'SettingQuyDinhController@storeCKEditorImages')->name('setting-quy-dinhs.storeCKEditorImages');
        Route::resource('setting-quy-dinhs', 'SettingQuyDinhController', ['except' => ['create', 'store', 'destroy']]);

        // Setting Home
        Route::delete('setting-homes/destroy', 'SettingHomeController@massDestroy')->name('setting-homes.massDestroy');
        Route::resource('setting-homes', 'SettingHomeController');
    });
});
