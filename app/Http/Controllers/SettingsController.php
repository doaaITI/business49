<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Setting;
class SettingsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:admin');

    }

    public function showSetting()
    {
        return view('admin.settings.show');
    }

    public function updateSettings(Request $request)
    {


        Setting::set('website_title', $request->website_title);
        Setting::save();

        return back()->with('flash_success', 'Saved Successfully');

    }


}
