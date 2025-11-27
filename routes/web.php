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

Route::get('/', [MainController::class, 'index'])->name('welcome');
Route::get('/asayar', [PanelController::class, 'index'])->name('home.page');
Route::get('/appointments', AppointmentList::class)->name('appointments.index');
Route::get('/user/technicians', UserTechnicians::class)->name('user.technicians');
Route::get('/technicians', AllTechnicians::class)->name('all-technicians');
Route::get('/gallery', Index::class)->name('gallery');
Route::get('/contact', Contact::class)->name('contact');
Route::get('/about', About::class)->name('about');
Route::get('/support', ChatSupport::class)->name('support');

Route::get('/contact-button', function () {
    return view('contact-button');
})->name('contact-button');

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
