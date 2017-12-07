<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Setting;
use Session;

class SettingsController extends Controller
{
	public function __construct()
	{
		$this->middleware('admin');
	}
	public function index()
	{
		$setting = Setting::first();
		return view('admin.settings.setting',compact('setting'));
	}
    public function update(Request $request)
    {
		$this->validate($request,[
			'site_name'=>'required|min:2|max:199',
			'contact_number'=>'required|numeric',
			'contact_email'=>'required|email',
			'address'=>'required|min:2|max:199',
		]);

		$setting = Setting::first();

		if ($setting->update($request->all())) {
			Session::flash('success','Site setting update successfull.');
		}

		return redirect()->back();

    }
}
