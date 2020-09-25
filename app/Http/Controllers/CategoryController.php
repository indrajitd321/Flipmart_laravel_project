<?php

namespace App\Http\Controllers;
use App\Category;
use Session;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function manageCatagory()
    {
        $data = Category::orderBy('id','DESC')->get();   

        return view('admin.category.manage-category',compact('data'));
    }
    public function addCategory()
    {
        return view('admin.category.add-category');
    }
    public function saveCategory(Request $request)
    {
        $request->validate([
            'category' => 'required' 
        ]);
        $category = new Category();
        $category->category = $request->category;
        $category->category_slug = $this->slug_generator($request->category_slug);
        $category->save();

        Session::flash('success',"Category saved Successfully !");
        return back();
    }
    public function categoryStatus($id,$status)
    {
        $category = Category::find($id);
        $category->status = $status;
        $category->save();
        return response()->json(['message' => 'success']);

    }
    public function delete($id)
    {
        $category = Category::find($id);
        $category->delete();
        
        Session::flash('success',"Category deleted Successfully !");
        return back();

    }
    public function edit($id)
    {
         $row = Category::find($id);
         return view('admin.category.category_edit',compact('row'));
    }
    public function updateCategory(Request $request)
    {
         $brand = Category::find($request->id);
         $brand->category = $request->category;
         $brand->category_slug = $this->slug_generator($request->category);
         $brand->save();
         Session::flash('success',"Category updated Successfully !");
         return back();
    }
    public function slug_generator($string)
    {
         $string = str_replace('','-',$string);
         $string = preg_replace('/[^A-Za-z0-9\-]/','',$string);

         return strtolower(preg_replace('/-+/','-',$string));
    }
}
