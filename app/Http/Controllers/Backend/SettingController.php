<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class SettingController extends Controller
{
    public function SocialSetting()
    {
        $data = DB::table('socials')->first();
        return view('backend.setting.socials', compact('data'));
    }

    public function SocialUpdate(Request $request, $id)
    {
        $data = DB::table('socials')->first();
        $data = array();
        $data['facebook'] = $request->facebook;
        $data['instagram'] = $request->instagram;
        $data['twitter'] = $request->twitter;
        $data['youtube'] = $request->youtube;
        $data['linkedin'] = $request->linkedin;
        $data = DB::table('socials')->where('id', $id)->update($data);

        $notification = array(
            'message' => 'Social Setting Updated',
            'alert-type' => 'success'
        );

        return Redirect()->route('social.setting')->with($notification);
    }

    public function SeoSetting()
    {
        $data = DB::table('seos')->first();
        return view('backend.setting.seos', compact('data'));
    }

    public function SeoUpdate(Request $request, $id)
    {
        $data = DB::table('seos')->first();
        $data = array();
        $data['meta_author'] = $request->meta_author;
        $data['meta_title'] = $request->meta_title;
        $data['meta_keyword'] = $request->meta_keyword;
        $data['meta_description'] = $request->meta_description;
        $data['google_verification'] = $request->google_verification;
        $data['google_analytics'] = $request->google_analytics;
        $data = DB::table('seos')->where('id', $id)->update($data);

        $notification = array(
            'message' => 'Seo Setting Updated',
            'alert-type' => 'success'
        );

        return Redirect()->route('seo.setting')->with($notification);
    }

    public function LiveTVSetting()
    {
        $data = DB::table('livetv')->first();
        return view('backend.setting.livetv', compact('data'));
    }

    public function LiveTVUpdate(Request $request, $id)
    {
        $data = DB::table('livetv')->first();
        $data = array();
        $data['embed_code'] = $request->embed_code;
        $data = DB::table('livetv')->where('id', $id)->update($data);

        $notification = array(
            'message' => 'LiveTV Setting Updated',
            'alert-type' => 'success'
        );

        return Redirect()->route('livetv.setting')->with($notification);
    }

    public function LiveTVactive($id)
    {
        DB::table('livetv')->where('id', $id)->update(['status'=>1]);

        return redirect()->back();
    }

    public function LiveTVdeactive($id)
    {
        DB::table('livetv')->where('id', $id)->update(['status'=>0]);

        return redirect()->back();
    }

    public function NoticeSetting()
    {
        $data = DB::table('notices')->first();
        return view('backend.setting.notice', compact('data'));
    }

    public function NoticeUpdate(Request $request, $id)
    {
        $data = DB::table('livetv')->first();
        $data = array();
        $data['notice'] = $request->notice;
        $data = DB::table('notices')->where('id', $id)->update($data);

        $notification = array(
            'message' => 'Notice Setting Updated',
            'alert-type' => 'success'
        );

        return Redirect()->route('notice.setting')->with($notification);
    }

    public function NoticeActive($id)
    {
        DB::table('notices')->where('id', $id)->update(['status'=>1]);

        return redirect()->back();
    }

    public function NoticeDeactive($id)
    {
        DB::table('notices')->where('id', $id)->update(['status'=>0]);

        return redirect()->back();
    }

    public function AllWebSite()
    {
        $allData = DB::table('websites')->OrderBy('id', 'desc')->paginate(3);
        return view('backend.setting.all_website', compact('allData'));
    }

    public function AddWebSite()
    {
        return view('backend.setting.add_website');
    }

    public function StoreWebSite(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|unique:websites|max:255',
            'url' => 'required|unique:websites|max:255',
        ]);

        $data = array();
        $data['name'] = $request->name;
        $data['url'] = $request->url;
        DB::table('websites')->insert($data);

        $notification = array(
            'message' => 'Website Added Successfull',
            'alert-type' => 'success'
        );

        return Redirect()->route('all.website')->with($notification);
    }

    public function EditWebSite($id)
    {
        $data = DB::table('websites')->where('id', $id)->first();
        return view('backend.setting.edit_website', compact('data'));
    }

    public function UpdateWebSite(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required|unique:websites|max:255',
            'url' => 'required|unique:websites|max:255',
        ]);

        $data = array();
        $data['name'] = $request->name;
        $data['url'] = $request->url;
        DB::table('websites')->where('id', $id)->update($data);

        $notification = array(
            'message' => 'Website Updated Successfull',
            'alert-type' => 'success'
        );

        return Redirect()->route('all.website')->with($notification);
    }

    public function DeleteWebSite($id)
    {
        DB::table('websites')->where('id', $id)->delete();

        $notification = array(
            'message' => 'Website Deleted Successfull',
            'alert-type' => 'error'
        );

        return Redirect()->route('all.website')->with($notification);
    }
}
