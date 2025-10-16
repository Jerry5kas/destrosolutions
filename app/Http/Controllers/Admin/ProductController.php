<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::latest()->paginate(12);
        return view('admin.products.index', compact('products'));
    }

    public function create()
    {
        return view('admin.products.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => ['required','string','max:255'],
            'description' => ['nullable','string'],
            'key_features' => ['nullable','string'],
            'image' => ['nullable','image'],
            'is_active' => ['nullable','boolean'],
        ]);
        $data['key_features'] = $this->linesToArray($data['key_features'] ?? '');
        $data['is_active'] = (bool)($data['is_active'] ?? false);
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('uploads/products', 'public');
        }
        Product::create($data);
        return redirect()->route('admin.products.index')->with('status', 'Created');
    }

    public function edit(Product $product)
    {
        return view('admin.products.edit', compact('product'));
    }

    public function update(Request $request, Product $product)
    {
        $data = $request->validate([
            'title' => ['required','string','max:255'],
            'description' => ['nullable','string'],
            'key_features' => ['nullable','string'],
            'image' => ['nullable','image'],
            'is_active' => ['nullable','boolean'],
        ]);
        $data['key_features'] = $this->linesToArray($data['key_features'] ?? '');
        $data['is_active'] = (bool)($data['is_active'] ?? false);
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('uploads/products', 'public');
            if ($product->image && Storage::disk('public')->exists($product->image)) {
                Storage::disk('public')->delete($product->image);
            }
            $data['image'] = $path;
        }
        $product->update($data);
        return redirect()->route('admin.products.index')->with('status', 'Updated');
    }

    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('admin.products.index')->with('status', 'Deleted');
    }

    private function linesToArray(string $text): array
    {
        return collect(preg_split("/(\r\n|\r|\n)/", trim($text)))->filter()->values()->all();
    }
}


