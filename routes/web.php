<?php


use App\Http\Controllers\LoginController;
use App\Http\Livewire\DetailsComponent;
use App\Http\Livewire\AboutUsComponent;
use App\Http\Livewire\Admin\AdminDashboardComponent;
use App\Http\Livewire\CartComponent;
use App\Http\Livewire\CheckoutComponent;
use App\Http\Livewire\ContactUsComponent;
use App\Http\Livewire\HomeComponent;

use App\Http\Livewire\PrivacyPolicyComponent;
use App\Http\Livewire\ReturnPolicyComponent;
use App\Http\Livewire\ShopComponent;
use App\Http\Livewire\TermsConditionComponent;
use App\Http\Livewire\User\UserDashboardComponent;
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



// Route::get('/login', LoginComponent::class)->name('login');
Route::get('/',HomeComponent::class)->name('index');
Route::get('/shop',ShopComponent::class)->name('shop');
Route::get('/cart',CartComponent::class)->name('product.cart');
Route::get('/checkout',CheckoutComponent::class)->name('checkout');
Route::get('/about-us',AboutUsComponent::class)->name('about.us');
Route::get('/privacy-policy',PrivacyPolicyComponent::class)->name('privacy.policy');
Route::get('/contact-us',ContactUsComponent::class)->name('contact.us');
Route::get('/terms-condition',TermsConditionComponent::class)->name('terms.condition');
Route::get('/return-policy',ReturnPolicyComponent::class)->name('return.policy');
Route::get('/product-details/{slug}',DetailsComponent::class)->name('product.details');


/*** 
 * 
 * Authentication
 * 
 * */

    // For User or Customer
    Route::middleware(['auth:sanctum', 'verified'])->group(function(){
        Route::get('/user/dashboard', UserDashboardComponent::class)->name('user.dashboard');

    });
    //For Admin: first make middleware authadmin
    Route::middleware(['auth:sanctum', 'verified', 'authadmin'])->group(function(){
        Route::get('/admin/dashboard', AdminDashboardComponent::class)->name('admin.dashboard');
    });


/**
 * 
 *Socialite Login 
 *
 * */

    //----------------------------Google login-----------------------------//

    Route::get('login/google', [LoginController::class, 'redirectToGoogle'])->name('login.google');
    Route::get('login/google/callback', [LoginController::class, 'handleGoogleCallback']);

    //-----------------------------Facebook login---------------------------//
    Route::get('login/facebook', [LoginController::class, 'redirectToFacebook'])->name('login.facebook');
    Route::get('login/facebook/callback', [LoginController::class, 'handleFacebookCallback']);


    //-----------------------------Github login---------------------------//
    Route::get('login/github', [LoginController::class, 'redirectToGithub'])->name('login.github');
    Route::get('login/github/callback', [LoginController::class, 'handleGithubCallback']);

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
