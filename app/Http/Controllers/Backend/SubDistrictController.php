<?php

namespace App\Http\Controllers\Backend;
use DB;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SubDistrictController extends Controller
{
    public function AllSubDistrict()
    {
        $allData = DB::table('subdistrict')
        ->join('district', 'subdistrict.district_id','district.id')
        ->select('subdistrict.*', 'district.district_en')
        ->OrderBy('id', 'desc')->paginate(3);
        return view('backend.subdistrict.all_subdistrict', compact('allData'));
    }

    public function AddSubDistrict()
    {
        $district = DB::table('district')->get();
        return view('backend.subdistrict.add_subdistrict', compact('district'));
    }

    public function StoreSubDistrict(Request $request)
    {
        $validated = $request->validate([
            'subdistrict_en' => 'required|unique:subdistrict|max:255',
            'subdistrict_sr' => 'required|unique:subdistrict|max:255',
        ]);

        $data = array();
        $data['subdistrict_en'] = $request->subdistrict_en;
        $data['subdistrict_sr'] = $request->subdistrict_sr;
        $data['district_id'] = $request->district_id;
        DB::table('subdistrict')->insert($data);

        $notification = array(
            'message' => 'SubDistrict Created Successfull',
            'alert-type' => 'success'
        );

        return Redirect()->route('all.subcategory')->with($notification);
    }

    public function EditSubDistrict($id)
    {
        $district = DB::table('district')->get();
        $data = DB::table('subdistrict')->where('id', $id)->first();
        return view('backend.subdistrict.edit_subdistrict', compact('data', 'district'));
    }

    public function UpdateSubDistrict(Request $request, $id)
    {
        $validated = $request->validate([
            'subdistrict_en' => 'required|unique:subdistrict|max:255',
            'subdistrict_sr' => 'required|unique:subdistrict|max:255',
        ]);

        $data = array();
        $data['subdistrict_en'] = $request->subdistrict_en;
        $data['subdistrict_sr'] = $request->subdistrict_sr;
        $data['district_id'] = $request->district_id;
        DB::table('subdistrict')->where('id', $id)->update($data);

        $notification = array(
            'message' => 'SubDistrict Updated Successfull',
            'alert-type' => 'success'
        );

        return Redirect()->route('all.subdistrict')->with($notification);
    }

    public function DeleteSubDistrict($id)
    {
        DB::table('subdistrict')->where('id', $id)->delete();

        $notification = array(
            'message' => 'SubDistrict Deleted Successfull',
            'alert-type' => 'error'
        );

        return Redirect()->route('all.subdistrict')->with($notification);
    }
}
