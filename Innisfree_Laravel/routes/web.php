<?php
use App\Http\Controllers\Admin\AccountController;
use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\admin\ProductController;
use App\Http\Controllers\Admin\SupplierController;
use App\Http\Controllers\Admin\ReportController;
use App\Http\Controllers\user\NewsController;
use App\Http\Controllers\admin\AuthorController;
use App\Http\Controllers\user\CartController;
use App\Http\Controllers\user\FavoriteController;
use App\Http\Controllers\user\OrderController;
use App\Http\Controllers\Admin\SendEmailController;


use Illuminate\Support\Facades\Route;

use App\Models\Category;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use App\Http\Controllers\CustomAuthController;
use Illuminate\Http\Request;

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

Route::get('/admin', function () {
    return view('admin.layout_admin');
});
Route::get('/user', function () {
    return view('user.layout_user');
});
// Route::get('/user/cart', function () {
//     return view('user.cart');
// });
//User 
//
//Route::get('user/cart',[CartController::class, 'index'])->name('user.cart');
Route::get('/user/news' ,[NewsController::class, 'index'])->name('user.news');
Route::get('/user/news/{id}' ,[NewsController::class, 'getNewsDetail'])->name('user.news_detail');

//Admin
// Route::get('/admin/login',[LoginController::class, 'index'])->name('login');
Route::middleware(['isLogIn'])->group(function(){
Route::prefix('/admin')->name('admin.')->group(function(){
    Route::get('/logout',[CustomAuthController::class,'logOut'])->name('logOut');
    //Category
    Route::prefix('/category')->name('category.')->group(function(){
        // Add
        Route::get('/add',[CategoryController::class,'create'])->name('create');
        Route::post('/add',[CategoryController::class,'postAdd'])->name('postAdd');
        Route::get('/index2',[CategoryController::class,'index'])->name('index2');
        //Index
         Route::get('/{name?}',[CategoryController::class,'index'])->name('index');
        //Edit
        Route::get('/edit/{id}',[CategoryController::class,'getEdit'])->name('edit');
        Route::post('/edit/{id}',[CategoryController::class,'postEdit'])->name('post-edit');
       // Route::post('/update',[CategoryController::class,'postEdit'])->name('post-edit');

       //Hide,show
        Route::post('/activecategory/{name?}/{id?}',[CategoryController::class,'postActive'])->name('active-category');

        //Delete
        Route::post('/delete',[CategoryController::class,'destroy'])->name('delete');
        // Route::post('/deleteall/{id?}',[CategoryController::class,'destroyAll'])->name('deleteall');
    });
    //Product
    Route::prefix('/product')->name('product.')->group(function(){
        // Add
        Route::get('/add',[ProductController::class,'create'])->name('create');
        Route::post('/add',[ProductController::class,'postAdd'])->name('postAdd');
        Route::post('/import_excel',[ProductController::class,'import_excel'])->name('import_excel');
        Route::get('/index2',[ProductController::class,'index'])->name('index2');
        //Index
         Route::get('/{name?}',[ProductController::class,'index'])->name('index');
        //Edit
        Route::get('/edit/{id}',[ProductController::class,'getEdit'])->name('edit');
        Route::post('/edit/{id}',[ProductController::class,'postEdit'])->name('post-edit');
       // Route::post('/update',[CategoryController::class,'postEdit'])->name('post-edit');

       //Hide,show
        Route::post('/activecategory/{name?}/{id?}',[ProductController::class,'postActive'])->name('active-product');

        //Delete
        Route::post('/delete',[ProductController::class,'destroy'])->name('delete');
        Route::post('/deleteall/{id?}',[ProductController::class,'destroyAll'])->name('deleteall');
    });

    //Supplier
    Route::prefix('/supplier')->name('supplier.')->group(function(){
        // Add
        Route::get('/add',[SupplierController::class,'create'])->name('create');
        Route::post('/add',[SupplierController::class,'postAdd'])->name('postAdd');
        Route::get('/index2',[SupplierController::class,'index'])->name('index2');
        //Index
         Route::get('/{name?}',[SupplierController::class,'index'])->name('index');
        //Edit
        Route::get('/edit/{id}',[SupplierController::class,'getEdit'])->name('edit');
        Route::post('/edit/{id}',[SupplierController::class,'postEdit'])->name('post-edit');
       // Route::post('/update',[SupplierController::class,'postEdit'])->name('post-edit');

       //Hide,show
        Route::post('/activecategory/{name?}/{id?}',[SupplierController::class,'postActive'])->name('active-supplier');

        //Delete
        Route::post('/delete',[SupplierController::class,'destroy'])->name('delete');
        // Route::post('/deleteall/{id?}',[SupplierController::class,'destroyAll'])->name('deleteall');
    });

     //Author
     Route::prefix('/author')->name('author.')->group(function(){
        // Add
        Route::get('/add',[AuthorController::class,'create'])->name('create');
        Route::post('/add',[AuthorController::class,'postAdd'])->name('postAdd');
        Route::get('/index2',[AuthorController::class,'index'])->name('index2');
        //Index
         Route::get('/{name?}',[AuthorController::class,'index'])->name('index');
        //Edit
        Route::get('/edit/{id}',[AuthorController::class,'getEdit'])->name('edit');
        Route::post('/edit/{id}',[AuthorController::class,'postEdit'])->name('post-edit');
       // Route::post('/update',[AuthorController::class,'postEdit'])->name('post-edit');

       //Hide,show
        Route::post('/activecategory/{name?}/{id?}',[AuthorController::class,'postActive'])->name('active-author');

        //Delete
        Route::post('/delete',[AuthorController::class,'destroy'])->name('delete');
        // Route::post('/deleteall/{id?}',[SupplierController::class,'destroyAll'])->name('deleteall');
    }); 
    Route::prefix('/order')->name('order.')->group(function(){
        
        Route::any('/index/{status?}',[App\Http\Controllers\admin\OrderController::class,'getOrderList'])->name('index');
        Route::get('/show-detail/{id}',[App\Http\Controllers\Admin\OrderController::class,'getDetail'])->name('detail');
        Route::post('/edit/{id}',[App\Http\Controllers\Admin\OrderController::class,'updateOrder'])->name('post-edit');
        Route::get('/export_order/{id}',[App\Http\Controllers\Admin\OrderController::class,'exportOrder'])->name('order-export');
        Route::post('/destroy/{id}',[App\Http\Controllers\Admin\OrderController::class,'destroyOrder'])->name('destroy');
       // Route::post('/search',[App\Http\Controllers\Admin\OrderController::class,'getResultSearch'])->name('search');

    }); 
    //SALE REPORT
    Route::get('/report/index',[ReportController::class,'index'])->name('report');
    Route::get('/report/export',[ReportController::class,'export'])->name('export');

    Route::get('/homepage/index',[ReportController::class,'homepage'])->name('homepage');   
    //Account\
    Route::prefix('/account')->name('account.')->group(function(){
        // Add
        Route::get('/add',[AccountController::class,'create'])->name('create');
        Route::post('/add',[AccountController::class,'postAdd'])->name('postAdd');
        Route::get('/index2',[AccountController::class,'index'])->name('index2');
        //Index
         Route::get('/{name?}',[AccountController::class,'index'])->name('index');
       
        Route::post('/activecategory/{name?}/{id?}',[AccountController::class,'postActive'])->name('active-account');

    });
    // Route::get('/send-email', [SendEmailController::class,'getdata'])->name('sendMail');
    Route::get('/email',[SendEmailController::class,'index'])->name('index');

    Route::get('/email/create',[SendEmailController::class,'create'])->name('createMail');
    Route::get('/email/{id}',[SendEmailController::class,'getNotifyDetail'])->name('detailNotify');
    
    Route::post('/sendMail',[SendEmailController::class,'sendMail'])->name('sendMail');
    Route::get('/news',[App\Http\Controllers\admin\NewsController::class,'index'])->name('news.index');
    Route::get('/news/add',[App\Http\Controllers\admin\NewsController::class,'add'])->name('news.add');
    Route::post('/news/add',[App\Http\Controllers\admin\NewsController::class,'postAdd'])->name('news.postAdd');
    Route::get('/news/edit/{id}',[App\Http\Controllers\admin\NewsController::class,'getEdit'])->name('news.edit');
    Route::post('/news/edit/{id}',[App\Http\Controllers\admin\NewsController::class,'postEdit'])->name('news.postEdit');




    
    // Route::get('send-mail', function () {
   
    //     $details = [
    //         'title' => 'Mail from codecheef.org',
    //         'body' => 'This is for testing email using smtp'
    //     ];
       
    //     \Mail::to('your_receiver_email@gmail.com')->send(new \App\Mail\MyTestMail($details));
       
    //     dd("Email is Sent.");
    // });
});
});
// Route::prefix('/user')->name('user.')->group(function(){
//     Route::get('/home', [App\Http\Controllers\user\ProductController::class,'index'])->name('homepage');
//     Route::get('/login',[CustomAuthController::class,'logIn'])->name('login');
//     Route::post('/checkAcount',[CustomAuthController::class,'checkLogin'])->name('check-login');


// });
Route::middleware(['isLogIn'])->group(function(){
    Route::prefix('/user/auth')->name('user.')->group(function(){
        Route::get('/profile', [CustomAuthController::class,'profile'])->name('infor');
        Route::post('/change-Profile',[CustomAuthController::class,'updateProfile'])->name('changeProfile');
        route::get('/changepass',[CustomAuthController::class,'newPass'])->name('changepass');
        route::post('/storenewpass',[CustomAuthController::class,'changePass'])->name('storeNewPass');

    Route::prefix('/cart')->name('cart.')->group(function(){
        Route::get('/index',[CartController::class,'index'])->name('index');
        Route::get('/delete/{id}',[CartController::class,'delete'])->name('delete');
        Route::post('/update',[CartController::class,'update'])->name('update');
        Route::any('/add/{id?}',[CartController::class,'add'])->name('add');

    });
    Route::prefix('/favorite')->name('favorite.')->group(function(){
        Route::get('/index',[FavoriteController::class,'index'])->name('index');
        Route::get('/delete/{id}',[FavoriteController::class,'delete'])->name('delete');
        Route::any('/add/{id?}',[FavoriteController::class,'add'])->name('add');

    });
    Route::prefix('/order')->name('order.')->group(function(){
        Route::get('/index',[OrderController::class,'index'])->name('index');
        Route::post('/add',[OrderController::class,'add'])->name('add');
        Route::get('/order-detail/{id}',[OrderController::class,'getOrderDetail'])->name('orderDetail');
        route::get('/orderList/{status?}',[OrderController::class,'OrderListActive'])->name('orderList');
        Route::post('/destroy/{id}',[OrderController::class,'updateOrder'])->name('post-edit');
    });

    });
});

Route::prefix('/user')->name('user.')->group(function(){
    Route::get('/login',[CustomAuthController::class,'login'])->name('logIn');
    Route::get('/register',[CustomAuthController::class,'register'])->name('register');
    Route::post('/new-user',[CustomAuthController::class,'storeNewUser'])->name('storeUser');
    Route::get('/logout',[CustomAuthController::class,'logOut'])->name('logOut');

    Route::post('/checkAcount',[CustomAuthController::class,'checkLogin'])->name('check-login');
    Route::get('/home', [App\Http\Controllers\user\ProductController::class,'index'])->name('homepage');
    route::get('/product/{id}',[App\Http\Controllers\user\ProductController::class,'showProductDetail'])->name('product-detail');
   
   

});

Route::prefix('/category')->name('category.')->group(function(){
    Route::get('/{id?}',[CategoryController::class,'getProductByCategory'])->name('index');
});

Route::get('/category/{id?}', [App\Http\Controllers\user\ProductController::class,'getProductByCategory'])->name('category');
Route::get('/search', [App\Http\Controllers\user\ProductController::class,'searchProduct'])->name('search');
route::get('/header',function(){
    return view('header');
});
route::get('/footer',function(){
    return view('footer');
});
// Route::get('/email/verify', function () {
//     return view('auth.verify-email');
// })->middleware('auth')->name('verification.notice');
// Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
//     $request->fulfill();
 
//     return redirect('/home');
// })->middleware(['auth', 'signed'])->name('verification.verify');

// Route::post('/email/verification-notification', function (Request $request) {
//     $request->user()->sendEmailVerificationNotification();
 
//     return back()->with('message', 'Verification link sent!');
// })->middleware(['auth', 'throttle:6,1'])->name('verification.send');
// Route::get('/profile', function () {
//     // Only verified users may access this route...
// // })->middleware('verified');

