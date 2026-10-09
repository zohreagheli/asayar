<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;
use App\Livewire\Actions\Logout;
use App\Models\Ticket;
use App\Livewire\CreateAppointment;
use App\Livewire\AppointmentList;
use App\Http\Controllers\Admin\PanelController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\TicketShowController;
use App\Livewire\CreateTicket;
use App\Livewire\TicketsList;
use Livewire\Livewire;
use App\Livewire\Auth\RegisterForm;
use App\Livewire\Auth\LoginForm;
use App\Livewire\Profile\UpdateProfile;
use App\Livewire\Admin\AppointmentsChart;
use App\Livewire\Auth\ForgetPassword;
use App\Livewire\Admin\Dashboard;
use App\Livewire\Admin\Showtikets;
use App\Livewire\Admin\TechnicianManager;
use App\Livewire\User\UserTechnicians;
use App\Livewire\AllTechnicians;
use App\Livewire\Gallery\Index;
use App\Livewire\Admin\GalleryManager;
use App\Livewire\Contact;
use App\Livewire\Company\About;
use App\Livewire\ChatSupport;
use App\Livewire\Admin\ChatAdmin;
use App\Livewire\Auth\ResetPassword;
use App\Livewire\Auth\AdminLoginForm;
use App\Livewire\Auth\LoginWithOtp;
use App\Http\Controllers\StoreController;
use App\Http\Controllers\NewsletterController;
use App\Http\Controllers\AdminStoreController;

// ====== Negovid Store Routes ======
Route::get('/', [StoreController::class, 'home'])->name('store.home');
Route::get('/shop', [StoreController::class, 'shop'])->name('store.shop');
Route::get('/product/{slug}', [StoreController::class, 'product'])->name('store.product');
Route::post('/cart/add', [StoreController::class, 'addToCart'])->name('store.cart.add');
Route::get('/cart', [StoreController::class, 'cart'])->name('store.cart');
Route::post('/cart/update', [StoreController::class, 'updateCart'])->name('store.cart.update');
Route::post('/cart/remove', [StoreController::class, 'removeFromCart'])->name('store.cart.remove');
Route::get('/checkout', [StoreController::class, 'checkout'])->name('store.checkout');
Route::post('/checkout', [StoreController::class, 'placeOrder'])->name('store.checkout.submit');
Route::get('/order/{code}', [StoreController::class, 'orderConfirmation'])->name('store.order.confirmation');
Route::get('/track-order', [StoreController::class, 'trackOrder'])->name('store.track.order');
Route::post('/track-order', [StoreController::class, 'trackOrder'])->name('store.track.order.submit');
Route::get('/about', [StoreController::class, 'about'])->name('store.about');
Route::get('/contact', [StoreController::class, 'contact'])->name('store.contact');
Route::post('/newsletter/subscribe', [NewsletterController::class, 'subscribe'])->name('store.newsletter.subscribe');

// ====== Admin Store Routes ======
Route::prefix('admin/store')->middleware(['auth', 'admin'])->name('admin.')->group(function () {
    Route::get('/dashboard', [AdminStoreController::class, 'dashboard'])->name('dashboard.store');
    Route::get('/products', [AdminStoreController::class, 'products'])->name('products');
    Route::get('/products/create', [AdminStoreController::class, 'createProduct'])->name('products.create');
    Route::post('/products/create', [AdminStoreController::class, 'storeProduct'])->name('products.store');
    Route::get('/products/{product}/edit', [AdminStoreController::class, 'editProduct'])->name('products.edit');
    Route::post('/products/{product}/edit', [AdminStoreController::class, 'updateProduct'])->name('products.update');
    Route::delete('/products/{product}', [AdminStoreController::class, 'deleteProduct'])->name('products.delete');
    Route::get('/categories', [AdminStoreController::class, 'categories'])->name('categories');
    Route::post('/categories', [AdminStoreController::class, 'storeCategory'])->name('categories.store');
    Route::delete('/categories/{category}', [AdminStoreController::class, 'deleteCategory'])->name('categories.delete');
    Route::get('/orders', [AdminStoreController::class, 'orders'])->name('orders');
    Route::get('/orders/{order}', [AdminStoreController::class, 'showOrder'])->name('orders.show');
    Route::post('/orders/{order}/status', [AdminStoreController::class, 'updateOrderStatus'])->name('orders.status');
    Route::get('/newsletter', [AdminStoreController::class, 'newsletter'])->name('newsletter');
    Route::get('/testimonials', [AdminStoreController::class, 'testimonials'])->name('testimonials');
    Route::post('/testimonials/{testimonial}/approve', [AdminStoreController::class, 'approveTestimonial'])->name('testimonials.approve');
    Route::delete('/testimonials/{testimonial}', [AdminStoreController::class, 'deleteTestimonial'])->name('testimonials.delete');
});

// ====== Legacy Routes ======
Route::middleware('guest')->group(function () {
    Route::get('/register', RegisterForm::class)->name('register');
    Route::get('/login', LoginForm::class)->name('login');
    Route::get('/forget-password', ForgetPassword::class)->name('password.request');
    Route::get('/admin/login', AdminLoginForm::class)->name('admin.login');
});
Route::get('/reset-password/{token}', ResetPassword::class)->name('password.reset');
Route::post('/logout', Logout::class)->name('logout');
Route::view('confirm', 'livewire/pages/auth/confirm-password');

Route::prefix('admin')->middleware(['auth'])->group(function () {

    Route::get('/dashboard', Dashboard::class)->name('admin.dashboard');
    Route::get('/appointments-chart', AppointmentsChart::class)->name('admin.appointments.chart');
    Route::get('/technicians', TechnicianManager::class)->name('admin.technicians');
    Route::get('/gallery', GalleryManager::class)->name('admin.gallery');
    Route::get('/chat', ChatAdmin::class)->name('admin.chat');
});

Route::middleware('auth')->group(function () { Route::get('/dashboard', function () {
        $user = Auth::user();
        if ($user->role === 'admin') {
            return redirect()->route('admin.dashboard');
        } else {
            return view('basic/dashboard');  }  })->name('dashboard');

Route::get('/profile', UpdateProfile::class)->name('profile');
Route::get('/appointments/create', CreateAppointment::class)->name('appointments.create');
Route::get('/tickets/create', CreateTicket::class)->name('tickets.create');
Route::get('/tickets/list', TicketsList::class)->name('tickets.list');
});

// Route::get('/', [MainController::class, 'index'])->name('home.page'); // moved to store routes
Route::get('/asayar', [PanelController::class, 'index'])->name('asayar.home');
Route::get('/appointments', AppointmentList::class)->name('appointments.index');
Route::get('/user/technicians', UserTechnicians::class)->name('user.technicians');
Route::get('/technicians', AllTechnicians::class)->name('all-technicians');
Route::get('/gallery', Index::class)->name('gallery');
// Route::get('/contact', Contact::class)->name('contact'); // moved to store routes
// Route::get('/about', About::class)->name('about'); // moved to store routes
Route::get('/support', ChatSupport::class)->name('support');

Route::get('/contact-button', function () {
    return view('contact-button');
})->name('contact-button');
Route::get('/login-otp', LoginWithOtp::class) ->name('login.otp');
Route::get('/tickets/show/{ticket}', Showtikets::class)->name('tickets.show');
Route::get('/tickets/show/{ticket}/download', function (Ticket $ticket) {
    if (!$ticket->attachment_path) {
        abort(404);
    }
    $path = storage_path('app/public/' . $ticket->attachment_path);

    return response()->download($path);})->name('tickets.download');



Route::middleware(['web'])->group(function () {
    Livewire::setUpdateRoute(function ($handle) {
        return Route::post('/livewire/update', $handle);
    });
});
