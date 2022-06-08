<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SubmitController;
use App\Http\Controllers\ApprovalController;
use App\Http\Controllers\ExpertiseController;
use App\Http\Controllers\ManageInventoryController;
use App\Http\Controllers\LogbookController;
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

Route::get('/', function () {
    return view('auth.login');
});

//Login
Route::get('/redirects',[HomeController::class,"index"])->name('index');
Route::get('/user/logout', [HomeController::class, 'Logout'])->name('user.logout');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

//Profile Lecturer
Route::get('lecturer/profile/view', [HomeController::class, 'LectProfileView'])->name('lecturer.profile.view');

Route::get('lecturer/profile/edit', [HomeController::class, 'LectProfileEdit'])->name('lecturer.profile.edit');

Route::post('lecturer/profile/store', [HomeController::class, 'LectProfileStore'])->name('lecturer.profile.store');

//Lecturer Expertise
Route::prefix('expertise')->group(function(){

    //teaching
Route::get('lecturer/teaching/view', [ExpertiseController::class, 'LectTeachingView'])->name('lecturer.teaching.view');

Route::get('lecturer/teaching/add', [ExpertiseController::class, 'LectTeachingAdd'])->name('lecturer.teaching.add');

Route::post('lecturer/teaching/store', [ExpertiseController::class, 'LectTeachingStore'])->name('lecturer.teaching.store');

Route::get('lecturer/teaching/edit/{id}', [ExpertiseController::class, 'LectTeachingEdit'])->name('lecturer.teaching.edit');

Route::get('lecturer/teaching/delete/{id}', [ExpertiseController::class, 'LectTeachingDelete'])->name('lecturer.teaching.delete');

//research
Route::get('lecturer/research/view', [ExpertiseController::class, 'LectResearchView'])->name('lecturer.research.view');

Route::get('lecturer/research/add', [ExpertiseController::class, 'LectResearchAdd'])->name('lecturer.research.add');

Route::post('lecturer/research/store', [ExpertiseController::class, 'LectResearchStore'])->name('lecturer.research.store');

Route::get('lecturer/research/edit/{id}', [ExpertiseController::class, 'LectResearchEdit'])->name('lecturer.research.edit');

Route::get('lecturer/research/delete/{id}', [ExpertiseController::class, 'LectResearchDelete'])->name('lecturer.research.delete');

//intellectal
Route::get('lecturer/intellectual/view', [ExpertiseController::class, 'LectIntView'])->name('lecturer.intellectual.view');

Route::get('lecturer/intellectual/add', [ExpertiseController::class, 'LectIntAdd'])->name('lecturer.intellectual.add');

Route::post('lecturer/intellectual/store', [ExpertiseController::class, 'LectIntStore'])->name('lecturer.intellectual.store');

Route::get('lecturer/intellectual/edit/{id}', [ExpertiseController::class, 'LectIntEdit'])->name('lecturer.intellectual.edit');

Route::get('lecturer/intellectual/delete/{id}', [ExpertiseController::class, 'LectIntDelete'])->name('lecturer.intellectual.delete');

//studemt expertise
Route::get('student/expertise/view', [ExpertiseController::class, 'StdExpView'])->name('student.expertise.view');

Route::get('student/expertise/profile{lect}', [ExpertiseController::class, 'StdProView'])->name('student.expertise.profile');

//Profile Student
Route::get('student/profile/view', [HomeController::class, 'StudProfileView'])->name('student.profile.view');

Route::get('student/profile/edit', [HomeController::class, 'StudProfileEdit'])->name('student.profile.edit');

Route::post('student/profile/store', [HomeController::class, 'StudProfileStore'])->name('student.profile.store');
});


//Profile Technician
Route::get('technician/profile/view', [HomeController::class, 'TechProfileView'])->name('technician.profile.view');

Route::get('technician/profile/edit', [HomeController::class, 'TechProfileEdit'])->name('technician.profile.edit');

Route::post('technician/profile/store', [HomeController::class, 'TechProfileStore'])->name('technician.profile.store');

//SVhunting
Route::get('svhunting/list', [HomeController::class, 'SvhuntingList'])->name('svhunting.list');
Route::get('svhunting/view{lect}', [HomeController::class, 'SvhuntingView'])->name('svhunting.view');
Route::get('svhunting/form{lect}', [HomeController::class, 'SvhuntingForm'])->name('svhunting.form');
Route::get('svhunting/upload{lect}', [HomeController::class, 'SvhuntingUpload'])->name('svhunting.upload');
Route::post('svhunting/upload{lect}', [HomeController::class, 'SvhuntingUploadPost'])->name('svhunting.upload.post');
Route::get('svhunting/Update{lect}', [HomeController::class, 'SvhuntingUpdate'])->name('svhunting.update');
Route::get('svhunting/list{lect}', [HomeController::class, 'SvhuntingDelete'])->name('svhunting.delete');
Route::get('svhunting/edit{lect}', [HomeController::class, 'SvhuntingEdit'])->name('svhunting.edit');
Route::post('svhunting/Edit{lect}', [HomeController::class, 'SvhuntingEditPost'])->name('svhunting.edit.post');
Route::get('svhunting/download{lect}', [HomeController::class, 'SvhuntingDownload'])->name('svhunting.download');

//ManageApprovalandReport
Route::get('/view', [ApprovalController::class,'view'])->name('view');
Route::post('/approve', [ApprovalController::class,'approve'])->name('approve');
Route::post('/reject', [ApprovalController::class,'reject'])->name('reject');

Route::get('/submit-file', [SubmitController::class, 'submitForm']);

Route::post('/submit-file', [SubmitController::class, 'submit'])->name('submit');

//ManageInventoryUsage
Route::get('/std_Inventory_Home', [ManageInventoryController::class, 'std_InventoryHome'])->name('std_Inventory_Home');
Route::get('/std_Make_Request', [ManageInventoryController::class, 'std_MakeRequest'])->name('std_Make_Request');
Route::get('/std_Status_Request', [ManageInventoryController::class, 'std_StatusRequest'])->name('std_Status_Request');
Route::post('make_Request', [ManageInventoryController::class, 'make_Request']);
Route::get('/lect_Request', [ManageInventoryController::class, 'lect_RequestPage'])->name('lect_Request');
Route::post('update_Request', [ManageInventoryController::class, 'update_Request']);
Route::get('/tech_request', [ManageInventoryController::class, 'tech_RequestPage'])->name('tech_Request');
Route::get('view/{id}', [ManageInventoryController::class, 'tech_View']);
Route::post('view', [ManageInventoryController::class, 'update']);

//ManageLogbook
Route::post('/savelogbook', [LogbookController::class, 'savelogbook'])->name('savelogbook');
Route::get('/savelogbook', [LogbookController::class, 'savelogbook']);

//ManageTitle
//list
Route::get('/titlelist', [TitleController::class, 'TitleStudList'])->name('title.list');
Route::get('/titlelists', [TitleController::class, 'TitleLectList'])->name('title.lists');
//view
Route::get('/title', [TitleController::class, 'TitleStud'])->name('title.view');
Route::get('/titles', [TitleController::class, 'TitleLect'])->name('title.views');
//delete
Route::get('/titlelists/delete/{titleID}', [TitleController::class, 'delete']);
//add
Route::post('/add', [TitleController::class, 'titleAdd']);
Route::get('/addForm', [TitleController::class, 'addTitle']);
