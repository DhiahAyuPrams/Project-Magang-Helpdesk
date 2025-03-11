<?php

use App\Events\MessageCreate;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\FaqController;
use App\Models\Faq;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('/', function () {
    if (Auth::check()) {
        // Redirect sesuai role
        if (Auth::user()->role == 'Super Admin') {
            return redirect('/dashboard-admin');
        } elseif (Auth::user()->role == 'Pegawai') {
            return redirect('/dashboard-user');
        } elseif (Auth::user()->role == 'Tim IT') {
            return redirect('/dashboard-agent');
        } elseif (Auth::user()->role == 'Pimpinan') {
            return redirect('/dashboard-supervisor');
        }
    }
    return view('login'); // Jika belum login, tetap ke halaman login
});

// //SAAT BELUM LOGIN
// Route::middleware(['guest'])->group(function(){
//     //Fungsi Login & Register
//     Route::post('/', [SessionController::class,'login'])->name('login');
//     Route::get('/', [SessionController::class,'index']);
// });

// SAAT BELUM LOGIN
Route::middleware(['guest'])->group(function () {
    Route::post('/login', [SessionController::class, 'login'])->name('login');
    Route::get('/login', [SessionController::class, 'index'])->name('login.form');
});

Route::middleware(['auth'])->group(function(){
    //Logout
    Route::get('/logout', [SessionController::class,'logout']);
    //MENAMPILAKN HALAMAN DENGAN CONTROLLER
    Route::get('/dashboard-admin', [AdminController::class,'admin'])->middleware('userAkses:Super Admin');
    Route::get('/dashboard-user', [AdminController::class,'user'])->middleware('userAkses:Pegawai');
    Route::get('/dashboard-agent', [AdminController::class,'agent'])->middleware('userAkses:Tim IT');
    Route::get('/dashboard-supervisor', [AdminController::class,'supervisor'])->middleware('userAkses:Pimpinan');

})->name('authentification');

Route::get('/home',function(){
    return redirect('/');
});

Route::get('/createticket-user', function() {
    // Ambil semua data FAQ dari database
    $faqs = Faq::all(); 
    
    // Kirim data FAQ ke view
    return view('usercreateticket', compact('faqs'));
});





//MENAMPILKAN HALAMAN DENGAN VIEW

Route::get('/register', function () {
    return view('register');
})->name('register');

// Route::get('/ticket-list', function () {
//     return view('ticketlist');
// })->name('ticketlist');

Route::get('/create-ticket', function () {
    return view('createticket');
})->name('createticket');

// Route::get('/user-list', function () {
//     return view('userlist');
// })->name('userlist');

Route::get('/create-user', function () {
    return view('createuser');
})->name('createuser');

//MENAMPILKAN HALAMAN
Route::get('/ticket-list',[TicketController::class,'index'])->name('ticketlist');
Route::get('ticket-detail/{id}', [TicketController::class, 'detail'])->name('ticket.detail');
Route::middleware(['auth'])->get('ticket-detail-timit/{id}', [TicketController::class, 'detailtimit'])->name('ticket.detail');
Route::get('/user-list',[UserController::class,'index'])->name('userlist');


//LOGIN REGISTER
// Route::post('/register', [RegisterController::class, 'store']);

Route::get('css/login.css', function () {
    return response(file_get_contents(base_path('resources/css/login.css')), 200)
        ->header('Content-Type', 'text/css');
});

Route::get('css/register.css', function () {
    return response(file_get_contents(base_path('resources/css/register.css')), 200)
        ->header('Content-Type', 'text/css');
});

Route::post('/register', [RegisterController::class, 'register'])->name('register.submit');

//=======CRUD========
//Create
Route::post('/tambah-ticket-admin',[TicketController::class,'tambahticket'])->name('tambahticket');
Route::post('/store-ticket',[TicketController::class,'store'])->name('store_ticket');

//Account User
Route::post('/users', [UserController::class, 'store'])->name('store');
Route::put('/user/{id}', [UserController::class, 'update'])->name('user.update');
Route::delete('/user/{id}', [UserController::class, 'destroy'])->name('user.destroy');


//Read

//Update

//Delete


//test
Route::get('/test-chat', function(){
    return view ('welcome');
});

Route::get('/test-chat-client', function(){
    MessageCreate::dispatch('Masukkan Pesan Disini');
});

Route::put('/ticket/{id}', [TicketController::class, 'update'])->name('ticket.update');
Route::post('/ticket/{id}/note', [TicketController::class, 'storeNote'])->name('ticket.notes.store');
Route::post('/ticket/{id}/feedback', [TicketController::class, 'saveFeedback'])->name('ticket.feedback');


// Test FAQ
Route::resource('faq', FaqController::class);
Route::get('/FAQ',[FaqController::class,'index'])->name('Faq');
Route::get('/faq/create', [FaqController::class, 'create'])->name('faq.create'); // Create FAQ page
Route::post('/faq', [FaqController::class, 'store'])->name('faq.store'); // Store new FAQ
Route::put('/faq/{id}', [FaqController::class, 'update'])->name('faq.update');
Route::delete('/faq/{id}', [FaqController::class, 'destroy'])->name('faq.destroy');
