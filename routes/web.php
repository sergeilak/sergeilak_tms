<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\FeedbackController;



use function PHPUnit\Framework\isNull;

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
    return view('welcome');
});

/* №1*/

Route::get('/welcome', function () {
    return 'Доброе пожаловать в Laravel!!!';
});

/* №2*/

Route::get('/user/{id}', function ($id) {
    return 'Привет, пользователь. Твой ID:' . $id;
});



/* №3*/

Route::get('/user/{id?}', function ($id = null) {

    if (!is_null($id)) {
        return 'Привет, пользователь. Твой ID:' . $id;
    } else {
        return 'Пользователь анонимен';
    }
});



/* №4*/

Route::get('/post/{slug}', function ($slug) {
    return "Твой слаг соответствует паттерну, все окей. А именно ты ввел " . $slug;
})->where('slug', '^[a-z0-9-]+$');


/* №5*/


Route::match(['get', 'post'], '/submit-contact-form', function () {

    $method = request()->method();
    if ($method == 'POST') {
        return "Твой запрос прошел. Тип POST!";
    } else {
        return "Твой запрос прошел. Тип GET!";
    }
});



/* №6*/

Route::get('/greet/{name}', function ($name) {
    return view('greet')->with('name', $name);
});

/* №7*/




/* extra 4 */

Route::post('/contact', [FeedbackController::class, 'submit']);


/* extra 5, culculation options : add, subtract, multiply, divide */


Route::get('/calculate/{operation}/{number1}/{number2}', function ($operation, $number1, $number2) {
    $result = null;
    switch ($operation) {
        case 'add':
            $result = $number1 + $number2;
            break;
        case 'subtract':
            $result = $number1 - $number2;
            break;
        case 'multiply':
            $result = $number1 * $number2;
            break;
        case 'divide':
            if ($number2 != 0) {
                $result = $number1 / $number2;
            } else {
                return response()->json(['error' => 'Division by zero is not allowed.'], 400);
            }
            break;
        default:
            return response()->json(['error' => 'Unsupported operation.'], 400);
    }

    return response()->json(['result' => $result]);
});


/* не домашка, пробовал для себя */

Route::get('/customer/{name}', [CustomerController::class, 'findCustomerByName']);
