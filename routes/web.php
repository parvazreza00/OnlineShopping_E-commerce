<?php

use App\Models\User;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Backend\AdminProfileController;
use App\Http\Controllers\Backend\BrandController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\SubCategoryController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Backend\SliderController;
use App\Http\Controllers\Backend\CouponController;
use App\Http\Controllers\Backend\ShippingAreaController;
use App\Http\Controllers\Backend\OrderController;
use App\Http\Controllers\Backend\ReportController;
use App\Http\Controllers\Backend\BlogController;
use App\Http\Controllers\Backend\SiteSettingController;
use App\Http\Controllers\Backend\ReturnController;
use App\Http\Controllers\Backend\AdminUserController;


use App\Http\Controllers\frontend\IndexController;
use App\Http\Controllers\frontend\LanguageController;
use App\Http\Controllers\frontend\CartController;
use App\Http\Controllers\frontend\HomeBlogController;
use App\Http\Controllers\frontend\ShopController;

use App\Http\Controllers\User\WishListController;
use App\Http\Controllers\User\CartPageController;
use App\Http\Controllers\User\CheckoutController;
use App\Http\Controllers\User\StripeController;
use App\Http\Controllers\User\CashController;
use App\Http\Controllers\User\AllUserController;
use App\Http\Controllers\User\ReviewController;




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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::middleware('admin:admin')->group(function(){
    Route::get('admin/login',[AdminController::class, 'loginForm'])->name('admin.login.form');
    Route::post('admin/login',[AdminController::class, 'store'])->name('admin.login');
});

Route::middleware([
    'auth:sanctum,admin',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {Route::get('/admin/dashboard', function () {
        return view('admin.index');
    })->name('dashboard')->middleware('auth:admin');
});

Route::middleware(['auth:admin'])->group(function(){
    // Admin all controllers 
    Route::get('admin/logout',[AdminController::class, 'destroy'])->name('admin.logout');
    Route::get('admin/profile',[AdminProfileController::class, 'adminProfile'])->name('admin.profile');
    Route::get('admin/profile/edit',[AdminProfileController::class, 'adminProfileEdit'])->name('admin.profile.edit');
    Route::post('admin/profile/store',[AdminProfileController::class, 'adminProfileStore'])->name('admin.profile.store');
    Route::get('admin/change/password',[AdminProfileController::class, 'adminChangePassword'])->name('admin.change.password');
    Route::post('update/change/password',[AdminProfileController::class, 'adminUpdateChangePassword'])->name('update.change.password');

});//end middleware admin


// user all routes
Route::middleware(['auth:sanctum,web', config('jetstream.auth_session'),'verified'
])->group(function () {Route::get('/dashboard', function () {
        $id = Auth::user()->id;
        $user = User::find($id);
     return view('dashboard',compact('user'));
    })->name('dashboard');
});

Route::get('/',[IndexController::class, 'index']);
Route::get('user/logout',[IndexController::class, 'userLogout'])->name('user.logout');
Route::get('user/profile',[IndexController::class, 'userProfile'])->name('user.profile');
Route::post('user/profile/store',[IndexController::class, 'userProfileStore'])->name('user.profile.store');
Route::get('user/change/password',[IndexController::class, 'changePassword'])->name('change.password');
Route::post('user/password/update',[IndexController::class, 'userPasswordUpdate'])->name('user.password.update');

// admin brand related all routes
Route::prefix('brand')->group(function(){
    Route::get('/view', [BrandController::class, 'brandView'])->name('all.brand');
    Route::post('/store', [BrandController::class, 'brandStore'])->name('brand.store');
    Route::get('/edit/{id}', [BrandController::class, 'brandEdit'])->name('brand.edit');
    Route::post('/update', [BrandController::class, 'updateBrand'])->name('brand.update');
    Route::get('/delete/{id}', [BrandController::class, 'brandDelete'])->name('brand.delete');
});

// admin category related all routes
Route::prefix('category')->group(function(){
    Route::get('/view', [CategoryController::class, 'categoryView'])->name('all.category');
    Route::post('/store', [CategoryController::class, 'categoryStore'])->name('category.store');
    Route::get('/edit/{id}', [CategoryController::class, 'categoryEdit'])->name('category.edit');
    Route::post('/update', [CategoryController::class, 'updateCategory'])->name('category.update');
    Route::get('/delete/{id}', [CategoryController::class, 'categoryDelete'])->name('category.delete');
    
    // admin all subcategory routes
    Route::get('/subcategory/view', [SubCategoryController::class, 'subcategoryView'])->name('all.subcategory');
    Route::post('/subcategory/store', [SubCategoryController::class, 'subcategoryStore'])->name('subcategory.store');
    Route::get('/subcategory/edit/{id}', [SubCategoryController::class, 'subcategoryEdit'])->name('subcategory.edit');
    Route::post('/subcategory/update', [SubCategoryController::class, 'updateSubCategory'])->name('subcategory.update');
    Route::get('/subcategory/delete/{id}', [SubCategoryController::class, 'subcategoryDelete'])->name('subcategory.delete');

    // admin all sub-subcategory routes 
    Route::get('/sub/subcategory/view', [SubCategoryController::class, 'subSubCategoryView'])->name('all.subsubcategory');
    Route::get('/subcategory/ajax/{category_id}', [SubCategoryController::class, 'getSubCategory']);
    Route::get('/sub-subcategory/ajax/{subcategory_id}', [SubCategoryController::class, 'getSubSubCategory']);
    Route::post('/sub/subcategory/store', [SubCategoryController::class, 'subSubCategoryStore'])->name('subsubcategory.store');
    Route::get('/sub/subcategory/edit/{id}', [SubCategoryController::class, 'subSubCategoryEdit'])->name('subsubcategory.edit');
    Route::post('/sub/subcategory/update', [SubCategoryController::class, 'updateSubSubCategory'])->name('subsubcategory.update');
    Route::get('/sub/subcategory/delete/{id}', [SubCategoryController::class, 'subSubCategoryDelete'])->name('subsubcategory.delete');

});

// admin Product related all routes
Route::prefix('product')->group(function(){
    Route::get('/add', [ProductController::class, 'addProduct'])->name('add.product');
    Route::post('/store', [ProductController::class, 'storeProduct'])->name('product.store');
    Route::get('/manage', [ProductController::class, 'manageProduct'])->name('manage.product');
    Route::get('/edit/{id}', [ProductController::class, 'editProduct'])->name('product.edit');
    Route::post('/data/update', [ProductController::class, 'updateDataProduct'])->name('product.update');
    Route::get('/data/delete/{id}', [ProductController::class, 'deleteDataProduct'])->name('product.delete');
    Route::post('/image/update', [ProductController::class, 'multiImgUpdate'])->name('update.product.image');
    Route::post('/thumbnail/image/update', [ProductController::class, 'thumbnailImgUpdate'])->name('update.product.thumbnail');
    Route::get('/multiple/image/delete/{id}', [ProductController::class, 'productMultiImgDelete'])->name('product.multiImage.delete');
    Route::get('/inactive/{id}', [ProductController::class, 'productInactive'])->name('product.inactive');
    Route::get('/active/{id}', [ProductController::class, 'productActive'])->name('product.active');
    Route::get('/details/{id}', [ProductController::class, 'productDetails'])->name('product.details');
    
});

// admin Slider related all routes
Route::prefix('slider')->group(function(){
    Route::get('/view', [SliderController::class, 'sliderView'])->name('manage-slider');
    Route::post('/store', [SliderController::class, 'sliderStore'])->name('slider.store');
    Route::get('/edit/{id}', [SliderController::class, 'sliderEdit'])->name('slider.edit');
    Route::post('/update', [SliderController::class, 'updateSlider'])->name('slider.update');
    Route::get('/delete/{id}', [SliderController::class, 'sliderDelete'])->name('slider.delete');
    Route::get('/inactive/{id}', [SliderController::class, 'sliderInactive'])->name('slider.inactive');
    Route::get('/active/{id}', [SliderController::class, 'sliderActive'])->name('slider.active');
    
});

// admin Coupon related all routes
Route::prefix('coupons')->group(function(){
    Route::get('/view', [CouponController::class, 'couponView'])->name('manage-coupon');
    Route::post('/store', [CouponController::class, 'couponStore'])->name('coupon.store');
    Route::get('/edit/{id}', [CouponController::class, 'couponEdit'])->name('coupon.edit');
    Route::post('/update/{id}', [CouponController::class, 'updateCoupon'])->name('coupon.update');
    Route::get('/delete/{id}', [CouponController::class, 'couponDelete'])->name('coupon.delete');
      
});

// admin shipping related all routes
Route::prefix('shipping')->group(function(){
    //shipping division route..........
    Route::get('/division/view', [ShippingAreaController::class, 'divisionView'])->name('manage-division');
    Route::post('/division/store', [ShippingAreaController::class, 'divisionStore'])->name('division.store');
    Route::get('/division/edit/{id}', [ShippingAreaController::class, 'divisionEdit'])->name('division.edit');
    Route::post('/division/update/{id}', [ShippingAreaController::class, 'updateDivision'])->name('division.update');
    Route::get('/division/delete/{id}', [ShippingAreaController::class, 'divisionDelete'])->name('division.delete');    

    //shipping district route..........
    Route::get('/district/view', [ShippingAreaController::class, 'districtView'])->name('manage-district');
    Route::post('/district/store', [ShippingAreaController::class, 'districtStore'])->name('district.store');
    Route::get('/district/edit/{id}', [ShippingAreaController::class, 'districtEdit'])->name('district.edit');
    Route::post('/district/update/{id}', [ShippingAreaController::class, 'updateDistrict'])->name('district.update');
    Route::get('/district/delete/{id}', [ShippingAreaController::class, 'districtDelete'])->name('district.delete');

    //shipping state route...............................
    Route::get('/state/view', [ShippingAreaController::class, 'stateView'])->name('manage-state');
    Route::post('/state/store', [ShippingAreaController::class, 'stateStore'])->name('state.store');
    Route::get('/state/edit/{id}', [ShippingAreaController::class, 'stateEdit'])->name('state.edit');
    Route::post('/state/update/{id}', [ShippingAreaController::class, 'updateState'])->name('state.update');
    Route::get('/state/delete/{id}', [ShippingAreaController::class, 'stateDelete'])->name('state.delete');

    Route::get('/district/ajax/{division_id}', [ShippingAreaController::class, 'getDistrict']);
    Route::get('/state/ajax/{district_id}', [ShippingAreaController::class, 'getState']);
    
});

//coupon apply option route
Route::post('/coupon-apply', [CartController::class, 'couponApply']);
Route::get('/coupon-calculation', [CartController::class, 'couponCalculation']);
Route::get('/coupon-remove', [CartController::class, 'couponRemove']);

//checkout routes
Route::get('/checkout', [CartController::class, 'checkoutCreate'])->name('checkout');
Route::post('/checkout/store', [CheckoutController::class, 'checkoutStore'])->name('checkout.store');


//Frontend all routes
//Multi language all routes-------------------------------------
Route::get('/hindi/language', [LanguageController::class, 'hindi'])->name('hindi.language');
Route::get('/english/language', [LanguageController::class, 'english'])->name('english.language');

// product details url
Route::get('/product/details/{id}/{slug}', [IndexController::class, 'productDetails']);
//frontend product  tag page
Route::get('/product/tag/{tag}', [IndexController::class, 'tagWiseProduct']);
//frontend subcategory wise page
Route::get('/subcategory/product/{subcategory_id}/{slug}', [IndexController::class, 'subcategoryWiseProduct']);
//frontend subsubcategory wise page
Route::get('/subsubcategory/product/{subsubcategory_id}/{slug}', [IndexController::class, 'subsubcategoryWiseProduct']);
//product view modal with ajax
Route::get('/product/view/modal/{id}', [IndexController::class, 'productViewAjax']);
//add to cart store data
Route::post('/cart/data/store/{id}', [CartController::class, 'addToCart']);
//add to mini cart
Route::get('/product/mini/cart', [CartController::class, 'addToMiniCart']);
// mini cart product remove
Route::get('/minicart/product-remove/{rowId}', [CartController::class, 'removeMiniCart']);
// add to wishlist route
Route::post('/add-to-wishlist/{product_id}', [CartController::class, 'addToWishlist']);

//user must login this url .............................
Route::group(['prefix' => 'user', 'middleware' =>['user','auth'], 'namespace'=>'User'], function(){
    // wishlist page load route
    Route::get('/wishlist', [WishListController::class, 'viewWishlist'])->name('wishlist');
    Route::get('/get-wishlist-product', [WishListController::class, 'getWishlistProduct']);
    Route::get('/wishlist-remove/{id}', [WishListController::class, 'removeWishlistProduct']);

    Route::post('/stripe/order', [StripeController::class, 'StripeOrder'])->name('stripe.order');
    Route::post('/cash/order', [CashController::class, 'cashOrder'])->name('cash.order');
    Route::get('/my/orders', [AllUserController::class, 'myOrders'])->name('my.orders');
    Route::get('/order-details/{order_id}', [AllUserController::class, 'orderDetails']);
    Route::get('/invoice_download/{order_id}', [AllUserController::class, 'invoiceDownload']);
    Route::post('/return/order/{order_id}', [AllUserController::class, 'returnOrder'])->name('return.order');
    Route::get('/return/order/list', [AllUserController::class, 'returnOrderList'])->name('return.order.list');
    Route::get('/cancel/order/list', [AllUserController::class, 'cancelOrderList'])->name('cancel.order.list');

    //order tracking route
    Route::post('/order/tracking', [AllUserController::class, 'orderTracking'])->name('order.tracking');

});

//my cart all routes
Route::get('/mycart', [CartPageController::class, 'myCart'])->name('mycart');
Route::get('/user/get-cart-product', [CartPageController::class, 'getCartProduct']);
Route::get('/user/cart-remove/{rowId}', [CartPageController::class, 'removeCartProduct']);
Route::get('/cart-increment/{rowId}', [CartPageController::class, 'cartIncrement']);
Route::get('/cart-decrement/{rowId}', [CartPageController::class, 'cartDecrement']);


// user orders related all routes
Route::prefix('orders')->group(function(){
    Route::get('/pending/orders', [OrderController::class, 'pendingOrder'])->name('pending-orders');
    Route::get('/pending/orders/details/{order_id}', [OrderController::class, 'pendingOrderDetails'])->name('pending.order.details');
    Route::get('/confirm/orders', [OrderController::class, 'confirmOrder'])->name('confirm-orders');
    Route::get('/processing/orders', [OrderController::class, 'processingOrder'])->name('processing-orders');
    Route::get('/picked/orders', [OrderController::class, 'pickedOrder'])->name('picked-orders');
    Route::get('/shipped/orders', [OrderController::class, 'shippedOrder'])->name('shipped-orders');
    Route::get('/delivered/orders', [OrderController::class, 'deliveredOrder'])->name('delivered-orders');
    Route::get('/cancel/orders', [OrderController::class, 'cancelOrder'])->name('cancel-orders');

    //Update status routes
    Route::get('/pending/confirm/{order_id}', [OrderController::class, 'pendingToConfirm'])->name('pending.confirm');
    Route::get('/confirm/processing/{order_id}', [OrderController::class, 'confirmToProcessing'])->name('confirm.processing');
    Route::get('/processing/picked/{order_id}', [OrderController::class, 'ProcessingToPicked'])->name('processing.picked');
    Route::get('/picked/shipped/{order_id}', [OrderController::class, 'pickedToShipped'])->name('picked.shipped');
    Route::get('/shipped/delivered/{order_id}', [OrderController::class, 'shippedToDelivered'])->name('shipped.delivered');
    Route::get('/cancel/order/{order_id}', [OrderController::class, 'cancelToOrder'])->name('cancel');
    Route::get('/invoice/download/{order_id}', [OrderController::class, 'AdminInvoiceDownload'])->name('invoice.download');
    
      
});

// Admin Reports all routes
Route::prefix('reports')->group(function(){
    Route::get('/view', [ReportController::class, 'reportView'])->name('all-reports');
    Route::post('/search/by/date', [ReportController::class, 'reportByDate'])->name('search-by-date');
    Route::post('/search/by/month', [ReportController::class, 'reportByMonth'])->name('search-by-month');
    Route::post('/search/by/year', [ReportController::class, 'reportByYear'])->name('search-by-year');

});

// Admin user all routes
Route::prefix('alluser')->group(function(){
    Route::get('/view', [AdminProfileController::class, 'allUser'])->name('all-user');   
});

// Admin user role all routes
Route::prefix('alladminuserrole')->group(function(){
    Route::get('/all', [AdminUserController::class, 'allAdminRole'])->name('all.admin.user');   
    Route::get('/add', [AdminUserController::class, 'addAdminRole'])->name('add.admin');   
    Route::post('/store', [AdminUserController::class, 'storeAdminRole'])->name('admin.user.store');   
    Route::get('/edit/{id}', [AdminUserController::class, 'EditAdminRole'])->name('edit.admin.user');   
    Route::post('/update', [AdminUserController::class, 'updateAdminRole'])->name('admin.user.update');   
    Route::get('/delete/{id}', [AdminUserController::class, 'deleteAdminRole'])->name('delete.admin.user');   
});

// Admin site setting all routes
Route::prefix('setting')->group(function(){
    Route::get('/site', [SiteSettingController::class, 'siteSetting'])->name('site.setting');   
    Route::post('/site/update/{id}', [SiteSettingController::class, 'siteSettingUpdate'])->name('update.sitesetting');   
    Route::get('/seo', [SiteSettingController::class, 'seoSetting'])->name('seo.setting');   
    Route::post('/seo/update/{id}', [SiteSettingController::class, 'seoSettingUpdate'])->name('update.seoSetting');   
});

// Admin site Return Order all routes
Route::prefix('return')->group(function(){
    Route::get('/admin/request', [ReturnController::class, 'returnRequest'])->name('return.request');   
    Route::get('/admin/request/approved/{order_id}', [ReturnController::class, 'returnRequestApproved'])->name('return.approved');  
    Route::get('/admin/all/request', [ReturnController::class, 'returnAllRequest'])->name('return.all.request');  
       
});

// Admin blog all routes
Route::prefix('blog')->group(function(){
    Route::get('/category', [BlogController::class, 'blogCategory'])->name('blog.category');
    Route::post('/store', [BlogController::class, 'blogCategoryStory'])->name('blogcategory.store');
    Route::get('/edit/{id}', [BlogController::class, 'blogCategoryEdit'])->name('blog.category.edit');
    Route::post('/update/{id}', [BlogController::class, 'blogCategoryUpdate'])->name('blog.category.update');
    Route::get('/delete/{id}', [BlogController::class, 'blogCategoryDelete'])->name('blog.category.delete');

    //Admin view blog post routes
    Route::get('/list/post', [BlogController::class, 'listBlogPost'])->name('list.post');
    Route::get('/add/post', [BlogController::class, 'addBlogPost'])->name('add.post');
    Route::post('/post/store', [BlogController::class, 'BlogPostStore'])->name('post.store');
    Route::get('/post/edit/{id}', [BlogController::class, 'BlogPostEdit'])->name('post.edit');
    Route::post('/post/update/{id}', [BlogController::class, 'BlogPostUpdate'])->name('post.update');
    Route::get('/post/delete/{id}', [BlogController::class, 'BlogPostDelete'])->name('post.delete');    

});

//frontend home blog all routes
Route::get('/blog', [HomeBlogController::class, 'homeBlog'])->name('home.blog'); 
Route::get('/post/details/{id}', [HomeBlogController::class, 'detailsBlogPost'])->name('post.details'); 
Route::get('/blog/category/post/{category_id}', [HomeBlogController::class, 'blogPostCategory']); 

//frontend product Review all routes
Route::post('/review/store/{product_id}', [ReviewController::class, 'reviewStore'])->name('review.store'); 

//Admin manage review all routes
Route::prefix('review')->group(function(){
    Route::get('/pending', [ReviewController::class, 'pendingReview'])->name('pending.review');   
    Route::get('/admin/approved/{id}', [ReviewController::class, 'reviewApproved'])->name('review.approved');      
    Route::get('/admin/publish', [ReviewController::class, 'publishApproved'])->name('publish.review');      
    Route::get('/review/{id}', [ReviewController::class, 'deleteReview'])->name('delete.review');      
       
});

//product search route
Route::post('/search', [IndexController::class, 'productSearch'])->name('product.search');
//advanced search product
Route::post('search-product', [IndexController::class, 'advancedProductSearch']);

//Admin manage stock all routes
Route::prefix('stock')->group(function(){
    Route::get('/product', [ProductController::class, 'productStock'])->name('product.stock');   
          
});

//Shop page route.........
Route::get('/shop', [ShopController::class, 'shopPage'])->name('shop.page');
Route::post('/shop/filter', [ShopController::class, 'shopFilter'])->name('shop.filter');

