<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Auth;
use Image;

use Illuminate\Auth\Events\Validated;

class PostController extends Controller
{
    public function AddPost()
    {
        $categories = DB::table('categories')->get();
        $districts = DB::table('districts')->get();

        return view('backend.post.add_post', compact('categories', 'districts'));
    }

    public function StorePost(Request $request)
    {
        $validated = $request->validate([
            'category_id' => 'required',
            'district_id' => 'required',
        ]);

        $data = array();
        $data['user_id'] = Auth::id();
        $data['title_en'] = $request->title_en;
        $data['title_sr'] = $request->title_sr;
        $data['category_id'] = $request->category_id;
        $data['subcategory_id'] = $request->subcategory_id;
        $data['district_id'] = $request->district_id;
        $data['subdistrict_id'] = $request->subdistrict_id;
        $data['tags_en'] = $request->tags_en;
        $data['tags_sr'] = $request->tags_sr;
        $data['details_en'] = $request->details_en;
        $data['details_sr'] = $request->details_sr;
        $data['headline'] = $request->headline;
        $data['bigthumbnail'] = $request->bigthumbnail;
        $data['first_section'] = $request->first_section;
        $data['first_section_thumbnail'] = $request->first_section_thumbnail;
        $data['post_date'] = date('d-m-Y');
        $data['post_month'] = date("F");

        $image = $request->image;
        if($image)
        {
        $image_one = uniqid().'.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(500,300)->save('image/postimg/'.$image_one);
        $data['image'] = 'image/postimg/'.$image_one;
        DB::table('posts')->insert($data);

        $notification = array(
            'message' => 'Post Inserted Successfull',
            'alert-type' => 'success'
        );

        return Redirect()->route('add.post')->with($notification);

        } 
        else{
            return Redirect()->back(); 
        }
    }

    public function AllPost()
    {
        $allData = DB::table('posts')
        ->join('categories', 'posts.category_id', 'categories.id')
        ->join('subcategories', 'posts.subcategory_id', 'subcategories.id')
        ->join('districts', 'posts.district_id', 'districts.id')
        ->join('subdistricts', 'posts.subdistrict_id', 'subdistricts.id')
        ->select('posts.*', 'categories.category_en', 'subcategories.subcategory_en',
                'districts.district_en', 'subdistricts.subdistrict_en')
        ->orderBy('id', 'desc')->paginate(5);

        return view('backend.post.all_post', compact('allData'));
    }

    public function EditPost($id)
    {
        $post = DB::table('posts')->where('id', $id)->first();
        $categories = DB::table('categories')->get();
        $districts = DB::table('districts')->get();
        $subcategory = DB::table('subcategories')->where('category_id', $post->category_id)->get();
        $subdistrict = DB::table('subdistricts')->where('district_id', $post->district_id)->get();

        return view('backend.post.edit_post', compact('post', 'categories', 'districts', 'subcategory', 'subdistrict'));
    }

    public function UpdatePost(Request $request, $id)
    {
        $validated = $request->validate([
            'category_id' => 'required',
            'district_id' => 'required',
        ]);

        $data = array();
        $data['user_id'] = Auth::id();
        $data['title_en'] = $request->title_en;
        $data['title_sr'] = $request->title_sr;
        $data['category_id'] = $request->category_id;
        $data['subcategory_id'] = $request->subcategory_id;
        $data['district_id'] = $request->district_id;
        $data['subdistrict_id'] = $request->subdistrict_id;
        $data['tags_en'] = $request->tags_en;
        $data['tags_sr'] = $request->tags_sr;
        $data['details_en'] = $request->details_en;
        $data['details_sr'] = $request->details_sr;
        $data['headline'] = $request->headline;
        $data['bigthumbnail'] = $request->bigthumbnail;
        $data['first_section'] = $request->first_section;
        $data['first_section_thumbnail'] = $request->first_section_thumbnail;

        $oldimage = $request->oldimage;
        $image = $request->image;
        if($image)
        {
        $image_one = uniqid().'.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(500,300)->save('image/postimg/'.$image_one);
        $data['image'] = 'image/postimg/'.$image_one;
        DB::table('posts')->where('id', $id)->update($data);
        @unlink($oldimage);

        $notification = array(
            'message' => 'Post Updated Successfull',
            'alert-type' => 'success'
        );

        return Redirect()->route('all.post')->with($notification);

        } 
        else{
            $data['image'] = $oldimage;
            DB::table('posts')->where('id', $id)->update($data);

            $notification = array(
                'message' => 'Post Updated Successfull',
                'alert-type' => 'success'
        );
            return Redirect()->route('all.post')->with($notification); 
        }
    }

    public function DeletePost($id)
    { 
        $post = DB::table('posts')->where('id', $id)->first();
        unlink($post->image);
        DB::table('posts')->where('id', $id)->delete();

        $notification = array(
            'message' => 'Post Deleted Successfull',
            'alert-type' => 'error'
        );

        return Redirect()->route('all.post')->with($notification);
    }












    public function GetSubCategory($category_id)
    {
       $data = DB::table('subcategories')->where('category_id', $category_id)->get();
       return response()->json($data);
    }

    public function GetSubDistrict($district_id)
    {
       $data = DB::table('subdistricts')->where('district_id', $district_id)->get();
       return response()->json($data);
    }
}
