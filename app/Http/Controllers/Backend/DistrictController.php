<?php

namespace App\Http\Controllers\Backend;
use DB;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DistrictController extends Controller
{
    public function AllDistrict()
    {
        $allData = DB::table('district')->OrderBy('id', 'desc')->paginate(3);
        return view('backend.district.all_district', compact('allData'));
    }

    public function AddDistrict()
    {
        return view('backend.district.add_district');
    }

    public function StoreDistrict(Request $request)
    {
        $validated = $request->validate([
            'district_en' => 'required|unique:district|max:255',
            'district_sr' => 'required|unique:district|max:255',
        ]);

        $data = array();
        $data['district_en'] = $request->district_en;
        $data['district_sr'] = $request->district_sr;
        DB::table('district')->insert($data);

        $notification = array(
            'message' => 'District Added Successfull',
            'alert-type' => 'success'
        );

        return Redirect()->route('all.district')->with($notification);
    }

    public function EditDistrict($id)
    {
        $data = DB::table('district')->where('id', $id)->first();
        return view('backend.district.edit_district', compact('data'));
    }

    public function UpdateDistrict(Request $request, $id)
    {
        $validated = $request->validate([
            'district_en' => 'required|unique:district|max:255',
            'district_sr' => 'required|unique:district|max:255',
        ]);

        $data = array();
        $data['district_en'] = $request->district_en;
        $data['district_sr'] = $request->district_sr;
        DB::table('district')->where('id', $id)->update($data);

        $notification = array(
            'message' => 'District Updated Successfull',
            'alert-type' => 'success'
        );

        return Redirect()->route('all.district')->with($notification);
    }

    public function DeleteDistrict($id)
    {
        DB::table('district')->where('id', $id)->delete();

        $notification = array(
            'message' => 'District Deleted Successfull',
            'alert-type' => 'error'
        );

        return Redirect()->route('all.district')->with($notification);
    }
}
