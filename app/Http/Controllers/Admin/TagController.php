<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Tag\StoreRequest;
use App\Http\Requests\Tag\UpdateRequest;
use App\Models\Tag;

class TagController extends Controller
{
    
    public function index()
    {
        $tags = Tag::all();
        return view('admin.tag.index', compact('tags'));
    }
   

    public function create()
    {
        return view('admin.tag.create');
    }

   
    public function store(StoreRequest $request)
    {
        $data = $request->validated();
        Tag::FirstOrCreate($data);
        return redirect()->route('tags.index');
    }

    
    public function show($id)
    {
        $tag = Tag::find($id);
        return view('admin.tag.show', compact('tag'));
    }

    
    public function edit($id)
    {
        $tag = Tag::find($id);        
        return view('admin.tag.edit', compact('tag'));
    }

    
    public function update(UpdateRequest $request, $id)
    {
        $tag = Tag::find($id);
        $data = $request->validated();
        $tag->update($data);
        return view('admin.tag.show', compact('tag'));
    }

    
    public function destroy($id)
    {
        $tag = Tag::find($id);
        $tag->delete();
        return redirect()->route('tags.index');
    }
}
