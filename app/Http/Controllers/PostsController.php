<?php

namespace App\Http\Controllers;

use Session;
use App\Post;
use App\Category;
use Illuminate\Support\Str;

use Illuminate\Http\Request;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.posts.index')->with('posts', Post::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();

        if ($categories->count() == 0) {
            Session::flash('success', 'You must have some categories!');
            notify()->info('You must have some categories!');
            return redirect()->back();
        }

        return view('admin.posts.create')->with('categories', $categories);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|max:255',
            'featured' => 'required|image',
            'content' => 'required',
            'category_id' => 'required'
        ]);

        $featured = $request->featured;

        $featured_new_name = time().$featured->getClientOriginalName();

        $featured->move('uploads/posts', $featured_new_name);

        $post = Post::create([
            'title' => $request->title,
            'content' => $request->content,
            'featured' => 'uploads/posts/'.$featured_new_name,
            'category_id' => $request->category_id,
            'slug' => Str::slug($request->title, '-')
        ]);

        Session::flash('success', 'Post created successfully');
        notify()->success('Post created successfully', 'Success', ['timeOut' => 3000]);

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);

        return view('admin.posts.edit')->with('post', $post)->with('categories', Category::all());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required|max:255',
            'content' => 'required',
            'category_id' => 'required'
        ]);

        $post = Post::find($id);

        if ($request->hasFile('featured')) {
            $featured = $request->featured;

            $featured_new_name = time() . $featured->getClientOriginalName();
        
            $featured->move('uploads/posts', $featured_new_name);

            $post->featured = 'uploads/posts/'.$featured_new_name;
        }

        $post->title = $request->title;
        $post->content = $request->content;
        $post->category_id = $request->category_id;

        $post->save();

        Session::flash('success', 'Post updated successfully');
        notify()->success('Post updated successfully', 'Success', ['timeOut' => 3000]);

        return redirect()->route('posts');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);

        $post->delete();

        Session::flash('success', 'The post was just trashed');
        notify()->success('Post trashed successfully', 'Success', ['timeOut' => 3000]);

        return redirect()->back();
    }

    public function trashed() {
        $posts = Post::onlyTrashed()->get();
        
        return view('admin.posts.trashed')->with('posts', $posts);
    }

    public function kill($id) {
        $post = Post::withTrashed()->where('id', $id)->first();
        
        $post->forceDelete();

        Session::flash('success', 'Post deleted permanently');
        notify()->success('Post deleted permanently', 'Success', ['timeOut' => 3000]);

        return redirect()->back();
    }

    public function restore($id) {
        $post = Post::withTrashed()->where('id', $id)->first();
        
        $post->restore();

        Session::flash('success', 'Post restored permanesuccessfullyntly');
        notify()->success('Post restored successfully', 'Success', ['timeOut' => 3000]);

        return redirect()->route('posts');
    }


}
