<?php

use App\Http\Controllers\Partner\Auth\LoginController;
use App\Utility\CodingUtility;
use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;

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

Route::get('margarita', function () {
    Artisan::call('migrate');
    dd('migrated done');
});

Route::get('/clear-cache', function() {
    Artisan::call('clear-compiled');
    Artisan::call('auth:clear-resets');
    Artisan::call('config:clear');
    Artisan::call('route:clear');
    Artisan::call('view:clear');
    Artisan::call('cache:clear');
    Artisan::call('config:cache');
    return 'cache is cleared!';
});


Route::get('/', 'HomeController@home')->name('home');

Route::get('country-visa/{slug}', 'CountryController@show');

Route::get('contact', function () {return view('public.contact');})->name('contact');

Route::get('about', function () {return view('public.about');})->name('about');

Route::get('/steps/step', 'StepsController@index')->name('steps');

Route::get('dev', function () {return view('public.under-counstruction');})->name('dev');

Route::get('services', function () {return view('public.services');})->name('services');


//-----Partner Routes

Route::namespace('Partner')->prefix('partner')->group(function () {
    Route::namespace('Auth')->group(function () {
        Route::get('/login', 'LoginController@showLoginForm')->name('partner.login');
        Route::post('/login', 'LoginController@login');
        Route::get('/logout', 'LoginController@logout')->name('partner.logout');
    });
    Route::middleware('authpartner')->group(function () {
        Route::get('/dashboard', 'PartnerController@index')->name('partner.dashboard');
    });
});



Route::get('/facebook-login', 'GoogleAuthController@redirectToProviderFacebook');
Route::get('/facebook-data', 'GoogleAuthController@handleProviderCallbackFacebook');
Route::post('/login-email', 'GoogleAuthController@loginEmail');
Route::post('/socail-save/{id}', 'GoogleAuthController@handelSocialData');
Route::namespace('Users')->group(function () {
    Route::get('/click/{id}', 'UserController@verifyUser');
    Route::prefix('member')->group(function () {
        Route::get('/login', 'UserController@index')->name('member.login');
        Route::get('/register', 'UserController@showRegister')->name('member.register');
        Route::post('reset_password_without_token', 'AccountsController@validatePasswordRequest');
        Route::post('reset_password_with_token', 'AccountsController@resetPassword');

        Route::get('/resetpassword', function () {
            return view('member.auth.passwords.email');
        })->name('member.reset.password');
        Route::get('/password/reset', 'AccountsController@formResetPassword');
        Route::namespace('Auth')->group(function () {
            Route::get('/login/google-redirect', 'GoogleController@googleRedirect')->name('google.register');
            Route::get('/login/google-callback', 'GoogleController@googleCallBack');
            Route::post('step-login', 'LoginController@stepLogin');
            Route::post('login', 'LoginController@login');
            Route::post('logout', 'LoginController@logout');
            Route::get('logout', 'LoginController@logout')->name('member.logout');
            Route::post('create', 'RegisterController@create');
            Route::post('step-register', 'RegisterController@stepRegister');
        });
        Route::middleware('authuser')->group(function () {
            Route::get('/dashboard','UserController@index')->name('member.dashboard');
            Route::get('/application/{form}','UserController@applicationProfile')->name('member.application');
            Route::get('/profile','UserController@memberProfile')->name('member.profile');
            Route::get('/inbox','UserController@memberInbox')->name('member.inbox');
            Route::get('/payment','UserController@payment')->name('member.payment');
            Route::post('/payment/get/{id}', 'UserController@getInvoice');
            Route::post('/cart/create', 'CartController@store');
            Route::post('/cart/update', 'CartController@update');
            Route::post('/resetpass', 'UserController@resetpass');
            Route::post('/passchange', 'UserController@changePassEmail');
            Route::post('/set-form', 'FormController@saveForm');
            Route::post('/set-family', 'UserController@addFamily');
            Route::post('/edite-family', 'UserController@editeFamily');
            Route::post('/delete-family', 'UserController@deleteFamily');
            Route::post('/updateRows', 'FormController@updateRows');
            Route::post('/upload-documents', 'DocumentController@uploadDoument');
            Route::post('/edit-avatar', 'UserController@editAvatar');
            Route::post('/remove-avatar', 'UserController@removeAvatar');
            Route::post('/check-privacy', 'UserController@checkPrivacy');
            Route::post('/save-main-profile', 'UserController@saveMainProfile');
            Route::post('/update-name', 'UserController@updateName');
            Route::post('/update-phone', 'UserController@updatePhone');
        });
    });
});

Route::namespace('Admin')->prefix('admin')->group(function () {
    Route::middleware('authadmin')->group(function () {
        Route::get('/', 'HomeController@index')->name('admin.home');
        Route::get('/administrators', 'AdminController@index');
        //Admin
        Route::get('/admin/get', "AdminController@getAll");
        Route::post('/admin/active/{id}', 'AdminController@active');
        Route::delete('/admin/{id}', 'AdminController@delete');
        Route::post('/admin/create', 'AdminController@store');
        Route::post('/admin/update/{id}', 'AdminController@update');
        Route::post('/admin/show/{id}', 'AdminController@show');
        Route::get('/setting', 'AdminController@index');
        //End Admin
        //Country
        Route::get('/country/list', 'CountryController@index');
        Route::post('/country/list', 'CountryController@index');
        Route::get('/country/get', 'CountryController@getall');
        Route::get('/country/step', 'StepController@index')->name('admin-steps');
        Route::post('/user/question/update', 'QuestionController@update')->name('update-question');
        Route::get('/country/question', 'QuestionController@index')->name('admin-question');
        Route::post('/country/question', 'QuestionController@index');
        Route::post('/step/update-status', 'StepController@updateStatus');


        Route::get('/country/create', 'CountryController@create')->name('create-country');
        Route::post('/country', 'CountryController@store');
        Route::post('/country/update-show-map', 'CountryController@updateShowOnMap');
        Route::post('/country/{id}', 'CountryController@show');
        Route::post('/country/update/{id}', 'CountryController@update');
        Route::get('/country/{id}/edit', 'CountryController@edit');
        Route::delete('/country/{id}', 'CountryController@delete');
        //End Country
        //Step Group
        Route::post('/user/step-group/store', 'SGroupController@store');
        Route::get('/user/step-group/list', 'SGroupController@index');
        Route::post('/user/gstep/update', 'SGroupController@update');
        Route::delete('/user/gstep/{id}', 'SGroupController@delete');
        Route::post('/user/step/update', 'StepController@update')->name('update-step');
        Route::get('/user/step/list', 'StepController@list')->name('list-step');
        Route::delete('/user/step/{id}', 'StepController@delete')->name('delete-step');
        //End Step Group
        //Step
        Route::post('/user/step/store', 'StepController@store');
        Route::get('/user/step/getByGroupId/{id}', 'StepController@getByGroupId');
        Route::post('/user/step/update', 'StepController@update')->name('update-step');
        Route::post('/user/step/indexingUpdate', 'StepController@indexingUpdate');
        Route::get('/user/step/list', 'StepController@list')->name('list-step');
        Route::delete('/user/step/{id}', 'StepController@delete')->name('delete-step');
        Route::get('/user/visa-applicant', 'FormController@list')->name('user-visa-applicant');
        Route::get('/user/applicant/{form}', 'FormController@showForm')->name('user-applicant-profile');
        Route::post('/user/updateRowStatus', 'FormItemRowController@updateRowStatus');
        Route::get('/user/list', 'UserController@listUsers')->name('users-list');
        Route::post('/user/promote', 'UserController@promoteToPartner');

        //End Step
        //Question
        Route::post('/user/question/store', 'QuestionController@store');
        Route::get('/user/question/list', 'QuestionController@list')->name('list-question');
        Route::delete('/user/question/{id}', 'QuestionController@delete')->name('delete-question');
        //End Question

        Route::get('/explorer', 'ExplorerController@index');
        Route::post('/explorer/list', 'ExplorerController@getlist');
        Route::post('/explorer/folder', 'ExplorerController@storefolder');
        Route::post('/explorer/file', 'ExplorerController@storefile');
        Route::delete('/explorer/file', 'ExplorerController@removeFile');
        Route::delete('/explorer/folder', 'ExplorerController@removeFolder');
        //End Expolorer
        //Blogs
        Route::get('/blogs', function () {
            return view('panel.blogs');
        });
        Route::get('/blog/getall', 'BlogController@getall');
        Route::post('/blog/create', 'BlogController@store');
        Route::post('/blog/active/{id}', 'BlogController@setActive');
        Route::post('/blog/show/{id}', 'BlogController@show');
        Route::post('/blog/update/{id}', 'BlogController@update');
        Route::delete('/blog/{id}', 'BlogController@delete');
        //End blogs
        //Payment
        Route::post('/payment/create/{id}', 'PaymentController@store');
        //End Payment
    });
    Route::namespace('Auth')->group(function () {
        Route::get('/login', 'LoginController@showLogin')->name('admin.login');
        Route::post('/login', 'LoginController@login');
        Route::post('/logout', 'LoginController@logout')->name('admin.logout');
    });
});
// Auth::routes();