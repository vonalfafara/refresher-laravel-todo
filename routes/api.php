<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\TodoController;
use App\Http\Controllers\ImageController;

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

// Auth
Route::post("/login", [AuthController::class, "login"]);
Route::post("/register", [AuthController::class, "register"]);

Route::get("/image/{file_name}", [ImageController::class, "getImage"]);

Route::group(["middleware" => ["auth:sanctum"]], function() {
  // Todos
  Route::get("/todos", [TodoController::class, "index"]);
  Route::get("/todos/{id}", [TodoController::class, "show"]);
  Route::post("/todos", [TodoController::class, "store"]);
  Route::put("/todos/{id}", [TodoController::class, "update"]);
  Route::delete("/todos/{id}", [TodoController::class, "destroy"]);

  // Assets
  Route::post("/image", [ImageController::class, "uploadImage"]);

  // Auth
  Route::post("/logout", [AuthController::class, "logout"]);
});