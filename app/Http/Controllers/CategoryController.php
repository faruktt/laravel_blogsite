<?php

namespace App\Http\Controllers;
use App\Http\Requests\CategoryRequest;
use Illuminate\Http\Request;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
use Carbon\Carbon;
use App\Models\Category;
class CategoryController extends Controller

{
    function category(){
        $categories = Category::all();
        return view('category.category', compact('categories'));
    }

    function category_add(CategoryRequest $request){
     $category_image = $request->category_image;
     $extension = $category_image->extension();
     $file_name = uniqid().'.'. $extension;
     $manager = new ImageManager(new Driver());
     $image = $manager->read($category_image);
     $image->resize(200, 200);
     $image->save(public_path('uploads/category/'. $file_name));

     Category::insert([
        'category_name'=>$request->category_name,
        'category_image'=>$file_name,
        'created_at'=>carbon::now(),
    ]);
    return redirect()->back()->with('category', 'a');
    }

    function category_delete($category_id){
        Category::find($category_id)->delete();
        return redirect()->back()->with('category_delete', 'Category delete successful');
    }

    function category_trash(){
        $trash_category = Category::onlyTrashed()->get();
        return view('category.trash',compact('trash_category'));
    }

    function category_restore($trash_id){
        Category::onlyTrashed()->find($trash_id)->restore();
        return redirect()->back()->with('category_restore', 'Category restore successful');
    }

    function category_hard_delete($trash_id){
       $category = Category::onlyTrashed()->find($trash_id);
      $delete_from = public_path('uploads/category/'.$category->category_image);
      unlink($delete_from);

      Category::onlyTrashed()->find($trash_id)->forceDelete();
      return redirect()->back()->with('category_delete', 'Category delete successful');
    }

    function check_delete(Request $request){
       foreach($request->category_id as $cat_id){
        category::find($cat_id)->delete();
       }
       return redirect()->back()->with('category_delete', 'Category delete successful');
    }
}
