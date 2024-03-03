<?php

use App\Http\Controllers\TodoController;
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

Route::get("/todos",[TodoController::class,"getTodos"]);

Route::post("/AddTodo",[TodoController::class,'addTodo']);

Route::put("/UpdateTodo/{id}",[TodoController::class,'UpdateTodo']);

Route::delete("/DeleteTodo/{id}",[TodoController::class,'deleteTodo']);

Route::get("/test",[TodoController::class,'ApiTest']);

Route::get("/GetTodoById/{id}",[TodoController::class,'GetTodoById']);
