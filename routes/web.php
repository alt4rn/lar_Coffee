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

//Route::get('/', function () {
//    return view('welcome');
//});

Auth::routes();

Route::get('/admin/dashboard', [
    'uses' => 'UserController@index',
    'as' => 'admin.dashboard'
])->middleware('auth', 'admin');

Route::get('/admin/users', [
    'uses' => 'UserController@users',
    'as' => 'admin.users.index'
])->middleware('auth', 'admin');

// untuk membuat user baru
Route::post('/admin/users', [
    'uses' => 'UserController@store',
    'as' => 'admin.users'
])->middleware('auth', 'admin');

Route::get('/admin/users/create', [
    'uses' => 'UserController@create',
    'as' => 'admin.users.create'
])->middleware('auth', 'admin');

Route::get('/admin/users/{id}', [
    'uses' => 'UserController@show',
    'as' => 'admin.users.create'
])->middleware('auth', 'admin');

Route::get('/admin/users/{id}/edit', [
    'uses' => 'UserController@edit',
    'as' => 'admin.users.edit'
])->middleware('auth', 'admin');

// untuk memperbarui data user
Route::post('admin/users/edit/{id}', [
    'uses' => 'UserController@updateUser',
    'as' => 'admin.users.edit'
])->middleware('auth', 'admin');

// untuk merubah status user
Route::post('admin/users/active/{id}', [
    'uses' => 'UserController@activeUser',
    'as' => 'admin.users.active'
])->middleware('auth', 'admin');

// untuk menghapus user
Route::delete('admin/users/{id}', [
    'uses' => 'UserController@destroy', 
    'as' => 'admin.users.delete'
])->middleware('auth', 'admin');

Route::get('/admin/categories', [
    'uses' => 'CategoryController@categories',
    'as' => 'admin.categories.index'
])->middleware('auth', 'admin');

Route::get('/admin/categories/{id}', [
    'uses' => 'CategoryController@show',
    'as' => 'admin.categories.show'
])->middleware('auth', 'admin');

// untuk membuat kategori baru
Route::post('/admin/categories', [
    'uses' => 'CategoryController@store',
    'as' => 'admin.categories'
])->middleware('auth', 'admin');

Route::get('/admin/kategori/create', [
    'uses' => 'CategoryController@create',
    'as' => 'admin.categories.create'
])->middleware('auth', 'admin');

// untuk memperbarui kategori
Route::patch('admin/categories/edit/{id}', [
    'uses' => 'CategoryController@update',
    'as' => 'admin.kategori.edit'
])->middleware('auth', 'admin');

Route::get('/admin/categories/{id}/edit', [
    'uses' => 'CategoryController@edit',
    'as' => 'admin.categories.edit'
])->middleware('auth', 'admin');

// untuk merubah status kategori produk
Route::post('admin/categories/active/{id}', [
    'uses' => 'CategoryController@activeCategory',
    'as' => 'admin.categories.active'
])->middleware('auth', 'admin');

// untuk menghapus kategori
Route::delete('admin/categories/{id}', [
    'uses' => 'CategoryController@destroy', 
    'as' => 'admin.categories.delete'
])->middleware('auth', 'admin');

Route::get('admin/products/', [
    'uses' => 'ProductController@products',
    'as' => 'admin.products.index'
])->middleware('auth', 'admin');

// untuk membuat produk baru
Route::post('/admin/products', [
    'uses' => 'ProductController@store',
    'as' => 'admin.products'
])->middleware('auth', 'admin');

Route::get('/admin/products/create', [
    'uses' => 'ProductController@create',
    'as' => 'admin.products.create'
])->middleware('auth', 'admin');

// untuk merubah data produk
Route::patch('/admin/products/edit/{id}', [
    'uses' => 'ProductController@update',
    'as' => 'admin.produk.edit'
])->middleware('auth', 'admin');

Route::get('/admin/products/{id}/edit/', [
    'uses' => 'ProductController@edit',
    'as' => 'admin.products.edit'
])->middleware('auth', 'admin');

// untuk merubah status produk
Route::post('admin/products/active/{id}', [
    'uses' => 'ProductController@activeProduct',
    'as' => 'admin.products.active'
])->middleware('auth', 'admin');

Route::get('admin/products/{id}', [
    'uses' => 'ProductController@show', 
    'as' => 'admin.products.show'
])->middleware('auth', 'admin');

Route::delete('admin/products/{id}', [
    'uses' => 'ProductController@destroy',
    'as' => 'admin.products.delete'
])->middleware('auth', 'admin');

Route::get('admin/orders/', [
    'uses' => 'OrderController@index',
    'as' => 'admin.orders.index'
])->middleware('auth', 'admin');

Route::get('admin/orders/{id}', [
    'uses' => 'OrderController@show', 
    'as' => 'admin.orders.show'
])->middleware('auth', 'admin');

// untuk memperbarui data pesanan (Order)
Route::post('admin/orders/edit/{id}', [
    'uses' => 'OrderController@update',
    'as' => 'admin.orders.update'
])->middleware('auth', 'admin');

Route::get('admin/orders/{id}/edit', [
    'uses' => 'OrderController@edit',
    'as' => 'admin.orders.edit'
])->middleware('auth', 'admin');

// untuk merubah status pesanan menjadi cancel / done
Route::post('admin/orders/status/{id}', [
    'uses' => 'OrderController@statusOrder',
    'as' => 'admin.products.cancel'
])->middleware('auth', 'admin');

// untuk menghapus pesanan (Order)
Route::delete('admin/orders/{id}', [
    'uses' => 'OrderController@destroy', 
    'as' => 'admin.orders.delete'
])->middleware('auth', 'admin');

Route::get('admin/reviews/', [
    'uses' => 'ReviewController@index',
    'as' => 'admin.reviews.index'
])->middleware('auth', 'admin');

Route::get('admin/reviews/{id}', [
    'uses' => 'ReviewController@show', 
    'as' => 'admin.reviews.show'
])->middleware('auth', 'admin');

// untuk mengubah nilai persetujuan sebuah review
Route::post('admin/reviews/edit/{id}', [
    'uses' => 'ReviewController@update',
    'as' => 'admin.reviews.edit'
])->middleware('auth', 'admin');

Route::get('user/login', [
    'uses' => 'UserController@login',
    'as' => 'user.login'
]);

Route::post('user/login', [
    'uses' => 'Auth\LoginController@authenticates',
    'as' => 'user.login'
]);

// Admin Promotion
Route::get('admin/promotions', [
    'uses' => 'PromotionController@index',
    'as' => 'admin.promotions.index'
])->middleware('auth', 'admin');

Route::get('admin/promotions/{id}', [
    'uses' => 'PromotionController@show',
    'as' => 'admin.promotions.show'
])->middleware('auth', 'admin');

// untuk merubah status promo
Route::post('admin/promotions/active/{id}', [
    'uses' => 'PromotionController@activePromo',
    'as' => 'admin.promotions.active'
])->middleware('auth', 'admin');

// untuk membuat promo baru
Route::post('/admin/promotions', [
    'uses' => 'PromotionController@store',
    'as' => 'admin.promotions'
])->middleware('auth', 'admin');

Route::get('/admin/promotion/create', [
    'uses' => 'PromotionController@create',
    'as' => 'admin.promotions.create'
])->middleware('auth', 'admin');

// untuk memperbarui data promo
Route::get('/admin/promotions/{id}/edit', [
    'uses' => 'PromotionController@edit',
    'as' => 'admin.promotions.edit'
])->middleware('auth', 'admin');

Route::post('admin/promotions/edit/{id}', [
    'uses' => 'PromotionController@update',
    'as' => 'admin.promotions.edit'
])->middleware('auth', 'admin');

// untuk melihat profil pengguna
Route::get('/profile/{id}', [
    'uses' => 'UserController@openProfile',
    'as' => 'profile'
])->middleware('auth');

Route::post('/profile/{id}', [
    'uses' => 'UserController@update',
    'as' => 'profile.update'
])->middleware('auth');

Route::get('/order/{id}', [
    'uses' => 'OrderController@userOrder',
    'as' => 'user.order'
])->middleware('auth');

// untuk melihat detail pesanan yang dipilih
Route::get('/order/detail/{id}', [
    'uses' => 'OrderController@orderDetail',
    'as' => 'user.order.detail'
])->middleware('auth');

// untuk update order yang sedang berjalan
Route::post('/order/edit/{id}', [
    'uses' => 'OrderController@orderUpdate',
    'as' => 'user.order.update'
])->middleware('auth');

// untuk menulis review setiap produk
Route::get('/order/review/{o_id}/{p_id}', [
    'uses' => 'ReviewController@userReview',
    'as' => 'user.review'
])->middleware('auth');

// user input review untuk produk yang dipesan
Route::post('/order/review/{id}', [
    'uses' => 'ReviewController@userInput',
    'as' => 'user.review'
])->middleware('auth');

//Route::get('/home', 'HomeController@index')->name('home');

Route::get('/home', [
    'uses' => 'CategoryController@index',
    'as' => 'home'
]);

Route::get('/about', [
    'uses' => 'CategoryController@about',
    'as' => 'about'
]);

Route::get('/promo', [
    'uses' => 'PromotionController@promo',
    'as' => 'promo'
]);

Route::get('/products', [
    'uses' => 'ProductController@index',
    'as' => 'product'
]);

Route::get('/product/{id}', [
    'uses' => 'ProductController@detail',
    'as' => 'product.detail'
]);

Route::get('/product/category/{id}', [
    'uses' => 'ProductController@selectedCategory',
    'as' => 'product.category'
]);

Route::get('/cart', [
    'uses' => 'ShoppingController@cart',
    'as' => 'cart'
]);

Route::post('/cart', [
    'uses' => 'ShoppingController@addCart',
    'as' => 'cart.add'
]);

Route::get('/cart/update', [
    'uses' => 'ShoppingController@updateCart',
    'as' => 'cart.update'
]);

Route::get('/cart/delete', [
    'uses' => 'ShoppingController@deleteCart',
    'as' => 'cart.delete'
]);

// masuk ke halaman checkout
Route::get('/cart/checkout', [
    'uses' => 'ShoppingController@buyOrder',
    'as' => 'cart.checkout'
])->middleware('auth');

Route::post('/cart/checkout', [
    'uses' => 'ShoppingController@makeOrder',
    'as' => 'cart.order'
])->middleware('auth');