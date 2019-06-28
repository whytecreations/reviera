<?php
Route::get('test', function () {
    return bcrypt('12341234');
});

Route::get('/', 'Front\HomePageController@index');
Route::get('about', 'Front\HomePageController@about');
Route::get('corporate-rate', 'Front\HomePageController@corporate');
Route::post('corporate', 'Front\HomePageController@corporateEnquiry');
Route::get('flowers', 'Front\HomePageController@flowers')->name('flowers');
Route::get('flowers/{slug}', 'Front\HomePageController@flowersByCategory');
Route::get('chocolates', 'Front\HomePageController@chocolates')->name('chocolates');
Route::get('chocolates/{slug}', 'Front\HomePageController@chocolatesByCategory');
Route::get('gift-wrapping', 'Front\HomePageController@giftWrapping')->name('gift-wrapping');
Route::get('account', 'Front\HomePageController@account');
Route::get('checkout', 'Front\HomePageController@checkout');
Route::post('placeorder', 'Front\HomePageController@placeOrder')->name('place-order');
Route::get('cart', 'Front\HomePageController@cart');
Route::get('getcart', 'Front\HomePageController@getCart')->name('getcart');
Route::get('contact', 'Front\HomePageController@contact');
Route::post('contact', 'Front\HomePageController@contactEnquiry');
Route::post('addflowertocart', 'Front\HomePageController@addFlowerToCart')->name('addflowertocart');
Route::post('addchocolatetocart', 'Front\HomePageController@addChocolateToCart')->name('addchocolatetocart');
Route::post('removefromcart', 'Front\HomePageController@removefromcart')->name('removefromcart');
Route::post('updatequantity', 'Front\HomePageController@updatequantity')->name('updatequantity');

Route::post('addflowertowishlist', 'Front\HomePageController@addFlowerToWishList')->name('addflowertowishlist');
Route::post('addchocolatetowishlist', 'Front\HomePageController@addChocolateToWishList')->name('addchocolatetowishlist');
Route::post('wishlisttocart', 'Front\HomePageController@wishlisttocart')->name('wishlisttocart');

Route::post('changedetails', 'Front\Auth\LoginController@changedetails')->name('customer.changedetails');
Route::post('changepassword', 'Front\Auth\LoginController@changePassword')->name('customer.changepassword');

Route::get('login', 'Front\Auth\LoginController@showLoginForm')->name('customer.login');
Route::post('login', 'Front\Auth\LoginController@login')->name('customer.login');
Route::get('register', 'Front\Auth\RegisterController@showRegistrationForm');
Route::post('register', 'Front\Auth\RegisterController@register')->name('customer.register');
Route::get('signout', 'Front\Auth\LoginController@logout')->name('customer.logout');
Route::post('signout', 'Front\Auth\LoginController@logout')->name('customer.logout');

// Authentication Routes...
Route::get('admin', 'Auth\LoginController@showLoginForm')->name('auth.login');
Route::post('admin', 'Auth\LoginController@login')->name('auth.login');
Route::post('logout', 'Auth\LoginController@logout')->name('auth.logout');

// Change Password Routes...
Route::get('change_password', 'Auth\ChangePasswordController@showChangePasswordForm')->name('auth.change_password');
Route::patch('change_password', 'Auth\ChangePasswordController@changePassword')->name('auth.change_password');

// Password Reset Routes...
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('auth.password.reset');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('auth.password.reset');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset')->name('auth.password.reset');

Route::group(['middleware' => ['auth'], 'prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::get('/home', 'DashboardController@index')->name('home');;
    Route::get('images/{id}', function ($filename) {
        $path = public_path('images/' . $filename);

        if (!File::exists($path)) {
            $path = public_path($filename);

            if (!File::exists($path)) {
                abort(404);
            }

            $file = File::get($path);
            $type = File::mimeType($path);

            $response = Response::make($file, 200);
            $response->header("Content-Type", $type);

            return $response;
        }
        return redirect('images/' . $filename);

    });
    Route::resource('roles', 'Admin\RolesController');
    Route::post('roles_mass_destroy', ['uses' => 'Admin\RolesController@massDestroy', 'as' => 'roles.mass_destroy']);

    Route::resource('users', 'Admin\UsersController');
    Route::post('users_mass_destroy', ['uses' => 'Admin\UsersController@massDestroy', 'as' => 'users.mass_destroy']);

    Route::resource('corporates', 'Admin\CorporateController');
    Route::post('corporates_mass_destroy', ['uses' => 'Admin\CorporateController@massDestroy', 'as' => 'corporates.mass_destroy']);
    Route::post('corporates_restore/{id}', ['uses' => 'Admin\CorporateController@restore', 'as' => 'corporates.restore']);
    Route::delete('corporates_perma_del/{id}', ['uses' => 'Admin\CorporateController@perma_del', 'as' => 'flowercategories.perma_del']);

    Route::resource('flowercategories', 'Admin\FlowerCategoryController');
    Route::post('flowercategories_mass_destroy', ['uses' => 'Admin\FlowerCategoryController@massDestroy', 'as' => 'flowercategories.mass_destroy']);
    Route::post('flowercategories_restore/{id}', ['uses' => 'Admin\FlowerCategoryController@restore', 'as' => 'flowercategories.restore']);
    Route::delete('flowercategories_perma_del/{id}', ['uses' => 'Admin\FlowerCategoryController@perma_del', 'as' => 'flowercategories.perma_del']);

    Route::resource('flowers', 'Admin\FlowerController');
    Route::post('flowers_mass_destroy', ['uses' => 'Admin\FlowerController@massDestroy', 'as' => 'flowers.mass_destroy']);
    Route::post('flowers_restore/{id}', ['uses' => 'Admin\FlowerController@restore', 'as' => 'flowers.restore']);
    Route::delete('flowers_perma_del/{id}', ['uses' => 'Admin\FlowerController@perma_del', 'as' => 'flowers.perma_del']);

    Route::resource('chocolatecategories', 'Admin\ChocolateCategoryController');
    Route::post('chocolatecategories_mass_destroy', ['uses' => 'Admin\ChocolateCategoryController@massDestroy', 'as' => 'chocolatecategories.mass_destroy']);
    Route::post('chocolatecategories_restore/{id}', ['uses' => 'Admin\ChocolateCategoryController@restore', 'as' => 'chocolatecategories.restore']);
    Route::delete('chocolatecategories_perma_del/{id}', ['uses' => 'Admin\ChocolateCategoryController@perma_del', 'as' => 'chocolatecategories.perma_del']);

    Route::resource('chocolates', 'Admin\ChocolateController');
    Route::post('chocolates_mass_destroy', ['uses' => 'Admin\ChocolateController@massDestroy', 'as' => 'chocolates.mass_destroy']);
    Route::post('chocolates_restore/{id}', ['uses' => 'Admin\ChocolateController@restore', 'as' => 'chocolates.restore']);
    Route::delete('chocolates_perma_del/{id}', ['uses' => 'Admin\ChocolateController@perma_del', 'as' => 'chocolates.perma_del']);

    Route::resource('gifts', 'Admin\GiftController');
    Route::post('gifts_mass_destroy', ['uses' => 'Admin\GiftController@massDestroy', 'as' => 'gifts.mass_destroy']);
    Route::post('gifts_restore/{id}', ['uses' => 'Admin\GiftController@restore', 'as' => 'gifts.restore']);
    Route::delete('gifts_perma_del/{id}', ['uses' => 'Admin\GiftController@perma_del', 'as' => 'gifts.perma_del']);

    Route::resource('orders', 'Admin\OrderController');
    Route::get('order/{id}', 'Admin\OrderController@getOrder');
    // Route::post('orders_mass_destroy', ['uses' => 'Admin\FlowerController@massDestroy', 'as' => 'orders.mass_destroy']);
    // Route::post('orders_restore/{id}', ['uses' => 'Admin\FlowerController@restore', 'as' => 'orders.restore']);
    // Route::delete('orders_perma_del/{id}', ['uses' => 'Admin\FlowerController@perma_del', 'as' => 'orders.perma_del']);

    Route::post('/spatie/media/upload', 'Admin\SpatieMediaController@create')->name('media.upload');
    Route::post('/spatie/media/remove', 'Admin\SpatieMediaController@destroy')->name('media.remove');

});
