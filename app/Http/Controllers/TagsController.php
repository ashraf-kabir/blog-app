<?php

namespace App\Http\Controllers;

use Session;
use App\Tag;
use Illuminate\Http\Request;

class TagsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.tags.index')->with('tags', Tag::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.tags.create');
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
            'tag' => 'required'
        ]);

        Tag::create([
            'tag' => $request->tag
        ]);

        Session::flash('success', 'Tags created successfully');
        notify()->success('Tags created successfully', 'Success', ['timeOut' => 3000]);

        return redirect()->route('tags');
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
        $tag = Tag::find($id);

        return view('admin.tags.edit')->with('tag', $tag);
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
            'tag' => 'required'
        ]);

        $tag = Tag::find($id);

        $tag->tag = $request->tag;

        $tag->save();

        Session::flash('success', 'Tag updated!');
        notify()->success('Tag updated!', 'Success', ['timeOut' => 3000]);

        return redirect()->route('tags');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Tag::destroy($id);

        Session::flash('success', 'Tag deleted successfully');
        notify()->success('Tag deleted successfully', 'Success', ['timeOut' => 3000]);

        return redirect()->back();
    }
}
