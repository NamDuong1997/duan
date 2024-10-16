<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CatetoryController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\View_HistoryController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::controller(HomeController::class)->group(function(){
  route::get("/", "index")->name("trangchu");
  route::get("/plot", "plot")->name("plot");
  route::get("/morris", "morris")->name("morris");
  route::get("/tables", "tables")->name("tables");
  route::get("/forms", "forms")->name("forms");
  route::get("/panels-wells", "panels-wells")->name("panels-wells");
  route::get("/buttons", "buttons")->name("buttons");
  route::get("/notifications", "notifications")->name("notifications");
  route::get("/typography", "typography")->name("typography");
  route::get("/icons", "icons")->name("icons");
  route::get("/grid", "grid")->name("grid");
  route::get("/blank", "blank")->name("blank");
  route::get("/login", "login")->name("login");
});

//========================================Post=========================================================
Route::controller(PostController::class)->group(function(){
    route::post("/admin/posts/search", "search")->name("admin.posts.search");
});


Route::resource('admin/posts', PostController::class)->names([
    'index' => 'admin.posts.index',
    'create' => 'admin.posts.create',
    'store' => 'admin.posts.store',
    'show' => 'admin.posts.show',
    'edit' => 'admin.posts.edit',
    'update' => 'admin.posts.update',
    'destroy' => 'admin.posts.destroy',
]);

// tham số ĐỘNG truyền vào đường dẫn ví dụ route('admin.posts.destroy', $id) sẽ được tự hiểu 
// và trong controller có thể truyền tham số ở action để lấy được tham số ĐỘNG
//======================================Catetory===========================================================
Route::resource('admin/catetories', CatetoryController::class)->names([
  'index' => 'admin.catetories.index',
  'create' => 'admin.catetories.create',
  'store' => 'admin.catetories.store',
  'show' => 'admin.catetories.show',
  'edit' => 'admin.catetories.edit',
  'update' => 'admin.catetories.update',
  'destroy' => 'admin.catetories.destroy',
]);


Route::controller(CatetoryController::class)->group(function(){
  route::post("/admin/catetories/search", "search")->name("admin.catetories.search");
});

//=====================================Comment============================================================
Route::resource('admin/comments', CommentController::class)->names([
  'index' => 'admin.comments.index',
  'create' => 'admin.comments.create',
  'store' => 'admin.comments.store',
  'show' => 'admin.comments.show',
  'edit' => 'admin.comments.edit',
  'update' => 'admin.comments.update',
  'destroy' => 'admin.comments.destroy',
]);


Route::controller(CommentController::class)->group(function(){
  route::post("/admin/comments/search", "search")->name("admin.comments.search");
});

//==========================================User=======================================================
Route::resource('admin/users', UserController::class)->names([
  'index' => 'admin.users.index',
  'create' => 'admin.users.create',
  'store' => 'admin.users.store',
  'show' => 'admin.users.show',
  'edit' => 'admin.users.edit',
  'update' => 'admin.users.update',
  'destroy' => 'admin.users.destroy',
]);


Route::controller(UserController::class)->group(function(){
  route::post("/admin/users/search", "search")->name("admin.users.search");
});

//==========================================Image=======================================================
Route::resource('admin/images', ImageController::class)->names([
  'index' => 'admin.images.index',
  'create' => 'admin.images.create',
  'store' => 'admin.images.store',
  'show' => 'admin.images.show',
  'edit' => 'admin.images.edit',
  'update' => 'admin.images.update',
  'destroy' => 'admin.images.destroy',
]);


Route::controller(ImageController::class)->group(function(){
  route::post("/admin/images/search", "search")->name("admin.images.search");
});

//==========================================View_History=======================================================
Route::resource('admin/view_histories', View_HistoryController::class)->names([
  'index' => 'admin.view_histories.index',
  'create' => 'admin.view_histories.create',
  'store' => 'admin.view_histories.store',
  'show' => 'admin.view_histories.show',
  'edit' => 'admin.view_histories.edit',
  'update' => 'admin.view_histories.update',
  'destroy' => 'admin.view_histories.destroy',
]);


Route::controller(View_HistoryController::class)->group(function(){
  route::post("/admin/view_histories/search", "search")->name("admin.view_histories.search");
});