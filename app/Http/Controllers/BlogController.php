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
        return view('blog.index');
    }

    public function showPost($id)
    {
        $post = Blog::find($id);
        return view('blog.post', ['post' => $post]);
    }

    public function create()
    {
        return view('blog.create');
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

    public function delete($id)
    {
        $post = Blog::find($id);
        $post->delete();

        flash()->success('Ви успішно видалили цю статтю.');
        return redirect(route('blog'));
    }

    public function edit($id){
        $post = Blog::findOrFail($id);

        return view('blog.edit', ['post' => $post]);
    }

    public function update($post, Request $request)
    {
        $post = Blog::find($post);

        $post->fill($request->all());
        $post->save();

        flash()->success('Ви успішно змінили статтю!');
        return redirect(route('blog.page', ['id' => $post->id]));
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
