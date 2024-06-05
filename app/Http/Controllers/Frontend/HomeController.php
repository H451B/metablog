<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Setting;
use App\Models\Subscriber;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        // $latestBlogs = Blog::select(['id','slug', 'title', 'banner', 'user_id', 'blog_category_id', 'created_at'])
        //     ->with(['author:id,name,photo', 'category:id,title'])
        //     ->latest()
        //     ->take(9)
        //     ->get();
        $featuredBlog = Blog::select(['id','slug', 'title', 'user_id', 'blog_category_id', 'created_at'])
            ->with(['author:id,name,photo', 'category:id,title'])
            ->where('show_home', 1)
            ->first();
        // dd($featuredBlog);
        $banner = Setting::first()->home_banner;
        // dd($featuredBlog);

        return view('ui.index', compact( 'featuredBlog', 'banner'));
    }

    public function blogs(){
        $blogs = Blog::select(['id','slug', 'title', 'banner', 'user_id', 'blog_category_id', 'created_at'])
            ->with(['author:id,name,photo', 'category:id,title'])
            ->take(9)
            ->get();
        $featuredBlog = Blog::select(['id','slug', 'title', 'user_id', 'blog_category_id', 'created_at'])
            ->with(['author:id,name,photo', 'category:id,title'])
            ->where('show_home', 1)
            ->first();
        $banner = Setting::first()->home_banner;
        return view('ui.blog.blogs',compact('blogs','banner','featuredBlog'));
    }

    public function showBlog($slug)
    {
        // Fetch the blog post by slug along with the author and category information
        $blog = Blog::where('slug', $slug)->with(['author:id,name,photo', 'category:id,title'])->firstOrFail();

        return view('ui.blog.single-blog', compact('blog'));
    }

    public function subscribe(Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:subscribers,email',
        ]);

        Subscriber::create(['email' => $request->email]);

        return redirect()->back()->with('status', 'You have successfully subscribed to our newsletter!');
    }

    public function author(){
        $adminUser = User::whereHas('roles', function ($query) {
            $query->where('name', 'Admin');
        })->first();
        // dd($adminUser);
        return view('ui.author.author',compact('adminUser'));
    }
    // public function authorProfile(){
    //     // $
    //     return view('ui.author.author');
    // }
}
