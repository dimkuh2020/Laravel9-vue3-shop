<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Product\StoreRequest;
use App\Http\Requests\Product\UpdateRequest;
use App\Models\Category;
use App\Models\Color;
use App\Models\ColorProduct;
use App\Models\Product;
use App\Models\ProductTag;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    
    public function index()
    {
        $products = Product::all();
        return view('admin.product.index', compact('products'));
    }

    
    public function create()
    {
        $tags = Tag::all();
        $colors = Color::all();
        $categories = Category::all();
        return view('admin.product.create', compact('tags', 'colors', 'categories'));
    }

    
    public function store(StoreRequest $request)
    {        
        $data = $request->validated(); 
        $data['preview_image'] = Storage::disk('public')->put('/images', $data['preview_image']); // сохр в папку /images
        
        $tagsIds = $data['tags'];
        $colorsIds = $data['colors'];
        unset($data['tags'], $data['colors']);

        $product = Product::firstOrCreate([  // Получить продукт по `title` или создать его с атрибутами 
            'title' => $data['title']
        ], $data);

        //заливаем табл product_tags
        foreach ($tagsIds as $tagsId) {
            ProductTag::firstOrCreate([
                'product_id' => $product->id,
                'tag_id' => $tagsId,
            ]);
        }

        // табл color_products
        foreach ($colorsIds as $colorsId) {
             ColorProduct::firstOrCreate([
                'product_id' => $product->id,
                'color_id' => $colorsId,
            ]);
        }

        return redirect()->route(('products.index'));
    }

    
    public function show($id)
    {
        $product = Product::find($id);
        return view('admin.product.show', compact('product'));
    }

    
    public function edit($id)
    {
        $product = Product::find($id);
        return view('admin.product.edit', compact('product'));

    }

    
    public function update(UpdateRequest $request, $id)
    {
        $product = Product::find($id);
        $data = $request->validated();
        $product->update($data);
        return view('admin.product.show', compact('product'));
    }
    
    
    public function destroy($id)
    {
        $product = Product::find($id);
        $product->delete();

        return redirect()->route('products.index');
    }
}
