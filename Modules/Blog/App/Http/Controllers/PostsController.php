<?php

namespace Modules\Blog\App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\Blog\Entities\Blogs;
use Modules\Blog\Entities\CategoryBlog;
use Modules\Settings\Entities\Menu;

class PostsController extends Controller
{
    public function index()
    {
        $projects = Blogs::latest()->paginate(10);
        $menuItems = Menu::all();

        return view('public.blog.index',compact('menuItems'), [
            'projects' => $projects,
        ]);
    }
    public function show($slug)
    {
        $blog = Blogs::where('slug', $slug)->firstOrFail();

        $menuItems = Menu::all();


        return view('public.blog.show', compact('menuItems'),[
            'blog' => $blog,
        ]);
    }
}
