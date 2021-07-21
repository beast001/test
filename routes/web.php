<?php

use App\Http\Controllers\AdminDashboard;
use App\Http\Controllers\AdminNewApps;
use App\Http\Controllers\AdminRenewApps;
use App\Http\Controllers\ChatsController;
use App\Http\Controllers\ClearanceCert;
use App\Http\Controllers\NewApplicant;
use App\Http\Controllers\RenewalApplicant;
use Illuminate\Support\Facades\Route;

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

//CHATS
Route::get('/chat', [ChatsController::class, 'chat']);




//user side
Route::view('/', 'home')->middleware('auth','user_auth');


Route::view('/home', 'home')->middleware('auth','user_auth');

//New application routes
Route::get('/new_application',[NewApplicant::class,'new_applicant'] )->middleware('auth','user_auth');
Route::post('/new_application',[NewApplicant::class,'new_applicant_submit'])->middleware('auth','user_auth');

//Renewal applicant
Route::get('/renew_application', [RenewalApplicant::class,'renewal_applicant'])->middleware('auth','user_auth');
Route::post('/renew_application', [RenewalApplicant::class,'renewal_submit'])->middleware('auth','user_auth');



//Admin side
Route::get('dashboard',[AdminDashboard::class,'dashboard'])->middleware('admin_auth');

//list applications in a adata table view
Route::get('dashboard_new_apps',[AdminNewApps::class,'new_applications'])->middleware('admin_auth');
Route::get('/dashboard_renew_apps',[AdminRenewApps::class,'renew_applications'])->middleware('admin_auth');

//view individual applications for approval or rejection
Route::get('/dashboard_new_apps_id_{id}',[AdminNewApps::class,'view_application'])->middleware('admin_auth');
Route::get('dashboard_renew_apps_id_{id}',[AdminRenewApps::class,'view_application'])->middleware('admin_auth');

//Rejection or aproval post forms
Route::post('/dashboard_new_approve',[AdminNewApps::class,'approve'])->middleware('admin_auth');
Route::post('/dashboard_new_reject',[AdminNewApps::class,'reject'])->middleware('admin_auth');
Route::post('/dashboard_renew_approve',[AdminRenewApps::class,'approve'])->middleware('admin_auth');
Route::post('/dashboard_renew_reject',[AdminRenewApps::class,'reject'])->middleware('admin_auth');


//invoice page

Route::get('/clearance_cert',[ClearanceCert::class,'load_cert']);
Route::get('/print_cert',[ClearanceCert::class, 'print']);


