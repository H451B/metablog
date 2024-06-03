<?php

namespace App\Http\Controllers;

use App\Models\BlogCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BlogCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $blogCategory = BlogCategory::all();
        return view('admin.blog.category.index', compact('blogCategory'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|unique:blog_categories,title|max:255'
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withInput()
                ->withErrors($validator)
                ->with('error', 'Validation failed');
        }

        try {
            BlogCategory::create([
                'title' => $request->title,
                'slug'=>strtolower(str_replace(' ','-',$request->title)),
            ]);

            return redirect()->route('blog-category.index')->with('success', 'Post Category created successfully');
        } catch (\Exception $e) {
            return redirect()->back()
                ->withInput()
                ->withErrors($e->getMessage())
                ->with('error', 'An error occurred while creating the job information');
        }
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|unique:blog_categories,title|max:255',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withInput()
                ->withErrors($validator)
                ->with('error', 'Validation failed');
        }

        try {
            $blog = BlogCategory::findOrFail($id);
            $blog->title = $request->title;
            $blog->save();

            return redirect()->route('blog-category.index')->with('success', 'Post Category Updated Successfully');
        } catch (\Exception $e) {
            return redirect()->back()
                ->withInput()
                ->withErrors($e->getMessage())
                ->with('error', 'An error occurred while creating the jobs');
        }
    }

    public function destroy(BlogCategory $blogCategory)
    {
        // dd($blogCategory);
        try {
            // $blogCategory->blog()->delete();
            $blogCategory->delete();
            return redirect()->route('blog-category.index');
        } catch (\Throwable $th) {
            return redirect()->route('blog-category.index')
                ->withErrors($th->getMessage());
        }
    }

    /**
     * Active Inactive
     */
    public function blogCategoryInactive($id)
    {
        BlogCategory::findOrFail($id)->update(['status' => 0]);
        return redirect()->route('blog-category.index');
    }

    public function blogCategoryActive($id)
    {
        BlogCategory::findOrFail($id)->update(['status' => 1]);
        return redirect()->route('blog-category.index');
    }
}
