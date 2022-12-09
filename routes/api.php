<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\EmployeeController;
Route::group([

    'middleware' => 'api',
    'namespace' => 'App\Http\Controllers',
    'prefix' => 'auth'

], function ($router) {

    Route::post('login', 'AuthController@login');
    Route::post('signup', 'AuthController@signup');
    Route::post('logout', 'AuthController@logout');
    Route::post('refresh', 'AuthController@refresh');
    Route::post('me', 'AuthController@me');

});
Route::group([
    'namespace' => 'App\Http\Controllers\Api',
], function ($router) {

    Route::apiResource('/employee', 'EmployeeController');
    Route::apiResource('/supplier', 'SupplierController');
    Route::apiResource('/categorie', 'CategorieController');
    Route::apiResource('/product', 'ProductController');
    Route::apiResource('/expense', 'ExpenseController');
    Route::apiResource('/customer', 'CustomerController');

Route::Post('/salary/paid/{id}', 'SalaryController@Paid');
Route::Get('/salary', 'SalaryController@AllSalary');

Route::Get('/salary/view/{id}', 'SalaryController@ViewSalary');
Route::Get('/edit/salary/{id}', 'SalaryController@EditSalary');
Route::Post('/salary/update/{id}', 'SalaryController@SalaryUpdate');

Route::Post('/stock/update/{id}', 'ProductController@StockUpdate');

Route::Get('/getting/product/{id}', 'PosController@GetProduct');

// Add to cart Route
Route::Get('/addToCart/{id}', 'CartController@AddToCart');
Route::Get('/cart/product', 'CartController@CartProduct');

Route::Get('/remove/cart/{id}', 'CartController@removeCart');

Route::Get('/increment/{id}', 'CartController@increment');
Route::Get('/decrement/{id}', 'CartController@decrement');

// Vat Route
Route::Get('/vats', 'CartController@Vats');

Route::Post('/orderdone', 'PosController@OrderDone');

// Order Route
Route::Get('/orders', 'OrderController@TodayOrder');

Route::Get('/order/details/{id}', 'OrderController@OrderDetails');
Route::Get('/order/orderdetails/{id}', 'OrderController@OrderDetailsAll');

Route::Post('/search/order', 'PosController@SearchOrderDate');

// Admin Dashboard Route

Route::Get('/today/sell', 'PosController@TodaySell');
Route::Get('/today/income', 'PosController@TodayIncome');
Route::Get('/today/due', 'PosController@TodayDue');
Route::Get('/today/expense', 'PosController@TodayExpense');
Route::Get('/today/stockout', 'PosController@Stockout');

});

