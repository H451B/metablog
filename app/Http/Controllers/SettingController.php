<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SettingController extends Controller
{
    public function index()
    {
        $settings = Setting::firstOrNew(['id' => 1]);
        $settings->phone_numbers = $settings->phone_numbers ? json_decode($settings->phone_numbers) : [];
        $settings->email_addresses = $settings->email_addresses ? json_decode($settings->email_addresses) : [];
        return view('admin.setting.index', compact('settings'));
    }

    public function storeOrUpdate(Request $request)
    {
        // Validate the request data
        $request->validate([
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'home_banner' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'short_description' => 'nullable|string|max:255',
            'phone_numbers' => 'nullable|array',
            'phone_numbers.*' => 'nullable|string|max:15',
            'email_addresses' => 'nullable|array',
            'email_addresses.*' => 'nullable|email|max:255',
        ]);

        // Retrieve existing settings or create new ones
        $settings = Setting::firstOrNew(['id' => 1]);

        // Handle logo upload
        if ($request->hasFile('logo')) {
            // Delete old logo if exists
            if ($settings->logo && Storage::exists('public/setting/logo/' . $settings->logo)) {
                Storage::delete('public/setting/logo/' . $settings->logo);
            }
            // Store new logo
            $logoPath = $request->file('logo')->store('public/setting/logo');
            $settings->logo = basename($logoPath);
        }

        // Handle home banner upload
        if ($request->hasFile('home_banner')) {
            // Delete old home banner if exists
            if ($settings->home_banner && Storage::exists('public/setting/banner/' . $settings->home_banner)) {
                Storage::delete('public/setting/banner/' . $settings->home_banner);
            }
            // Store new home banner
            $homeBannerPath = $request->file('home_banner')->store('public/setting/banner');
            $settings->home_banner = basename($homeBannerPath);
        }

        // Save other settings
        $settings->short_description = $request->short_description;
        $settings->phone_numbers = json_encode($request->phone_numbers);
        $settings->email_addresses = json_encode($request->email_addresses);

        // Save settings to the database
        $settings->save();

        return redirect()->back()->with('status', 'Settings updated successfully!');
    }
}
