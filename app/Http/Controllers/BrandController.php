<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Brand;
use Session;

class BrandController extends Controller
{
    public function addBrand()
    {
         return view('admin.brand_add');
    }
    public function saveBrand(Request $request)
    {
         $request->validate([
             'brand_name' => 'required|unique:brands,brand_name' 
         ]);
         $brand = new Brand();
         $brand->brand_name = $request->brand_name;
         $brand->brand_slug = $this->slug_generator($request->brand_name);
         $brand->save();

         Session::flash('success',"Brand saved Successfully !");
         return back();
        // return back()->with('message',"Brand saved Successfully !");
    }
    public function manageBrand()
    {
     $brand = Brand::orderBy('id','DESC')->get();   
     return view('admin.brand_list',compact('brand'));
    }

     public function brandStatus($id,$status)
     {
         $brand = Brand::find($id);
         $brand->status = $status;
         $brand->save();
         return response()->json(['message' => 'success']);

     }
     public function edit($id)
     {
          $row = Brand::find($id);
          return view('admin.brand_edit',compact('row'));
     }
     public function updateBrand(Request $request)
     {
          $brand = Brand::find($request->id);
          $brand->brand_name = $request->brand_name;
          $brand->brand_slug = $this->slug_generator($request->brand_name);
          $brand->save();
          Session::flash('success',"Brand updated Successfully !");
          return back();
     }
     public function delete($id)
     {
         $brand = Brand::find($id);
         $brand->delete();
         
         Session::flash('success',"Brand deleted Successfully !");
         return back();

     }

    public function slug_generator($string)
    {
         $string = str_replace('','-',$string);
         $string = preg_replace('/[^A-Za-z0-9\-]/','',$string);

         return strtolower(preg_replace('/-+/','-',$string));
    }
}
