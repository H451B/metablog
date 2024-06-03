<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\BlogCategory;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Trait\FileUploadTrait;
use DOMDocument;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class BlogController extends Controller
{
    public function index()
    {
        $blogs = Blog::all();
        return view('admin.blog.index', compact('blogs',));
    }

    public function create()
    {
        $categories = BlogCategory::all();
        return view('admin.blog.create', compact('categories'));
    }

    public function edit($id)
    {
        $blog = Blog::findOrFail($id);
        $categories = BlogCategory::all();
        return view('admin.blog.edit', compact('categories', 'blog'));
    }

    use FileUploadTrait;
    public function store(Request $request)
    {
        $modifiedArticle = '<div>' . $request->article . '</div>';
        $dom = new DOMDocument();
        $dom->loadHtml($modifiedArticle, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
        $images = $dom->getElementsByTagName('img');
        foreach ($images as $image) {
            $src = $image->getAttribute('src');
            if (strpos($src, 'data:image') === 0) {
                // Extract and save the image
                list($type, $data) = explode(';', $src);
                list(, $data) = explode(',', $data);
                $data = base64_decode($data);

                $fileName = time() . '_' . rand(1000, 9999) . '.png'; // Example file name generation
                // $fileName = $this->uploadFile($data, '/app/public/blog/post', 300, 650);
                $savePath = '/app/public/blog/post/' . $fileName;
                $showPath = '/storage/blog/post/' . $fileName; // Set your image folder path

                file_put_contents(storage_path($savePath), $data);


                $image->setAttribute('src', asset($showPath));
            }
        }

        // Get the modified HTML content
        $request->merge(['article' => $dom->saveHTML()]);

        $validator = Validator::make($request->all(), [
            'title' => 'required|string',
            'banner' => 'required',
            'article' => 'required',
            'blog_category_id' => 'required|string',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withInput()
                ->withErrors($validator)
                ->with('error', 'Validation failed');
        }

        try {
            Blog::create([
                'title' => $request->title,
                'slug'=>strtolower(str_replace(' ','-',$request->title)),
                'banner' => $this->uploadFile($request->banner, '/app/public/blog/banner', 350, 700),
                'article' => $request->article,
                'user_id' =>  Auth::id(),
                'show_home' => $request->show_home ? 1 : 0,
                'blog_category_id' => $request->blog_category_id,
                'tags' => $request->tags,
            ]);

            return redirect()->route('blog.index')->with('success', 'Post created successfully');
        } catch (\Exception $e) {
            return redirect()->back()
                ->withInput()
                ->withErrors($e->getMessage())
                ->with('error', 'An error occurred while creating the job information');
        }
    }

    public function update(Request $request,Blog $blog)
    {
        // dd($request);
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'article' => 'required|string',
            'blog_category_id' => 'required|integer|exists:blog_categories,id',
            'banner' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withInput()
                ->withErrors($validator)
                ->with('error', 'Validation failed');
        }

        try {
            $blog = Blog::findOrFail($blog->id);

            $oldBannerPath = $blog->banner;
            if ($request->hasFile('banner')) {
                $blog->banner = $this->uploadFile($request->file('banner'), '/app/public/blog/banner', 800, 400);

                if ($oldBannerPath && $oldBannerPath !== $blog->banner) {
                    Storage::delete('/app/public/blog/banner/' . $oldBannerPath);
                }
            }

            $blog->title = $request->title;
            $blog->article = '<div>' . $request->article . '</div>';
            $blog->blog_category_id = $request->blog_category_id;
            $blog->save();

            return redirect()->route('blog.index')->with('success', 'Post Updated successfully');
        } catch (\Exception $e) {
            return redirect()->back()
                ->withInput()
                ->withErrors($e->getMessage())
                ->with('error', 'An error occurred while creating the jobs');
        }
    }

    public function destroy(Blog $blog)
    {
        try {
            // Delete the associated banner if it exists
            if ($blog->banner) {
                $this->deleteFile('public/blog/banner/' . $blog->banner); // Note the 'public/' prefix
            }

            $dom = new DOMDocument();
            @$dom->loadHTML($blog->article, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
            $images = $dom->getElementsByTagName('img');
            foreach ($images as $image) {
                $src = $image->getAttribute('src');
                if (strpos($src, asset('storage/blog/post')) !== false) {
                    $relativePath = str_replace(asset('storage'), 'public', $src);
                    if (Storage::exists($relativePath)) {
                        Storage::delete($relativePath);
                    }
                }
            }

            // Delete the blog post
            $blog->delete();

            return redirect()->route('blog.index')->with('success', 'Post deleted successfully');
        } catch (\Exception $e) {
            return redirect()->back()
                ->withErrors($e->getMessage())
                ->with('error', 'An error occurred while deleting the post');
        }
    }


    /**
     * Active Inactive
     */
    public function blogInactive($id)
    {
        Blog::findOrFail($id)->update(['status' => 0]);
        return redirect()->route('blog.index');
    }

    public function blogActive($id)
    {
        Blog::findOrFail($id)->update(['status' => 1]);
        return redirect()->route('blog.index');
    }

    // show top
    public function showTop($id)
    {
        $blog = Blog::findOrFail($id);
        $blog->update(['show_top' => $blog->show_top == 1 ? 0 : 1]);
        return redirect()->route('blog.index');
    }

    // show home
    public function showHome($id)
    {
        $blog = Blog::findOrFail($id);
        $blog->update(['show_home' => $blog->show_home == 1 ? 0 : 1]);
        return redirect()->route('blog.index');
    }

    public function show(Blog $blog)
    {
        $blog->category_title = $blog->category->title;
        // dd($blog->category_title);
        return view('admin.blog.show', compact('blog'));
    }
}
