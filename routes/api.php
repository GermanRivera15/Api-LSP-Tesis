<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\DictionaryController;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\SignController;
use App\Http\Controllers\Api\MathematicalOperationController;
use App\Http\Controllers\Api\TypeOperationController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::controller(UserController::class)->group(function (){
    Route::get('/users','ListUsers');
    Route::post('/user-add','AddUser');
    Route::get('/user-show/{Email}','ShowUser');
    Route::get('/user-show-admin/{Email}','ShowUserAdmin');
});

Route::controller(DictionaryController::class)->group(function (){
    Route::get('/dictionaries','ListDictionaries');
    Route::get('/dictionaries-vigentes','ListDictionaryVigentes');
    Route::get('/dictionary-code/{Code}','ListDictionaryForCode');
    Route::post('/dictionary-add','AddDictionary');
    Route::put('/dictionary-update/{Code}','UpdateDictionary');
});

Route::controller(CategoryController::class)->group(function (){
    Route::get('/categories','ListCategories');
    Route::get('/categories-vigentes','ListCategoriesVigentes');
    Route::get('/category-code/{Code}','CategoryForCode');
    Route::get('/categories-dictionary/{Code}','ListCategoriesForCodeDictionary');
    Route::post('/category-add','AddCategory');
    Route::put('/category-update/{Code}','UpdateCategory');
    Route::put('/category-update-vigente/{Code}','UpdateVigenteCategory');
});

Route::controller(SignController::class)->group(function (){
    Route::get('/sign','ListSign');
    Route::get('/sign-category/{TypeCategory}','ListSignForCategory');
    Route::get('/sign-code/{Code}','ListSignForCode');
    
    Route::post('/sign-add','AddSign');
    Route::put('/sign-update/{Code}','UpdateSign');
    Route::put('/sign-update-vigente/{Code}','UpdateVigenteSign');
    
    Route::get('/sign-manage-category/{Category}','ListSignForManageCategory');
    
});

Route::controller(MathematicalOperationController::class)->group(function (){
    Route::get('/mathematicaloperations-type/{Type}','ListMathematicalOperationsForType');
    Route::get('/mathematicaloperations-manage-type/{Type}','ListManageMathematicalOperationsForType');
    Route::get('/mathematicaloperation-code/{Code}','ShowMathematicalOperationForCode');
    Route::post('/mathematicaloperations-add','AddMathematicalOperation');
    Route::put('/mathematicaloperations-update/{Code}','UpdateMathematicalOperation');
    Route::put('/mathematicaloperations-update-vigente/{Code}','UpdateVigenteMathematicalOperation');
});

Route::controller(TypeOperationController::class)->group(function (){
    Route::get('/typeoperations','ListTypeOperations');
    Route::get('/typeoperations-vigentes','ListTypeOperationVigentes');
    Route::get('/typeoperation-code/{Code}','TypeOperationForCode');
    Route::post('/typeoperation-add','AddTypeOperation');
    Route::put('/typeoperation-update/{Code}','UpdateTypeOperation');
    Route::put('/typeoperation-update-vigente/{Code}','UpdateVigenteTypeOperation');

});