<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\LkController;
use App\Http\Controllers\MailerController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\WebController;
use App\Http\Controllers\UserController;

use Illuminate\Support\Facades\Route;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

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


// http://jobtools.ru/
//{!! QrCode::encoding('UTF-8')->size(500)->generate('Добро пожаловать на jobtools.ru'); !!}






Route::get('/', [WebController::class, 'index'])->name('index');
Route::get('/notfound', [WebController::class, 'pageNotFound'])->name('pageNotFound');
Route::get('/forbidden', [WebController::class, 'pageForbidden'])->name('pageForbidden');
Route::get('/event/{id}', [EventController::class, 'event'])->name('event');


Route::get('/login', [UserController::class, 'login'])->name('login');
Route::get('/register', [UserController::class, 'register'])->name('register');
Route::prefix('user')->group(function () {
    Route::post('create', [UserController::class, 'create'])->name('createUser');
    Route::post('auth', [UserController::class, 'auth'])->name('authUser');
    Route::get('logout', [UserController::class, 'logout'])->name('logoutUser');
});


Route::middleware('checkAuth')->group(function () {
    Route::get('/lk', [LkController::class, 'lk'])->name('lk');
    Route::get('/lk/organizer', [LkController::class, 'lkOrganizer'])->name('lkOrganizer');
    Route::get('/event/{id}/end', [EventController::class, 'eventEnd'])->name('eventEnd');
    Route::delete('event/{id}', [EventController::class, 'delete'])->name('deleteEvent');

    Route::middleware('checkOrganizer')->group(function () {
        Route::get('eventform', [EventController::class, 'createEventForm'])->name('createEventForm');
        Route::post('event', [EventController::class, 'create'])->name('createEvent');

        Route::patch('question/{id}/reply', [QuestionController::class, 'reply'])->name('replyQuestion');
    });

    Route::middleware('checkAdmin')->group(function () {
        Route::get('admin', [AdminController::class, 'admin'])->name('admin');

        Route::get('admin/category', [CategoryController::class, 'category'])->name('category');
        Route::post('admin/category', [CategoryController::class, 'create'])->name('categoryCreate');
        Route::delete('admin/category/{id}', [CategoryController::class, 'delete'])->name('categoryDelete');
        Route::get('admin/category/list', [CategoryController::class, 'categoryList'])->name('categoryList');

        Route::get('admin/event/list', [EventController::class, 'adminEventList'])->name('adminEventList');
        Route::post('admin/event/status', [EventController::class, 'changeStatus'])->name('changeStatus');

        Route::get('admin/user', [UserController::class, 'userAdmin'])->name('userAdmin');
        Route::get('admin/user/list', [UserController::class, 'userList'])->name('userList');
        Route::post('admin', [AdminController::class, 'create'])->name('createAdmin');
        Route::delete('user/{id}', [AdminController::class, 'deleteUser'])->name('deleteUser');
    });

    Route::middleware('checkOperator')->group(function () {
        Route::get('admin/permission/{id}', [PermissionController::class, 'change'])->name('changePermission');
        Route::post('admin/permission', [PermissionController::class, 'changePermission'])->name('changePermissionForm');
    });

    Route::post('ticket', [TicketController::class, 'create'])->name('createTicket');
    Route::delete('ticket/{id}', [TicketController::class, 'delete'])->name('deleteTicket');

    Route::post('question', [QuestionController::class, 'create'])->name('createQuestion');
});


// если роут не найден
Route::get('/{any}', [WebController::class, 'pageNotFound'])->where('any', '.*');
