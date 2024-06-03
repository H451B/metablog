<?php

namespace App\Http\Controllers;

use App\Models\SocialLinks;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Trait\FileUploadTrait;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    function __construct()
    {
        // $this->middleware('auth');
        // $this->middleware(['permission:user-list|user-create|user-edit|user-delete'], ['only' => ['index', 'store']]);
        // $this->middleware(['permission:user-create'], ['only' => ['create', 'store']]);
        // $this->middleware(['permission:user-edit'], ['only' => ['edit', 'update']]);
        // $this->middleware(['permission:user-delete'], ['only' => ['destroy']]);
    }

    public function index()
    {
        $user = Auth::user();
        return view('admin.profile.index', compact('user'));
    }

    use FileUploadTrait;
    public function update(Request $request)
    {
        // dd($request);
        $id = Auth()->user()->id;
        $user = User::find($id);

        // Update basic information
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->address = $request->address;

        // Update social links
        $socialLinks = $user->socialLinks;
        if (!$socialLinks) {
            $socialLinks = new SocialLinks();
            $socialLinks->user_id = $user->id;
        }

        $socialLinks->facebook = $request->facebook;
        $socialLinks->twitter = $request->twitter;
        $socialLinks->instagram = $request->instagram;
        $socialLinks->youtube = $request->youtube;
        $socialLinks->bio = $request->bio;

        $socialLinks->save();

        // Handle photo upload
        if ($request->hasFile('photo')) {
            $oldphoto = $user->photo;
            $user->photo = $this->uploadFile($request->file('photo'), '/app/public/user/photo', 200, 200);

            if ($oldphoto && $oldphoto !== $user->photo) {
                Storage::delete('/app/public/user/photo/' . $oldphoto);
            }
        }

        $user->save();

        return redirect()->back()->with('success', 'Profile updated successfully!');
    }

    public function changePassword(){
        return view('admin.profile.change-password');
    }
    
    public function updatePassword(Request $request)
    {
        // dd($request);
        if ($request->new_password != $request->new_password_confirmation) {
            return redirect()->back()->with('confirmerror', 'Passwords do not match!');
        }

        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|confirmed'
        ]);

        // Match The Old Password
        if (!Hash::check($request->old_password, auth()->user()->password)) {
            return redirect()->back()->with('error', 'Incorrect current password!');
        }

        // Update only the password field
        auth()->user()->update([
            'password' => Hash::make($request->new_password),
        ]);

        return redirect()->back()->with('status', 'Password changed successfully!');
    }
}
