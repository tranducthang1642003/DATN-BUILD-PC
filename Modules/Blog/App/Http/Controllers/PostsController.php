<?php

namespace Modules\Blog\App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\Blog\Entities\Blogs;
use Modules\Blog\Entities\CategoryBlog;
use Modules\Settings\Entities\Menu;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = Blogs::latest()->paginate(10); // Retrieve latest blogs paginated
        $menuItems = Menu::all();

        return view('public.blog.index',compact('menuItems'), [
            'projects' => $projects, // Pass $projects variable to the view
        ]);
    }

    /**
     */
    public function show($slug)
    {
        $blog = Blogs::where('slug', $slug)->firstOrFail(); // Retrieve blog post by slug

        $menuItems = Menu::all();


        return view('public.blog.show', compact('menuItems'),[
            'blog' => $blog, // Pass $blog variable to the view
        ]);
    }
}
