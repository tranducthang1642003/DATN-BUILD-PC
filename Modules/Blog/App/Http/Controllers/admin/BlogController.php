<?php

namespace Modules\Blog\App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Modules\blog\Entities\Blogs;
use Modules\Blog\Entities\CategoryBlog;

class BlogController extends Controller
{
    public function index(Request $request)
    {
        $blogsQuery = blogs::with('category_blog');
        $startDate = $request->input('start_date');
        $endDate = $request->input('end_date');
        if ($startDate && $endDate) {
            $blogsQuery->whereBetween('created_at', [$startDate, $endDate]);
        }
        $keyword = $request->input('keyword');
        if ($keyword) {
            $blogsQuery->where('blog_name', 'like', '%' . $keyword . '%');
        }
        $blogs = $blogsQuery->paginate(5);

        return view('admin.blog.blog', compact('blogs'));
    }
    public function edit($id)
    {
        $category_blog = CategoryBlog::all();
        $blog = blogs::with('category_blog')->findOrFail($id);
        return view('admin.blog.edit', compact('blog', 'category_blog'));
    }


    public function update_blog(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string',
            'content' => 'required|string',
            'featured' => 'required|integer',
            'blog_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            // 'user_id' => 'required|numeric',
            'category_blog_id' => 'required|numeric',
        ]);
        try {
            $blog = Blogs::findOrFail($id);
            $blog->title = $request->input('title');
            $blog->slug = Str::slug($request->input('title'), '-');
            $blog->content = $request->input('content');
            $blog->featured = $request->input('featured') === 'yes';
            $blog->user_id = 1;
            $blog->category_blog_id = $request->input('category_blog_id');
            if ($request->hasFile('blog_image')) {
                if ($blog->blog_image) {
                    $oldImagePath = public_path($blog->blog_image);
                    if (file_exists($oldImagePath)) {
                        unlink($oldImagePath);
                    }
                }
                $blog_image = $request->file('blog_image');
                $fileName = time() . '_' . $blog_image->getClientOriginalName();
                $blog_image->move(public_path('blog_image'), $fileName);
                $blog->blog_image = 'image/' . $fileName;
            }
            $blog->save();
            return redirect()->route('blog')->with('success', 'Cập nhật sản phẩm thành công!');
        } catch (\Exception $e) {
            dd($e->getMessage());
            return redirect()->back()->withInput()->withErrors('Cập nhật sản phẩm thất bại.');
        }
    }


    public function add()
    {
        $category_blog = CategoryBlog::all();
        $blog = blogs::with('category_blog');
        return view('admin.blog.add', compact('blog', 'category_blog'));
    }
    public function add_blog(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string',
            'content' => 'required|string',
            'featured' => 'required|in:0,1',
            'blog_image' => 'required',
            // 'user_id' => 'required|numeric',
            'category_blog_id' => 'required|numeric',
        ]);

        // dd($validator);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        try {
            $blog = new blogs();
            $blog->title = $request->input('title');
            $blog->slug = Str::slug($request->input('title'), '-');
            $blog->content = $request->input('content');
            // $blog->blog_image = $request->input('blog_image');
            $blog->featured = $request->input('featured');
            // $blog->user_id = $request->input('user_id');
            $blog->user_id = 1;
            $blog->category_blog_id = $request->input('category_blog_id');
            if ($blog_image = $request->file('blog_image')) {
                $fileName = time() . '_' . $blog_image->getClientOriginalName();
                $blog_image->move(public_path('blog_image'), $fileName);
                $blog->blog_image = 'blog_image/' . $fileName;
            }
            $blog->save();

            return redirect()->route('blog')->with('success', 'Thêm sản phẩm thành công!');
        } catch (\Exception $e) {
            dd($e->getMessage());
            return redirect()->back()->withInput()->withErrors('Thêm sản phẩm thất bại.');
        }
    }

    public function destroy($id)
    {
        try {
            $blog = blogs::findOrFail($id);
            $blog->delete();
            return redirect()->route('blog.index')->with('success', 'blog deleted successfully!');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors('Failed to delete blog.');
        }
    }
}
