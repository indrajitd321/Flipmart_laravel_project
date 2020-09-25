<?php

Route::get('/','SiteController@index')->name('index');
Route::get('/product','SiteController@product')->name('product');

Auth::routes();
Route::middleware(['auth'])->group(function(){


//brand section 
Route::get('/dashboard', 'HomeController@index')->name('home');
Route::get('/brand/add-brand', 'BrandController@addBrand')->name('add-brand');
Route::post('/brand/save-brand', 'BrandController@saveBrand')->name('save-brand');
Route::get('/brand/manage-brand', 'BrandController@manageBrand')->name('manage-brand');
Route::get('/brand/delete/{id}', 'BrandController@delete')->name('delete-brand');
Route::get('/brand/edit/{id}', 'BrandController@edit')->name('edit-brand');
Route::post('/brand/update-brand', 'BrandController@updateBrand')->name('update-brand');
Route::get('/brand/brandStatus/{id}/{s}', 'BrandController@brandStatus')->name('brandStatus');
//category section 
Route::get('/category/manage-category', 'CategoryController@manageCatagory')->name('manage-category');
Route::get('/category/add-category', 'CategoryController@addCategory')->name('add-category');
Route::post('/category/save-category', 'CategoryController@saveCategory')->name('save-category');
Route::get('/category/categoryStatus/{id}/{s}', 'CategoryController@categoryStatus')->name('categoryStatus');
Route::get('/category/delete/{id}', 'CategoryController@delete')->name('delete-category');
Route::get('/category/edit/{id}', 'CategoryController@edit')->name('edit-category');
Route::post('/category/update-category', 'CategoryController@updateCategory')->name('update-category');
//sub category
Route::get('/category/manage-sub-category', 'SubCategoryController@manageSubCatagory')->name('manage-sub-category');
Route::get('/category/add-sub-category', 'SubCategoryController@addSubCategory')->name('add-sub-category');
Route::post('/category/save-sub-category', 'SubCategoryController@saveSubCategory')->name('save-sub-category');
Route::get('/category/delete-sub-category/{id}', 'SubCategoryController@deleteSubCategory')->name('delete-sub-category');
Route::get('/category/edit-sub-category/{id}', 'SubCategoryController@editSubCategory')->name('edit-sub-category');
Route::post('/category/update-sub-category', 'SubCategoryController@updateSubCategory')->name('update-sub-category');
Route::get('/category/Sub-categoryStatus/{id}/{s}', 'SubCategoryController@subCategoryStatus')->name('subCategoryStatus');


Route::get('/category/manage-sub-sub-category', 'SubsubCategoryController@manageSubsubCatagory')->name('manage-subsubcategory');
});