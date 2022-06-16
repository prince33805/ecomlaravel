<?php

use Illuminate\Support\Facades\Route;

use Illuminate\Support\Facades\DB;

use App\Http\Controllers\HomeController;

use App\Http\Controllers\AdminController;

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

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});


Route::middleware(['auth:sanctum','verified','admin'])->group(function(){
    route::get('/indexAdmin',[AdminController::class,'indexAdmin']);

    route::get('/addproduct',[AdminController::class,'addproduct']);
    route::post('/uploadproduct',[AdminController::class,'uploadproduct']);
    route::get('/showproduct',[AdminController::class,'showproduct']);
    route::get('/showproduct/{id}',[AdminController::class,'viewproduct']);
    route::get('/deleteproduct/{id}',[AdminController::class,'deleteproduct']);
    route::get('/updateview/{id}',[AdminController::class,'updateview']);
    route::post('/updateproduct/{id}',[AdminController::class,'updateproduct']);
    route::get('/searchproduct',[AdminController::class,'search']);

    route::get('/category',[AdminController::class,'category']); 
    route::post('/addcategory',[AdminController::class,'addcategory']); 
    route::get('/deletecategory/{id}',[AdminController::class,'deletecategory']); 
    route::get('/category/updateview/{id}',[AdminController::class,'updateviewcategory']);
    route::post('/category/update/{id}',[AdminController::class,'updatecategory']);
    route::get('/category/{id}',[AdminController::class,'viewcategory']);
    
    route::get('/supplier',[AdminController::class,'supplier']); 
    route::post('/addsupplier',[AdminController::class,'addsupplier']); 
    route::get('/deletesupplier/{id}',[AdminController::class,'deletesupplier']); 
    route::get('/supplier/updateview/{id}',[AdminController::class,'updateviewsupplier']);
    route::post('/supplier/update/{id}',[AdminController::class,'updatesupplier']);
    route::get('/supplier/{id}',[AdminController::class,'viewsupplier']);
    
    route::get('/showorder',[AdminController::class,'showorder']);
    route::get('/showorder/{id}',[AdminController::class,'vieworder']);

    route::get('/showuser',[AdminController::class,'showuser']);
    route::get('/viewuser/{id}',[AdminController::class,'viewuser']);

    route::get('/updatestatus/{id}',[AdminController::class,'updatestatus']);
    route::get('/print_pdf/{id}',[AdminController::class,'print_pdf']);
    route::get('/send_email/{id}',[AdminController::class,'send_email']);
    route::post('/send_user_email/{id}',[AdminController::class,'send_user_email']);
});

// route::get('/redirect',[HomeController::class,'redirect']);
route::get('/',[HomeController::class,'index']);
route::get('/search',[HomeController::class,'search']);
route::post('/addcart/{id}',[HomeController::class,'addcart']);
route::get('/showcart',[HomeController::class,'showcart']);
route::get('/delete/{product_title}',[HomeController::class,'deletecart']);
route::post('/confirmorder',[HomeController::class,'confirmorder']);
route::get('/product_details/{id}',[HomeController::class,'product_details']); 
route::get('/aboutus',[HomeController::class,'aboutus']); 
route::get('/product_category/{id}',[HomeController::class,'product_category']); 
route::get('/order',[HomeController::class,'showorder']);  
route::get('/order/{id}',[HomeController::class,'vieworder']); 
Route::post('/contact-us', [HomeController::class, 'save']);
