<?php

namespace App\Http\Controllers\Backend;
use DB;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SubDistrictController extends Controller
{
    public function AllSubDistrict()
    {
        $allData = DB::table('subdistricts')
        ->join('districts', 'subdistricts.district_id','districts.id')
        ->select('subdistricts.*', 'districts.district_en')
        ->OrderBy('id', 'desc')->paginate(3);
        return view('backend.subdistrict.all_subdistrict', compact('allData'));
    }

    public function AddSubDistrict()
    {
        $districts = DB::table('districts')->get();
        return view('backend.subdistrict.add_subdistrict', compact('districts'));
    }

    public function StoreSubDistrict(Request $request)
    {
        $validated = $request->validate([
            'subdistrict_en' => 'required|unique:subdistricts|max:255',
            'subdistrict_sr' => 'required|unique:subdistricts|max:255',
        ]);

        $data = array();
        $data['subdistrict_en'] = $request->subdistrict_en;
        $data['subdistrict_sr'] = $request->subdistrict_sr;
        $data['district_id'] = $request->district_id;
        DB::table('subdistricts')->insert($data);

        $notification = array(
            'message' => 'SubDistrict Created Successfull',
            'alert-type' => 'success'
        );

        return Redirect()->route('all.subdistrict')->with($notification);
    }

    public function EditSubDistrict($id)
    {
        $districts = DB::table('districts')->get();
        $data = DB::table('subdistricts')->where('id', $id)->first();
        return view('backend.subdistrict.edit_subdistrict', compact('data', 'districts'));
    }

    public function UpdateSubDistrict(Request $request, $id)
    {
        $validated = $request->validate([
            'subdistrict_en' => 'required|unique:subdistricts|max:255',
            'subdistrict_sr' => 'required|unique:subdistricts|max:255',
        ]);

        $data = array();
        $data['subdistrict_en'] = $request->subdistrict_en;
        $data['subdistrict_sr'] = $request->subdistrict_sr;
        $data['district_id'] = $request->district_id;
        DB::table('subdistricts')->where('id', $id)->update($data);

        $notification = array(
            'message' => 'SubDistrict Updated Successfull',
            'alert-type' => 'success'
        );

        return Redirect()->route('all.subdistrict')->with($notification);
    }

    public function DeleteSubDistrict($id)
    {
        DB::table('subdistricts')->where('id', $id)->delete();

        $notification = array(
            'message' => 'SubDistrict Deleted Successfull',
            'alert-type' => 'error'
        );

        return Redirect()->route('all.subdistrict')->with($notification);
    }
}
