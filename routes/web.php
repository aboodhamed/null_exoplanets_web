<?php

use App\Http\Controllers\ExoController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RegisterUserController;
use App\Http\Controllers\RoleRightsController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\SessionsController;
use App\Http\Controllers\SystemModuleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


/*
|--------------------------------------------------------------------------
| Guest Routes
|--------------------------------------------------------------------------|
| Routes for unauthenticated users (guests) like login and registration
*/
Route::middleware('guest')->group(function () {

    // Welcome page for guests(need a new page)
    Route::get('/', function () {
        return view('auth.welcome');
    });

    // Login routes using SessionController
    Route::get('/login', [SessionController::class, 'create'])->name('login');
    Route::post('/login', [SessionController::class, 'store']);

    // Registration routes using RegisterUserController
    Route::get('/register', [RegisterUserController::class, 'create'])->name('register'); 
    Route::post('/register', [RegisterUserController::class, 'store']);

});


Route::middleware('auth')->group(function () {

    /*
     |-------------------
     | Authenticated User Routes
     |-------------------|
     | Routes for authenticated users, like logout and account management
    */

    //logout route using SessionController
    Route::post('/logout', [SessionController::class, 'destroy'])->name('logout')->middleware('auth');

    // Account management routes using UserController
    Route::prefix('account')->group(function () {
      Route::get('/', [UserController::class, 'index'])->name('myaccount');
      Route::put('/update', [UserController::class, 'updateProfile'])->name('update');
      Route::post('/change-password', [UserController::class, 'changePassword'])->name('change-password');
      Route::delete('/delete', [UserController::class, 'deleteAccount'])->name('delete');
    });
    
    /*
     |-------------------
     | System Module Group
     |-------------------|
     | Routes for managing system modules, entities, and actions
    */
    Route::group(['prefix' => 'system-module', 'as' => 'system.module'], function () {
      Route::get('/', [SystemModuleController::class, 'index'])->name('index');
      Route::post('/add', [SystemModuleController::class, 'addModule'])->name('.add');
      Route::post('/edit/{id}', [SystemModuleController::class, 'editModule'])->name('.edit');
      Route::delete('/delete/{id}', [SystemModuleController::class, 'deleteModule'])->name('.delete');
      Route::post('/action/add', [SystemModuleController::class, 'addAction'])->name('.action.add');
      Route::post('/action/edit/{id}', [SystemModuleController::class, 'editAction'])->name('.action.edit');
      Route::delete('/action/delete/{id}', [SystemModuleController::class, 'deleteAction'])->name('.action.delete');
      Route::post('/entity/add', [SystemModuleController::class, 'addEntity'])->name('.entity.add');
      Route::post('/entity/edit/{id}', [SystemModuleController::class, 'editEntity'])->name('.entity.edit');
      Route::delete('/entity/delete/{id}', [SystemModuleController::class, 'deleteEntity'])->name('.entity.delete');
      Route::post('/entity/actions/{id}', [SystemModuleController::class, 'updateEntityActions'])->name('.entity.actions');
    });

    /*
    |-------------------
    | Role Rights Group
    |-------------------|
    | Routes for managing roles and permissions
    */
    Route::group(['prefix' => 'role-rights', 'as' => 'role.rights'], function () {
      Route::get('/', [RoleRightsController::class, 'index'])->name('');
      Route::post('/add', [RoleRightsController::class, 'addRole'])->name('.add');
      Route::post('/edit/{id}', [RoleRightsController::class, 'editRole'])->name('.edit');
      Route::delete('/delete/{id}', [RoleRightsController::class, 'deleteRole'])->name('.delete');
    });

    /*
    |-------------------
    | Admin Users Management Group
    |-------------------|
    | Routes for admin to manage all users and sessions
    */
    Route::group(['prefix' => 'users', 'as' => 'users.'], function () {
      Route::get('/', [UsersController::class, 'index'])->name('index');
      Route::get('/{id}/edit', [UsersController::class, 'edit'])->name('edit');
      Route::put('/{id}', [UsersController::class, 'update'])->name('update');
      Route::delete('/{id}', [UsersController::class, 'destroy'])->name('destroy');
      Route::put('/{id}/change-password', [UsersController::class, 'changePassword'])->name('change-password');
    });
    
    // Sessions route outside the 'users' prefix since it’s separate
    Route::get('/sessions', [SessionsController::class, 'index'])->name('sessions.index');

        // Home Page الصفحه الرئيسية
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    
    Route::get('/classify', [ExoController::class, 'classify'])->name('classify');
Route::post('/classify', [ExoController::class, 'classifyPost'])->name('classify.post');
Route::get('/performance', [ExoController::class, 'performance'])->name('performance');
        
});

