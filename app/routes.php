<?php
/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/


Route::get('/', function()
{

    $count = count(User::all());

    if($count == 0 ){

        return View::make('signup');
    }


	if (Confide::user()) {
            return Redirect::to('/dashboard');
        } else {
            return View::make('login');
        }
});



Route::get('/dashboard', function()
{

  $employees = Employee::all();
  
  return View::make('dashboard', compact('employees'));
	
});
//








// Confide routes
Route::get('users/create', 'UsersController@create');
Route::get('users/edit/{user}', 'UsersController@edit');
Route::post('users/update/{user}', 'UsersController@update');
Route::post('users', 'UsersController@store');
Route::get('users/login', 'UsersController@login');
Route::post('users/login', 'UsersController@doLogin');
Route::get('users/confirm/{code}', 'UsersController@confirm');
Route::get('users/forgot_password', 'UsersController@forgotPassword');
Route::post('users/forgot_password', 'UsersController@doForgotPassword');
Route::get('users/reset_password/{token}', 'UsersController@resetPassword');
Route::post('users/reset_password', 'UsersController@doResetPassword');
Route::get('users/logout', 'UsersController@logout');
Route::resource('users', 'UsersController');
Route::get('users/activate/{user}', 'UsersController@activate');
Route::get('users/deactivate/{user}', 'UsersController@deactivate');
Route::get('users/destroy/{user}', 'UsersController@destroy');
Route::get('users/password/{user}', 'UsersController@Password');
Route::post('users/password/{user}', 'UsersController@changePassword');
Route::get('users/profile/{user}', 'UsersController@profile');
Route::get('users/add', 'UsersController@add');
Route::post('users/newuser', 'UsersController@newuser');


Route::resource('employees', 'EmployeesController');
Route::get('employees/create', 'EmployeesController@create');
Route::get('employees/edit/{id}', 'EmployeesController@edit');
Route::get('employees/delete/{id}', 'EmployeesController@destroy');
Route::post('employees/update/{id}', 'EmployeesController@update');


Route::resource('salaries', 'SalariesController');
Route::get('salaries/create/{type}', 'SalariesController@create');
Route::get('salaries/edit/{id}', 'SalariesController@edit');
Route::get('salaries/delete/{id}', 'SalariesController@destroy');
Route::get('salaries/disable/{id}', 'SalariesController@disable');
Route::get('salaries/enable/{id}', 'SalariesController@enable');
Route::post('salaries/update/{id}', 'SalariesController@update');

Route::get('payments/{type}', function($type){

    $salaries = Salary::all();

    if($type == 'allowance'){
      $type = 'earning';
    }
    return View::make('salaries.index', compact('type', 'salaries'));
  


});


Route::resource('rates', 'RatesController');
Route::get('rates/create', 'RatesController@create');
Route::get('rates/edit/{id}', 'RatesController@edit');
Route::get('rates/delete/{id}', 'RatesController@destroy');
Route::post('rates/update/{id}', 'RatesController@update');


Route::resource('ratescales', 'RatescalesController');
Route::get('ratescales/create/{id}', 'RatescalesController@create');
Route::get('ratescales/edit/{id}', 'RatescalesController@edit');
Route::get('ratescales/delete/{id}', 'RatescalesController@destroy');
Route::post('ratescales/update/{id}', 'RatescalesController@update');

Route::resource('payrolls', 'PayrollsController');
Route::get('payrolls/create', 'PayrollsController@create');
Route::get('payrolls/edit/{id}', 'PayrollsController@edit');
Route::get('payrolls/delete/{id}', 'PayrollsController@destroy');
Route::post('payrolls/update/{id}', 'PayrollsController@update');
Route::get('payrolls/show/{id}', 'PayrollsController@show');
Route::get('payrolls/payslip/{id}/{period}', 'PayrollsController@payslip');


Route::get('admin', function(){

    return View::make('admin');
});


Route::resource('countries', 'CountriesController');
Route::get('countries/create', 'CountriesController@create');
Route::get('countries/edit/{id}', 'CountriesController@edit');
Route::get('countries/delete/{id}', 'CountriesController@destroy');
Route::post('countries/update/{id}', 'CountriesController@update');
Route::get('countries/show/{id}', 'CountriesController@show');
Route::get('countries/default/{id}', 'CountriesController@isdefault');











