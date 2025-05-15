<?php

use Illuminate\Support\Facades\Route;
use App\Models\Repair;
use App\Models\User;
use App\Models\Position;
use Illuminate\Support\Facades\Auth;

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

Route::get('/welcome', function () {
    return view('welcome');
});
Route::group(['middleware' => 'prevent-back-history'], function () {

    Route::get('/', function () {
        return view('auth.login');
    });
    Route::get('/layout', function () {
        return view('layouts.layout_nav');
    });


    Route::get('/floor', function () {
        return view('home');
    });
    // **************************************************************************************************************************************************
    //                                            หากไม่สามารถติดตั้งโค้ดได้ เพราะไม่มีฐานข้อมูล โปรด comment โค้ดข้างล่างนี้ ก่อน migrate 
    // **************************************************************************************************************************************************
/*
    Auth::routes();
    Route::view('/dashboard/massage', 'massage');
    Route::post('/search/Equip_room', [\App\Http\Controllers\HomeController::class, 'search_Equip_room'])->name('search_Equip_room');
    Route::get('/dashboard/Allrepair', [App\Http\Controllers\HomeController::class, 'Allrepair'])->name('Allrepair');
    Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');
    Route::get('/logout', [App\Http\Controllers\HomeController::class, 'destroy'])->name('logout');
    Route::post('save', [App\Http\Controllers\HomeController::class, 'store'])->name('submit_data');
    Route::get('/delete_Repair/{id}', [\App\Http\Controllers\HomeController::class, 'deleteR']);
    // Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');


    Route::prefix('EN-floors')->group(function () {
        Route::get('/back', [App\Http\Controllers\HomeController::class, 'back'])->name('back');

        Route::get('/floor-1', [App\Http\Controllers\HomeController::class, 'floor1'])->name('floor-1');
        Route::group(['prefix' => '/floor-1'], function () {
            $Position = Position::where('floor', 1)->get();
            foreach ($Position as $roomNumber) {
                $roomNumber = $roomNumber->room;
                Route::get('room-EN1-{roomNumber}/{id}', [App\Http\Controllers\HomeController::class, 'room_EN']);
            }
        });

        Route::get('/floor-2', [App\Http\Controllers\HomeController::class, 'floor2'])->name('floor-2');
        Route::group(['prefix' => '/floor-2'], function () {
            $Position = Position::where('floor', 2)->get();
            foreach ($Position as $roomNumber) {
                $roomNumber = $roomNumber->room;
                Route::get('room-EN1-{roomNumber}/{id}', [App\Http\Controllers\HomeController::class, 'room_EN']);
            }
        });
        Route::get('/floor-3', [App\Http\Controllers\HomeController::class, 'floor3'])->name('floor-3');
        Route::group(['prefix' => '/floor-3'], function () {
            $Position = Position::where('floor', 3)->get();
            foreach ($Position as $roomNumber) {
                $roomNumber = $roomNumber->room;
                Route::get('room-EN1-{roomNumber}/{id}', [App\Http\Controllers\HomeController::class, 'room_EN']);
            }
        });
        Route::get('/floor-4', [App\Http\Controllers\HomeController::class, 'floor4'])->name('floor-4');
        Route::group(['prefix' => '/floor-4'], function () {
            $Position = Position::where('floor', 4)->get();
            foreach ($Position as $roomNumber) {
                $roomNumber = $roomNumber->room;
                Route::get('room-EN1-{roomNumber}/{id}', [App\Http\Controllers\HomeController::class, 'room_EN']);
            }
        });
        Route::get('/floor-5', [App\Http\Controllers\HomeController::class, 'floor5'])->name('floor-5');
        Route::group(['prefix' => '/floor-5'], function () {
            $Position = Position::where('floor', 5)->get();
            foreach ($Position as $roomNumber) {
                $roomNumber = $roomNumber->room;
                Route::get('room-EN1-{roomNumber}/{id}', [App\Http\Controllers\HomeController::class, 'room_EN']);
            }
        });
    }); // End

    Route::middleware('Issuperadmin')->group(function () {
        Route::prefix('Officer')->group(function () {

            Route::get('/setting/search', [\App\Http\Controllers\SuperadminController::class, 'search_user'])->name('search_user');
            Route::post('/setting/submit_setting_user', [\App\Http\Controllers\SuperadminController::class, 'submit_setting_user'])->name('submit_setting_user');
            Route::post('/Assign', [\App\Http\Controllers\SuperadminController::class, 'Assign'])->name('Assign');
            Route::post('/Reported', [\App\Http\Controllers\SuperadminController::class, 'Reported'])->name('Reported');
            Route::post('Priority/add_Pri', [\App\Http\Controllers\SuperadminController::class, 'add_Pri'])->name('add_Pri');
            Route::post('Priority/edit', [\App\Http\Controllers\SuperadminController::class, 'edit_Pri'])->name('edit_Pri');
            Route::post('Position/add_Pos', [\App\Http\Controllers\SuperadminController::class, 'add_Pos'])->name('add_Pos');
            Route::post('Position/edit', [\App\Http\Controllers\SuperadminController::class, 'edit_Pos'])->name('edit_Pos');
            $User = User::all();
            Route::view('/setting/priority', 'Superadmin.setting_Priority')->name('Setting_priority');
            Route::view('/setting/position', 'Superadmin.setting_Position')->name('Setting_position');
            Route::view('/setting/user', 'Superadmin.setting_User', compact('User'))->name('Setting_user');

            Route::group(['prefix' => '/floor-1'], function () {
                $Position = Position::where('floor', 1)->get();
                foreach ($Position as $roomNumber) {
                    $roomNumber = $roomNumber->room;
                    Route::get('room-EN1-{roomNumber}/{id}', [App\Http\Controllers\SuperadminController::class, 'assignroom_EN_allrooms']);
                }
            });
            Route::group(['prefix' => '/floor-2'], function () {
                $Position = Position::where('floor', 2)->get();
                foreach ($Position as $roomNumber) {
                    $roomNumber = $roomNumber->room;
                    Route::get('room-EN1-{roomNumber}/{id}', [App\Http\Controllers\SuperadminController::class, 'assignroom_EN_allrooms']);
                }
            });
            Route::group(['prefix' => '/floor-3'], function () {
                $Position = Position::where('floor', 3)->get();
                foreach ($Position as $roomNumber) {
                    $roomNumber = $roomNumber->room;
                    Route::get('room-EN1-{roomNumber}/{id}', [App\Http\Controllers\SuperadminController::class, 'assignroom_EN_allrooms']);
                }
            });
            Route::group(['prefix' => '/floor-4'], function () {
                $Position = Position::where('floor', 4)->get();
                foreach ($Position as $roomNumber) {
                    $roomNumber = $roomNumber->room;
                    Route::get('room-EN1-{roomNumber}/{id}', [App\Http\Controllers\SuperadminController::class, 'assignroom_EN_allrooms']);
                }
            });
            Route::group(['prefix' => '/floor-5'], function () {
                $Position = Position::where('floor', 5)->get();
                foreach ($Position as $roomNumber) {
                    $roomNumber = $roomNumber->room;
                    Route::get('room-EN1-{roomNumber}/{id}', [App\Http\Controllers\SuperadminController::class, 'assignroom_EN_allrooms']);
                }
            });
        }); // End superadmin
    });

    Route::middleware('Isteacher')->group(function () {
        Route::prefix('teacher')->group(function () {
            Route::post('save', [\App\Http\Controllers\TeacherController::class, 'submit_addElect'])->name('submit_addelectrolnic');
            Route::post('saveproblem', [\App\Http\Controllers\TeacherController::class, 'submit_addproblem'])->name('submit_addproblem');
            Route::get('saveadminroom/{id}', [\App\Http\Controllers\TeacherController::class, 'adminroom']);
            Route::get('changestatus_R/{id}', [\App\Http\Controllers\TeacherController::class, 'changestatus_R']);
            Route::post('Equipment/edit', [\App\Http\Controllers\TeacherController::class, 'edit_E'])->name('edit_E');
            Route::post('save_addequipment_room', [\App\Http\Controllers\TeacherController::class, 'submit_addequipment_room'])->name('submit_addequipment_room');
            Route::get('/dashboard-T', [\App\Http\Controllers\TeacherController::class, 'dashboard_T'])->name('dashboard-T');
            Route::get('/setting/electronic', [\App\Http\Controllers\TeacherController::class, 'tableElectronic'])->name('tableElectronic-T');
        }); // End teacher
        Route::delete('/delete-tbElect/{id}', [\App\Http\Controllers\TeacherController::class, 'destroy']);
        Route::delete('/delete_equipment_room/{id}', [\App\Http\Controllers\TeacherController::class, 'delete_equipment_room']);
        Route::delete('/delete_problem/{id}', [\App\Http\Controllers\TeacherController::class, 'delete_problem']);
        Route::delete('/Pri_Delete/{id}', [\App\Http\Controllers\SuperadminController::class, 'destroy_Pri']);
        Route::delete('/setting_Delete/{id}', [\App\Http\Controllers\SuperadminController::class, 'destroy_Pos']);
        Route::get('/delete_post/{id}', [\App\Http\Controllers\TeacherController::class, 'deleteE']);
        Route::get('/EN-floors/floor-3/delete_equipment_room/{id}', [\App\Http\Controllers\TeacherController::class, 'deleteE_room'])->name('deleteE_room');

        // Route::get('/delete_post/{id}',[\App\Http\Controllers\TeacherController::class, 'deleteP']);
    });*/
});// Prevent Back Middleare