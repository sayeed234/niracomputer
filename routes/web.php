<?php

use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('layouts.login');
});

//Admin Dashboard ----------------------------------------------------------------------------------------------
Route::middleware(['auth:sanctum', 'verified','authadmin'])->group(function () {
    Route::group(["namespace"=>"App\Http\Controllers\Admin"],function() {
        Route::prefix('admin')->group(function () {
             Route::get('/dashboard', 'DashboardController@index')->name('admin.dashboard');
             Route::get('/customer', 'DashboardController@customer')->name('admin.customer');
             Route::get('/profile', 'ProfileController@index')->name('admin.profile');
             Route::post('/password', 'ProfileController@password')->name('admin.password');
             //Company-----------------------------------------------------------------------
             Route::get('/company','ProfileController@company')->name('admin.company');
             Route::get('/company/edit/{id}','ProfileController@company_edit');
             Route::post('/comapny/update','ProfileController@company_update');
            //Users ..................................................................................
             Route::get('/user','OutletController@outlet')->name('admin.outlet');
             Route::any('/user/store','OutletController@user_store')->name('admin.user.store');
             Route::any('/user/update','OutletController@user_update')->name('admin.user.update');
             Route::any('/user/edit/{id}','OutletController@user_edit')->name('admin.user.edit');
             Route::any('/user/delete/{id}','OutletController@user_delete')->name('admin.user.delete');
           //Service....................................................................................
             Route::any('/service_list','ServiceController@service_list');
             Route::any('/service_store','ServiceController@service_store');
             Route::any('/service_delete/{id}','ServiceController@service_delete');
             Route::any('/service_edit/{id}','ServiceController@service_edit');
             Route::any('/service_update','ServiceController@service_update');
          //Product.....................................................................................
             Route::any('/product','ProductController@product');
             Route::any('/product_store','ProductController@product_store');
             Route::any('/product_edit/{id}','ProductController@product_edit');
             Route::any('/product_update','ProductController@product_update');
             Route::any('/product_delete/{id}','ProductController@product_delete');
           // Stock Product Updated--------------------------------------------------------------------------
             Route::any('/stock','ProductController@stock');
             Route::any('/stock_store','ProductController@stock_store');
             Route::any('/stock_edit/{id}','ProductController@stock_edit');
             Route::any('/stock_update','ProductController@stock_update');
             Route::any('/stock_delete/{id}','ProductController@stock_delete');
             Route::any('/preport','ProductController@preport');
            // Expense----------------------------------------------------------------------
            Route::any('/pending_expense','MainController@pending_expense');
            Route::any('/approved_expense/{id}','MainController@approved_expense');
            Route::any('/pendings_expense/{id}','MainController@pendings_expense');
            Route::any('/all_expense','MainController@all_expense');
            Route::any('/expense_report','MainController@expense_report');
            //Sale Management--------------------------------------------------------------------
            Route::any('/todaysale','MainController@todaysale');
            Route::any('/pending','MainController@pending');
            Route::any('/saleview/{id}','MainController@saleview');
            Route::any('/alltimesale','MainController@alltimesale');
            Route::any('/userwise','MainController@userwise');
            Route::any('/datewise','MainController@datewise');
            Route::any('/productwise','MainController@productwise');
            //Summary------------------------------------------------------------------------
            Route::any('/summary','MainController@summary');
            //
            Route::any('/loan', 'MainController@loan');
            Route::any('/loan_store', 'MainController@loan_store')->name('admin.loan.store');
            Route::any('/loan_edit/{id}', 'MainController@loan_edit');
            Route::any('/loan_update', 'MainController@loan_update')->name('admin.loan.update');
            Route::any('/loan_delete/{id}', 'MainController@loan_delete');

    });
  });
});  

//Shop ----------------------------------------------------------------------------------------------
Route::middleware(['auth:sanctum', 'verified','authshop'])->group(function () {
    Route::group(["namespace"=>"App\Http\Controllers\Shop"],function() {
  
             Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
             Route::get('/profile', 'ProfileController@index')->name('user.profile');
             Route::post('/password', 'ProfileController@password')->name('password');

            //My Work---------------------------------------------------------------------
            Route::any('/mywork', 'MainController@mywork');
            Route::any('/mywork_store', 'MainController@mywork_store');
            Route::any('/mywork_edit/{id}', 'MainController@mywork_edit');
            Route::any('/mywork_update', 'MainController@mywork_update');
            Route::any('/mywork_delete/{id}', 'MainController@mywork_delete');
          //Expense---------------------------------------------------------------------
            Route::any('/expense', 'MainController@expense');
            Route::any('/expense_store', 'MainController@expense_store');
            Route::any('/expense_edit/{id}', 'MainController@expense_edit');
            Route::any('/expense_delete/{id}', 'MainController@expense_delete');
            Route::any('/expense_update', 'MainController@expense_update');
          // Sale-----------------------------------------------------------------------
            Route::any('/sale', 'MainController@sale')->name('sale');
            Route::any('/cart', 'MainController@cart');
            Route::any('/cart_show', 'MainController@cart_show');
            Route::any('/deletecart/{id}', 'MainController@cartshow_delete');
            Route::any('/cartupdate', 'MainController@cartshow_update');
            Route::any('/destroy', 'MainController@destroy');
            Route::any('/order', 'MainController@order')->name('order');
            Route::any('/sale/invoice', 'MainController@invoice');

            Route::any('/sale_list', 'MainController@sale_list');
            Route::any('/salelist_view/{id}', 'MainController@salelist_view');


            Route::any('/pendings', 'MainController@pendings');
            Route::any('/pendings_update', 'MainController@pendings_update');
            
            Route::any('/pendingp', 'MainController@pendingp');
            Route::any('/productsale_edit/{id}', 'MainController@productsale_edit');
            Route::any('/pendingp_update', 'MainController@pendingp_update');

           // Report--------------------------------------------------------------------
            Route::any('/report', 'ProfileController@report');

            //Loan Systrem--------------------------------------------------------------
            Route::any('/loan', 'LoanController@loan');
            Route::any('/loan_store', 'LoanController@loan_store')->name('loan.store');
            Route::any('/loan_edit/{id}', 'LoanController@loan_edit');
            Route::any('/loan_update', 'LoanController@loan_update')->name('loan.update');
            Route::any('/loan_delete/{id}', 'LoanController@loan_delete');


    });
});
