<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\SubCategoryController;
use App\Http\Controllers\Backend\DistrictController;
use App\Http\Controllers\Backend\PostController;
use App\Http\Controllers\Backend\SubDistrictController;


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
    return view('welcome');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('admin.index');
})->name('dashboard');

//AdminController Route
Route::get('admin/logout', [AdminController::class, 'Logout'])->name('admin.logout');

//Category Controller
Route::get('categories', [CategoryController::class, 'AllCategory'])->name('all.category');
Route::get('category/add', [CategoryController::class, 'AddCategory'])->name('add.category');
Route::post('category/add', [CategoryController::class, 'StoreCategory'])->name('store.category');
Route::get('category/edit/{id}', [CategoryController::class, 'EditCategory'])->name('edit.category');
Route::post('category/update/{id}', [CategoryController::class, 'UpdateCategory'])->name('update.category');
Route::get('category/delete/{id}', [CategoryController::class, 'DeleteCategory'])->name('delete.category');


//SubCategory Controller
Route::get('subcategories', [SubCategoryController::class, 'AllSubCategory'])->name('all.subcategory');
Route::get('subcategory/add', [SubCategoryController::class, 'AddSubCategory'])->name('add.subcategory');
Route::post('subcategory/add', [SubCategoryController::class, 'StoreSubCategory'])->name('store.subcategory');
Route::get('subcategory/edit/{id}', [SubCategoryController::class, 'EditSubCategory'])->name('edit.subcategory');
Route::post('subcategory/update/{id}', [SubCategoryController::class, 'UpdateSubCategory'])->name('update.subcategory');
Route::get('subcategory/delete/{id}', [SubCategoryController::class, 'DeleteSubCategory'])->name('delete.subcategory');

//District Controller
Route::get('district', [DistrictController::class, 'AllDistrict'])->name('all.district');
Route::get('district/add', [DistrictController::class, 'AddDistrict'])->name('add.district');
Route::post('district/add', [DistrictController::class, 'StoreDistrict'])->name('store.district');
Route::get('district/edit/{id}', [DistrictController::class, 'EditDistrict'])->name('edit.district');
Route::post('district/update/{id}', [DistrictController::class, 'UpdateDistrict'])->name('update.district');
Route::get('district/delete/{id}', [DistrictController::class, 'DeleteDistrict'])->name('delete.district');

//SubDistrict Controller
Route::get('subdistrict', [SubDistrictController::class, 'AllSubDistrict'])->name('all.subdistrict');
Route::get('subdistrict/add', [SubDistrictController::class, 'AddSubDistrict'])->name('add.subdistrict');
Route::post('subdistrict/add', [SubDistrictController::class, 'StoreSubDistrict'])->name('store.subdistrict');
Route::get('subdistrict/edit/{id}', [SubDistrictController::class, 'EditSubDistrict'])->name('edit.subdistrict');
Route::post('subdistrict/update/{id}', [SubDistrictController::class, 'UpdateSubDistrict'])->name('update.subdistrict');
Route::get('subdistrict/delete/{id}', [SubDistrictController::class, 'DeleteSubDistrict'])->name('delete.subdistrict');

//Json Data
Route::get('/get/subcategory/{category_id}', [PostController::class, 'GetSubCategory']);
Route::get('/get/subdistrict/{district_id}', [PostController::class, 'GetSubDistrict']);

//Post Controller
Route::get('post/add', [PostController::class, 'AddPost'])->name('add.post');
Route::post('post/add', [PostController::class, 'StorePost'])->name('store.post');
Route::get('posts', [PostController::class, 'AllPost'])->name('all.post');
Route::get('post/edit{id}', [PostController::class, 'EditPost'])->name('edit.post');
Route::post('post/edit{id}', [PostController::class, 'UpdatePost'])->name('update.post');
Route::get('post/delete{id}', [PostController::class, 'DeletePost'])->name('delete.post');
