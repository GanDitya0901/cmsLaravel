<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\GuestController;
use App\Http\Controllers\MasterController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PageSectionController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth.login');
});

/* ==Auth Routes== */
Route::controller(AuthController::class)->group(function() {
    Route::get('/login', 'showLogin')->name('show.login');
    Route::get('/register', 'showRegister')->name('show.register');

    Route::post('/login', 'login')->name('login');
    Route::post('/register','register')->name('register');
});

/* ==Route for User Logout== */
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

/* ==MasterAdmin Routes== */
Route::middleware(['auth', 'master'])->controller(MasterController::class)->group(function() {
    Route::get('/masterDashboard', 'showMasterDashboard')->name('show.masterdashboard');
    Route::get('/regAdmin', 'regAdminForm')->name('show.regAdmin');
    Route::get('/showAdmin', 'showAdmin')->name('show.admin');

    Route::post('/regAdmin', 'regAdmin')->name('regAdmin');
    Route::delete('/showAdmin/{user}','destroy')->name('destroy.admin');
});

/* ==Guest Routes== */
Route::middleware(['auth', 'guestRole'])->controller(GuestController::class)->group(function() {
    Route::get('/landingPage', 'landingPage')->name('show.landingPage');
    Route::get('/about-us', 'showAboutUs')->name('show.about_us');
    Route::get('/contact-us', 'showContactUs')->name('show.contact_us');
    Route::get('/gallery', 'showGallery')->name('show.gallery');
});

/* ==Admin Routes== */
Route::middleware(['auth', 'admin'])->controller(AdminController::class)->group(function() {
    Route::get('/adminDashboard', 'adminDashboard')->name('show.adminDashboard');
});

/* ==Route to Show Single Post for Auth Guest== */
Route::middleware(['auth', 'guestRole'])->controller(PostController::class)->group(function() {
    Route::get('/post/{post}', 'showPost')->name('show.post');
});

/* ==Routes Post for Auth Master & Admin== */
Route::middleware(['auth', 'masterOrAdmin'])->controller(PostController::class)->group(function() {
    Route::get('/post', 'showAllPost')->name('show.allPost');
    Route::get('/postForm', 'postForm')->name('show.postForm');
    Route::get('/post/editPost/{post}', 'editForm')->name('show.editForm');

    Route::post('/postForm', 'createPost')->name('createPost');
    Route::put('/post/editForm/{post}','editPost')->name('editPost');
    Route::delete('/post/{post}','deletePost')->name('deletePost');
});

/* ==Comment Route== */
Route::middleware(['auth', 'guestRole'])->controller(CommentController::class)->group(function() {
    Route::post('/post/{post}','createComment')->name('createComment');
});

/* ==Page Routes for Auth Master and Admin== */
Route::middleware(['auth', 'masterOrAdmin'])->controller(PageController::class)->group(function() {
    Route::get('pages', 'showAllPages')->name('show.allPages');
    Route::get('/pageForm', 'pageForm')->name('show.pageForm');
    Route::get('/page/editForm/{page}', 'editForm')->name('show.pageEditForm');

    Route::post('pageForm', 'createPage')->name('createPage');
    Route::put('/page/editForm/{page}', 'editPage')->name('editPage');
    Route::delete('/page/{page}', 'deletePage')->name('deletePage');
});

/* ==PageSection Routes for Auth Master and Admin== */
Route::middleware(['auth', 'masterOrAdmin'])->controller(PageSectionController::class)->group(function() {
    Route::get('/page/{page}/section', 'showSection')->name('show.section');

    Route::post('/page/{page}/sectionForm', 'createSection')->name('createSection');
    Route::put('/page/{page}/editForm/{pageSection}', 'editSection')->name('editSection');
    Route::delete('/page/{page}/section/{pageSection}', 'deleteSection')->name('deleteSection');
});

/* ==Category Routes for Auth Master and Admin== */
Route::middleware(['auth', 'masterOrAdmin'])->controller(CategoryController::class)->group(function() {
    Route::get('/category', 'showAllCategories')->name('show.allCategories');
    Route::get('/categoryForm', 'createForm')->name('show.categoryForm');
    Route::get('/category/editForm/{category}', 'editForm')->name('show.categoryEditForm');


    Route::post('/categoryForm', 'createCategory')->name('createCategory');
    Route::put('/category/editForm/{category}', 'editCategory')->name('editCategory');
    Route::delete('/category/{category}', 'deleteCategory')->name('deleteCategory');
});