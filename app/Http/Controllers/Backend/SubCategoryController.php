<?php

namespace App\Http\Controllers\Backend;
use DB;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    public function AllSubCategory()
    {
        $allData = DB::table('subcategories')
        ->join('categories', 'subcategories.category_id','categories.id')
        ->select('subcategories.*', 'categories.category_en')
        ->OrderBy('id', 'desc')->paginate(3);
        return view('backend.subcategory.all_subcategory', compact('allData'));
    }

    public function AddSubCategory()
    {
        $categories = DB::table('categories')->get();
        return view('backend.subcategory.add_subcategory', compact('categories'));
    }

    public function StoreSubCategory(Request $request)
    {
        $validated = $request->validate([
            'subcategory_en' => 'required|unique:subcategories|max:255',
            'subcategory_sr' => 'required|unique:subcategories|max:255',
        ]);

        $data = array();
        $data['subcategory_en'] = $request->subcategory_en;
        $data['subcategory_sr'] = $request->subcategory_sr;
        $data['category_id'] = $request->category_id;
        DB::table('subcategories')->insert($data);

        $notification = array(
            'message' => 'SubCategory Created Successfull',
            'alert-type' => 'success'
        );

        return Redirect()->route('all.subcategory')->with($notification);
    }

    public function EditSubCategory($id)
    {
        $categories = DB::table('categories')->get();
        $data = DB::table('subcategories')->where('id', $id)->first();
        return view('backend.subcategory.edit_subcategory', compact('data', 'categories'));
    }

    public function UpdateSubCategory(Request $request, $id)
    {
        $validated = $request->validate([
            'subcategory_en' => 'required|unique:subcategories|max:255',
            'subcategory_sr' => 'required|unique:subcategories|max:255',
        ]);

        $data = array();
        $data['subcategory_en'] = $request->subcategory_en;
        $data['subcategory_sr'] = $request->subcategory_sr;
        $data['category_id'] = $request->category_id;
        DB::table('subcategories')->where('id', $id)->update($data);

        $notification = array(
            'message' => 'SubCategory Updated Successfull',
            'alert-type' => 'success'
        );

        return Redirect()->route('all.subcategory')->with($notification);
    }

    public function DeleteSubCategory($id)
    {
        DB::table('subcategories')->where('id', $id)->delete();

        $notification = array(
            'message' => 'SubCategory Deleted Successfull',
            'alert-type' => 'error'
        );

        return Redirect()->route('all.subcategory')->with($notification);
    }
}
