<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class BlogController extends Controller
{
    /**
     * Show a index page of blog. With all posts of this school.
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('page.blog');
    }

    public function showPost($id)
    {
        $post = Blog::find($id);
        return view('page.blog-post', ['post' => $post]);
    }

    public function create()
    {
        return view('page.blog-create');
    }

    public function postCreate(Request $request)
    {
        Blog::create([
            'title' => $request->title,
            'body'  => $request->body,
            'user_id' => $request->user()->id
        ]);

        flash()->success('Ви успішно добавили нову статтю');
        return redirect(route('blog'));
    }


    /**
     * API function to get all posts
     * @return mixed
     */
    public function getAll()
    {
//        $posts = new Blog();
//        $posts = $posts->sortBy('id','desc')->paginate(6);
        $posts = DB::table('blog')->orderBy('id', 'desc')->paginate(6);
        return $posts;
    }
}
