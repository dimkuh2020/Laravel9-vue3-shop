<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Color\StoreRequest;
use App\Http\Requests\Color\UpdateRequest;
use App\Models\Color;

class ColorController extends Controller
{
    
    public function index()
    {
        $colors = Color::all();
        return view('admin.color.index', compact('colors'));
    }

    
    public function create()
    {
        return view('admin.color.create');
    }

    
    public function store(StoreRequest $request)
    {
        $data = $request->validated();
        Color::FirstOrCreate($data);

        return redirect()->route(('colors.index'));
    }

    
    public function show($id)
    {
        $color = Color::find($id);
        return view('admin.color.show', compact('color'));
    }

    
    public function edit($id)
    {
        $color = Color::find($id);
        return view('admin.color.edit', compact('color'));

    }

    
    public function update(UpdateRequest $request, $id)
    {
        $color = Color::find($id);
        $data = $request->validated();
        $color->update($data);
        return view('admin.color.show', compact('color'));
    }
    
    
    public function destroy($id)
    {
        $color = Color::find($id);
        $color->delete();

        return redirect()->route('colors.index');
    }
}
