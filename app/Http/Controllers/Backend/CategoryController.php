<?php

namespace App\Http\Controllers\Backend;
use Illuminate\Support\Facades\DB;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function AllCategory()
    {
        $allData = DB::table('categories')->OrderBy('id', 'desc')->paginate(3);
        return view('backend.category.all_category', compact('allData'));
    }

    public function AddCategory()
    {
        return view('backend.category.add_category');
    }

    public function StoreCategory(Request $request)
    {
        $validated = $request->validate([
            'category_en' => 'required|unique:categories|max:255',
            'category_sr' => 'required|unique:categories|max:255',
        ]);

        $data = array();
        $data['category_en'] = $request->category_en;
        $data['category_sr'] = $request->category_sr;
        DB::table('categories')->insert($data);

        $notification = array(
            'message' => 'Category Created Successfull',
            'alert-type' => 'success'
        );

        return Redirect()->route('all.category')->with($notification);
    }

    public function EditCategory($id)
    {
        $data = DB::table('categories')->where('id', $id)->first();
        return view('backend.category.edit_category', compact('data'));
    }

    public function UpdateCategory(Request $request, $id)
    {
        $validated = $request->validate([
            'category_en' => 'required|unique:categories|max:255',
            'category_sr' => 'required|unique:categories|max:255',
        ]);

        $data = array();
        $data['category_en'] = $request->category_en;
        $data['category_sr'] = $request->category_sr;
        DB::table('categories')->where('id', $id)->update($data);

        $notification = array(
            'message' => 'Category Updated Successfull',
            'alert-type' => 'success'
        );

        return Redirect()->route('all.category')->with($notification);
    }

    public function DeleteCategory($id)
    {
        DB::table('categories')->where('id', $id)->delete();

        $notification = array(
            'message' => 'Category Deleted Successfull',
            'alert-type' => 'error'
        );

        return Redirect()->route('all.category')->with($notification);
    }
}
