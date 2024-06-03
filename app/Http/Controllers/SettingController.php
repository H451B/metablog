<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function index(){
        $setting = Setting::all();
        return view('admin.setting.index',compact('setting'));
    }

    public function update(Request $request){
        dd($request);
    }
}
