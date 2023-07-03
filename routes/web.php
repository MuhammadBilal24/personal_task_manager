<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;


// Default 
// Route::get('/', function () { return view('login');
// });  

// Login
Route::get('/',[AuthController::class,'login'])->middleware('alreadyLoggedIn');
Route::get('/login',[AuthController::class,'login'])->middleware('alreadyLoggedIn');
Route::get('/registration',[AuthController::class,'registration'])->middleware('alreadyLoggedIn');
Route::post('/register/newuser/',[AuthController::class,'newuser']);
Route::post('/login/user/',[AuthController::class,'loginuser']);
Route::get('/dashboard',[AuthController::class,'dashboard'])->middleware('isLoggedIn');
Route::get('/logout',[AuthController::class,'logoutuser'])->middleware('isLoggedIn');



// Login
// Route::get('login',[DashboardController::class,'loginpage']);

// Dashboard
// Route::get('dashboard',[DashboardController::class,'index']);

// Works
Route::get('works',[DashboardController::class,'getworks' ])->middleware('isLoggedIn');
Route::post('/add/data',[DashboardController::class,'insertwork']);
Route::post('/edit/data',[DashboardController::class,'updatework']);

// Remain Works (Tasks)
Route::get('/works/{workID}',[DashboardController::class,'remainworks'])->middleware('isLoggedIn');
Route::post('/addtask/data',[DashboardController::class,'insertremainworks']);
Route::post('/edittask/data',[DashboardController::class,'updateremainworks']);

// Porjects
Route::get('/projects',[DashboardController::class,'projectpage'])->middleware('isLoggedIn');
Route::post('/add/projectdata',[DashboardController::class,'insertproject']);
Route::post('/edit/projectdata',[DashboardController::class,'updateproject']);

// Project Details (Tasks)
Route::get('/projects/{projectID}',[DashboardController::class,'projectdetails'])->middleware('isLoggedIn');
Route::post('/add/projectdetailsdata',[DashboardController::class,'insertprojectdetails']);
Route::post('/edit/projectdetailsdata',[DashboardController::class,'updateprojectdetails']);

// Social Accounts
Route::get('/accounts',[DashboardController::class,'socialaccounts'])->middleware('isLoggedIn');
Route::post('/add/accountsdata',[DashboardController::class,'insertaccount']);
Route::post('/edit/accountsdata',[DashboardController::class,'updatesocialaccounts']);

// Notepad
Route::get('/notepad',[DashboardController::class,'notepad'])->middleware('isLoggedIn');
Route::post('/add/notepaddata',[DashboardController::class,'insertnotepad']);
Route::post('/edit/notepaddata',[DashboardController::class,'updatenotepad']);

// Users
Route::get('/users',[DashboardController::class,'users']);

// profile
Route::get('/profile',[DashboardController::class,'getprofile']);

// --------------------------------- Api
// Works
Route::get('/api/getdata/{id_work}',[DashboardController::class,'getworkdata']); 
Route::get('/api/Deletedata/{id_work}',[DashboardController::class,'deleteworkdata']);

//RemainWorks
Route::get('/api/taskgetdata/{id_remain}',[DashboardController::class,'getremainworkdata']);
Route::get('/api/taskDeletedata/{id_remain}',[DashboardController::class,'deleteremainwork']);

// Projects 
Route::get('/api/projectgetdata/{id_proj}',[DashboardController::class,'getprojectdata']);
Route::get('/api/PorjectDeletedata/{id_proj}',[DashboardController::class,'deleteproject']);

// Project Details
Route::get('/api/projectdetailsgetdata/{id_detproj}',[DashboardController::class,'getprojectdetails']);

// Social Accounts
Route::get('/api/accountgetdata/{id_sac}',[DashboardController::class,'getsocialaccountdata']);

// Notepad
Route::get('/api/notepadgetdata/{id_note}',[DashboardController::class,'getnotepad']);
Route::get('/api/notepadDeletedata/{id_note}',[DashboardController::class,'deletenotepad']);

