<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

/* extra 1 */

Route::get('/users', function (Request $request) {
    $users = [
        ['id' => 1, 'name' => 'Sergei Ivanov', 'email' => 's@example.com'],
        ['id' => 2, 'name' => 'Dmitry Sviridov', 'email' => 'd@example.com'],
    ];

    return response()->json($users);
});

/* extra 2 */


Route::get('/time', function () {
    $currentTime = now();
    return response()->json(['current_time' => $currentTime->toDateTimeString()]);
});


/* extra 3 */

Route::get('/old-home', function () {
    return redirect('api/new-home');
});


Route::get('/new-home', function () {
    return  "It's a new page where we were redirected!";
});
