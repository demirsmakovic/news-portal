<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Facades\Image;

class GalleryController extends Controller
{
    public function PhotoGallery()
    {
        $allData = DB::table('photos')->OrderBy('id', 'desc')->paginate(3);
        return view('backend.gallery.photo_gallery', compact('allData'));
    }

    public function AddPhoto()
    {
        return view('backend.gallery.add_photo');
    }

    public function StorePhoto(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required',
        ]);

        $data = array();
        $data['title'] = $request->title;
        $data['type'] = $request->type;

        $image = $request->photo;
        if($image)
        {
        $image_one = uniqid().'.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(500,300)->save('image/photogallery/'.$image_one);
        $data['photo'] = 'image/photogallery/'.$image_one;
        DB::table('photos')->insert($data);

        $notification = array(
            'message' => 'Photo Inserted Successfull',
            'alert-type' => 'success'
        );

        return Redirect()->route('photo.gallery')->with($notification);

        } 
        else{
            return Redirect()->back(); 
        }
    }

    public function EditPhoto($id)
    {
        $data = DB::table('photos')->where('id', $id)->first();
        return view('backend.gallery.edit_photo', compact('data'));
    }

    public function UpdatePhoto(Request $request, $id)
    {
        $validated = $request->validate([
            'title' => 'required',
        ]);

        $data = array();
        $data['title'] = $request->title;
        $data['type'] = $request->type;

        $oldimage = $request->oldimage;
        $image = $request->photo;
        if($image)
        {
        $image_one = uniqid().'.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(500,300)->save('image/photogallery/'.$image_one);
        $data['photo'] = 'image/photogallery/'.$image_one;
        DB::table('photos')->where('id', $id)->update($data);
        @unlink($oldimage);

        $notification = array(
            'message' => 'Photo Updated Successfull',
            'alert-type' => 'success'
        );

        return Redirect()->route('photo.gallery')->with($notification);

        } 
        else{
            $data['photo'] = $oldimage;
            DB::table('photos')->where('id', $id)->update($data);

            $notification = array(
                'message' => 'Photo Updated Successfull',
                'alert-type' => 'success'
            );
            return Redirect()->route('photo.gallery')->with($notification); 
        }
    }

    public function DeletePhoto($id)
    { 
        $photo = DB::table('photos')->where('id', $id)->first();
        unlink($photo->photo);
        DB::table('photos')->where('id', $id)->delete();

        $notification = array(
            'message' => 'Photo Deleted Successfull',
            'alert-type' => 'error'
        );

        return Redirect()->route('photo.gallery')->with($notification);
    }
}
