<?php

use App\Http\Controllers\admin\HomeController;
use App\Http\Controllers\admin\WareHouseController;
use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\admin\ProductController;
use App\Http\Controllers\admin\ProductTypeController;
use App\Http\Controllers\admin\imageProductController;
use App\Http\Controllers\admin\SliderController;
use App\Http\Controllers\admin\TransactionController;
use App\Http\Controllers\admin\BlogController;
use App\Http\Controllers\Admin\CalendarController;
use App\Http\Controllers\Admin\PaymentController;
use App\Http\Controllers\Admin\RatingController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Auth\LoginController;
use App\Models\Transaction;
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


//Auth::routes();
//Authentication
Route::post('/login', [App\Http\Controllers\Auth\LoginController::class, 'login'])->name('login');
Route::post('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');
Route::post('/register', [App\Http\Controllers\Auth\RegisterController::class, 'register'])->name('register');

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/product-type/{productType}', [App\Http\Controllers\ProductTypeController::class, 'show'])->name('productype.show');
Route::get('/product', [App\Http\Controllers\HomeController::class, 'product'])->name('product');
Route::get('/checkout', [App\Http\Controllers\HomeController::class, 'checkout'])->name('checkout');
Route::get('/track-your-order', [App\Http\Controllers\HomeController::class, 'track_your_order'])->name('track_your_order');

Route::get('/NotFound', [App\Http\Controllers\HomeController::class, 'NotFound'])->name('NotFound');
Route::get('/contact', [App\Http\Controllers\HomeController::class, 'Contact'])->name('contact');
Route::get('/blog', [App\Http\Controllers\BlogController::class, 'index'])->name('blog.user');
Route::get('/blog-detail/{idBlog}', [App\Http\Controllers\BlogController::class, 'detail'])->name('blog.user.detail');
Route::get('/categories/{category}', [App\Http\Controllers\CategoryController::class, 'show'])->name('categories.show');
Route::get('/categories/{category}/{filterAll}', [App\Http\Controllers\CategoryController::class, 'filterAll'])->name('categories.filter');
Route::get('/products/{product}', [App\Http\Controllers\ProductController::class, 'show'])->name('products.show');
Route::post('/search/autoComplete', [App\Http\Controllers\HomeController::class, 'autoComplete'])->name('autoComplete');
Route::get('/resultSearch', [App\Http\Controllers\SearchController::class, 'index'])->name('resultSearch');
Route::get('/filter/Search', [App\Http\Controllers\SearchController::class, 'getOption'])->name('getOption');
Route::post('/add-to-cart/{product}', [App\Http\Controllers\CartController::class, 'add'])->name('cart.add');
Route::post('/delete-cart', [App\Http\Controllers\CartController::class, 'delete'])->name('cart.delete');
Route::post('/remove-all', [App\Http\Controllers\CartController::class, 'removeAll'])->name('cart.remove.all');
Route::get('/cart', [App\Http\Controllers\CartController::class, 'cart'])->name('cart');
Route::post('/order', [App\Http\Controllers\OrderController::class, 'store'])->name('order.store');
Route::post('/update-cart', [App\Http\Controllers\CartController::class, 'increase_quantity'])->name('cart.update');
Route::get('/track-your-order', [App\Http\Controllers\TransactionController::class, 'index'])->name('track_your_order');
Route::get('/search/track-your-order', [App\Http\Controllers\TransactionController::class, 'track_order'])->name('track_order');
Route::get('/errorNotFound', [App\Http\Controllers\HomeController::class, 'errorPage'])->name('userError');
Route::get('/filter/product', [App\Http\Controllers\ProductTypeController::class, 'filterProduct'])->name('filterProduct');

Route::prefix('/my-account')->middleware(['auth','user'])->group(function (){
    Route::get('/{id}', [App\Http\Controllers\AccountController::class, 'index'])->name('myAccount');
    Route::post('/pagination/{id}', [App\Http\Controllers\AccountController::class, 'getTransaction'])->name('getTransaction');
    Route::post('/updateAccount/{id}', [App\Http\Controllers\AccountController::class, 'update'])->name('updateMyAccount');
    Route::post('/updatePassword/{id}', [App\Http\Controllers\AccountController::class, 'updatePassword'])->name('updatePassword');
    Route::get('{id}/detailOrder/{transaction_id}', [App\Http\Controllers\AccountController::class,'orderview'])->name('orderDetail');
    Route::get('{id}/cancel/transaction/{id_transaction}', [App\Http\Controllers\AccountController::class,'cancelOrder'])->name('cancelOrder');
    Route::get('{id}/getStar', [App\Http\Controllers\AccountController::class,'getStar'])->name('getStar');
    Route::post('{id}/rating/transaction', [App\Http\Controllers\AccountController::class,'ratingTransaction'])->name('ratingTransaction');
});

Route::prefix('admin')->middleware(['auth','admin'])->group(function () {
    //Ware House
    Route::get('/home', [HomeController::class,'index'])->name('home.index');
    Route::get('/warehouse', [WareHouseController::class,'index'])->name('warehouse.index');
    Route::get('/warehouse/create', [WareHouseController::class,'create'])->name('warehouse.create');
    Route::post('/warehouse/store', [WareHouseController::class,'postcreate'])->name('warehouse.postcreate');
    Route::get('/warehouse/edit/{id}', [WareHouseController::class,'edit'])->name('warehouse.edit');
    Route::post('/warehouse/edit/{id}', [WareHouseController::class,'update'])->name('warehouse.update');
    Route::get('/warehouse/status/update', [WareHouseController::class,'updateStatus'])->name('updateStatusWareHouse');
    Route::get('/warehouse/delete/{id}', [WareHouseController::class,'delete'])->name('softDeleteWareHouse');
    Route::get('/warehouse/historydelete', [WareHouseController::class,'history'])->name('historyWareHouse');
    Route::get('/warehouse/restorehistorydelete/{id}', [WareHouseController::class,'restore'])->name('restoreWareHouse');
    //Product
    Route::get('/product', [ProductController::class,'index'])->name('product.index');
    Route::get('/product/create/{id}', [ProductController::class,'create'])->name('createProduct');
    Route::post('/product/create/{id}', [ProductController::class,'store'])->name('storeProduct');
    Route::get('/product/edit/{id}', [ProductController::class,'edit'])->name('editProduct');
    Route::post('/product/edit/{id}', [ProductController::class,'update'])->name('updateProduct');
    Route::get('/product/status/update', [ProductController::class,'updateStatus'])->name('updateStatusProduct');
    Route::get('/product/delete/{id}', [ProductController::class,'delete'])->name('softDeleteProduct');
    Route::get('/product/historydelete', [ProductController::class,'history'])->name('historyProduct');
    Route::get('/product/restorehistory/{id}', [ProductController::class,'restore'])->name('restoreProduct');
    Route::get('/product/getCategory/{id}',[ProductController::class,'getCategory']);
    //Product Type
    Route::get('/producttype', [ProductTypeController::class,'index'])->name('producttype.index');
    Route::get('/producttype/create', [ProductTypeController::class,'create'])->name('createProductType');
    Route::post('/producttype/create', [ProductTypeController::class,'store'])->name('storeProductType');
    Route::get('/producttype/edit/{id}', [ProductTypeController::class,'edit'])->name('editProductType');
    Route::post('/producttype/edit/{id}', [ProductTypeController::class,'update'])->name('updateProductType');
    Route::get('/producttype/status/update', [ProductTypeController::class,'updateStatus'])->name('updateStatusProductType');
    Route::get('/producttype/delete/{id}', [ProductTypeController::class,'delete'])->name('softDeleteProductType');
    Route::get('/producttype/historydelete', [ProductTypeController::class,'history'])->name('historyProductType');
    Route::get('/producttype/restorehistorydelete/{id}', [ProductTypeController::class,'restore'])->name('restoreProductType');

    Route::get('/category', [CategoryController::class,'index'])->name('home.listcategory');
    Route::get('/category/create', [CategoryController::class,'create'])->name('home.createcategory');
    Route::post('/category/create', [CategoryController::class,'store'])->name('home.postcreatecategory');
    Route::get('/category/edit/{id}', [CategoryController::class,'edit'])->name('home.geteditcategory');
    Route::post('/category/edit/{id}', [CategoryController::class,'update'])->name('home.posteditcategory');
    Route::get('/category/status/update', [CategoryController::class,'updateStatus'])->name('updateStatusCategoy');
    Route::get('/category/delete/{id}', [CategoryController::class,'delete'])->name('softDeleteCategory');
    Route::get('/category/historydelete', [CategoryController::class,'history'])->name('historyCategory');
    Route::get('/category/restorehistorydelete/{id}', [CategoryController::class,'restore'])->name('restoreCategory');

    Route::get('/imageproduct/{id}', [imageProductController::class,'index'])->name('viewImageProduct');
    Route::get('/imageroduct/create', [imageProductController::class,'create'])->name('createImageProduct');
    Route::post('/imageproduct/create', [imageProductController::class,'store'])->name('storeImageProduct');
    Route::get('/imageproduct/delete/{id}', [imageProductController::class,'delete'])->name('deleteImageProduct');
    Route::get('/imageproduct/offStatus/{id}', [imageProductController::class,'offStatus'])->name('offStatus');
    Route::get('/imageproduct/OnlStatus/{id}', [imageProductController::class,'OnlStatus'])->name('OnlStatus');

    Route::get('/imageproduct/upload', [HomeController::class,'uploadimageproduct'])->name('home.uploadimageproduct');
    Route::get('/ratings', [HomeController::class,'ratings'])->name('home.rating');

    Route::get('/transaction/listorder', [HomeController::class,'transactionlistorder'])->name('home.transaction.listorder');
    Route::get('/transaction/detail', [HomeController::class,'transaction.detail'])->name('home.transaction.detail');
    Route::get('/payment/list', [HomeController::class,'paymentlist'])->name('home.payment.list');
    Route::get('/payment/create', [HomeController::class,'paymentcreate'])->name('home.payment.create');
    Route::get('/role/list', [HomeController::class,'rolelist'])->name('home.role.list');

    Route::get('/transaction/list', [TransactionController::class,'index'])->name('transactionlist');
    Route::get('/transaction/detail{id}', [TransactionController::class,'orderview'])->name('orderlist');
    Route::get('/transaction/change/status/{id}', [TransactionController::class,'changeStatus'])->name('changeStatusTransaction');
    Route::get('/transaction/status/update', [TransactionController::class,'updateStatus'])->name('updateStatusTransaction');
    Route::get('/statistics-bill-success', [TransactionController::class,'statistics'])->name('statistics');
    Route::post('/export-excel/transaction', [TransactionController::class,'exportExcelTransaction'])->name('export.Excel.Transaction');

    Route::get('/slider', [SliderController::class,'index'])->name('sliderlist');
    Route::get('/slider/create', [SliderController::class,'create'])->name('sliderCreate');
    Route::post('/slider/create', [SliderController::class,'store'])->name('sliderStore');
    Route::get('/slider/edit/{id}', [SliderController::class,'edit'])->name('editSlider');
    Route::post('/slider/edit/{id}', [SliderController::class,'update'])->name('updateSilder');
    Route::get('/slider/delete/{id}', [SliderController::class,'delete'])->name('deleteSlider');
    Route::get('/slider/status/update', [SliderController::class,'updateStatus'])->name('updateStatusSlider');

    Route::get('/blogs/list', [BlogController::class,'index'])->name('admin.blog.list.get');
    Route::get('/blogs/create', [BlogController::class,'create'])->name('admin.blog.create.get');
    Route::post('/blogs/create', [BlogController::class,'store'])->name('admin.blog.create.post');
    Route::get('/blogs/edit/{id}', [BlogController::class,'edit'])->name('admin.blog.edit.get');
    Route::post('/blogs/edit/{id}', [BlogController::class,'update'])->name('admin.blog.edit.post');
    Route::get('/blogs/delete/{id}', [BlogController::class,'delete'])->name('admin.blog.delete');

    Route::get('/ratings', [RatingController::class,'index'])->name('ratings');
    Route::get('/rating/update-status', [RatingController::class,'updateStatus'])->name('ratingUpdateStatus');

    Route::get('/system/user/list/user', [UserController::class,'user'])->name('listUser');
    Route::get('/system/user/list/coAdmin', [UserController::class,'coAdmin'])->name('listCoAdmin');
    Route::get('/user/create', [UserController::class,'create'])->name('home.user.create');
    Route::post('/user/store', [UserController::class,'store'])->name('home.user.store');
    Route::get('/user/edit', [UserController::class,'edit'])->name('home.user.edit');


    Route::get('/payment/list', [PaymentController::class,'index'])->name('listPayment');
    Route::get('/payment/create', [PaymentController::class,'create'])->name('paymentCreate');
    Route::post('/payment/store', [PaymentController::class,'store'])->name('StorePayment');
    Route::get('/payment/edit/{id}', [PaymentController::class,'edit'])->name('EditPayment');
    Route::post('/payment/edit/{id}', [PaymentController::class,'update'])->name('UpdatePayment');

    Route::get('/calendar', [CalendarController::class,'index'])->name('calendar');
    Route::get('/get-product-type/{id}', [CalendarController::class,'getProducType'])->name('getProducType');
    Route::get('/order/{id}', [CalendarController::class,'getOrder'])->name('getOrder');


});
