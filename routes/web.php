<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\TopicController;

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

Route::get('/', [TopicController::class, 'showHome']);
Route::get('/topics', [TopicController::class, 'showTopics']);
Route::get('/{topic}', [TopicController::class, 'showTopic']);
Route::get('/{topic}/{post_slug}', [TopicController::class, 'showPost']);
