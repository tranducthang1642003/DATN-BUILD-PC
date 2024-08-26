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
        $title = 'Tin tức';

        $projects = Blogs::latest()->paginate(10);
        $menuItems = Menu::all();

        return view('public.blog.index',compact('menuItems','title'), [
            'projects' => $projects,
        ]);
    }
    public function show($slug)
    {
        $title = 'Chi tiết tin tức';
        $blog = Blogs::where('slug', $slug)->firstOrFail();

        $menuItems = Menu::all();


        return view('public.blog.show', compact('menuItems', 'title'),[
            'blog' => $blog,
        ]);
    }
}
