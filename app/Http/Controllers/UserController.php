<?php

namespace App\Http\Controllers;

use App\Models\SocialLinks;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Trait\FileUploadTrait;

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
}
