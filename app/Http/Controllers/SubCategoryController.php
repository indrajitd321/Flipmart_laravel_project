<?php

namespace App\Http\Controllers;
use App\SubCategory;
use App\Category;
use Session;

use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    public function manageSubCatagory()
    {
        $data = SubCategory::with('category')->get();   

        return view('admin.category.manage-sub-category',compact('data'));
    }
    public function addSubCategory()
    {
        $categories = Category::where('status',1)
        ->orderBy('category','ASC')->get();

        return view('admin.category.add-sub-category',compact('categories'));
    }
    public function saveSubCategory(Request $request)
    {
        $request->validate([
            'sub_cat' => 'required' 
        ]);
        $subcategory = new SubCategory();
        $subcategory->cat_id = $request->cat_id;
        $subcategory->sub_cat = $request->sub_cat;

        $subcategory->save();

        Session::flash('success',"Sub-Category saved Successfully !");
        return back();
    }
    public function deleteSubCategory($id)
    {
        $subcategory = SubCategory::find($id);
        $subcategory->delete();
        
        Session::flash('success',"Sub-Category deleted Successfully !");
        return back();

    }
    public function editSubCategory($id)
    {
         $row = SubCategory::find($id);
         return view('admin.category.sub_category_edit',compact('row'));
    }
    public function updateSubCategory(Request $request)
    {
         $brand = SubCategory::find($request->id);
         $brand->sub_cat = $request->sub_cat;
         $brand->save();
         Session::flash('success',"Sub-Category updated Successfully !");
         return back();
    }
    public function subCategoryStatus($id,$status)
    {
        $subcategory = SubCategory::find($id);
        $subcategory->status = $status;
        $subcategory->save();
        return response()->json(['message' => 'success']);

    }
}
