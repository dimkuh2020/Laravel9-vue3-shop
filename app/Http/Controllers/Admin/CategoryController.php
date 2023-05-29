<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Category\StoreRequest;
use App\Http\Requests\Category\UpdateRequest;
use App\Models\Category;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
   
    public function index()
    {
        $categories = Category::all();
        return view('admin.category.index', compact('categories'));
    }

    
    public function create()
    {
        return view('admin.category.create');
    }

    
    public function store(StoreRequest $request)
    {
        $data = $request->validated();        
        Category::firstOrCreate($data);

        return redirect()->route(('categories.index'));
    }

    
    public function show($id) //Category $category
    {
        $category = Category::find($id);
        return view('admin.category.show', compact('category'));
    }

    
    public function edit($id) //Category $category
    {
        $category = Category::find($id);
        return view('admin.category.edit', compact('category'));
    }

    
    public function update(UpdateRequest $request, $id)
    {
        $data = $request->validated();
        $category = Category::find($id);
        $category->update($data);

        return view('admin.category.show', compact('category'));
    }

    
    public function destroy($id)
    {
        $category = Category::find($id);
        $category->delete();

        return redirect()->route('categories.index');
    }
}
