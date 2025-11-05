<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = "Data Products";
        $datas = Product::with('category')->orderBy('id', 'DESC')->get();
        return view('products.index', compact('datas', 'title'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = "Add Product";
        $categories = Category::all();
        return view('products.create', compact("title", "categories"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = [
            'category_id' => $request->category_id,
            'product_name' => $request->product_name,
            'product_price' => $request->product_price,
            'product_description' => $request->product_description,
            'is_active' => $request->is_active,
        ];
        // jika user uplod gambar
        if($request->hasFile('product_photo')){
            $path = $request->file('product_photo')->store('products', 'public');
            $data['product_photo'] = $path;
        }

        Product::create($data);
        alert()->success('Success', 'Insert Success');
        return redirect()->to('product');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $title = 'Update Product';
        $edit = Product::find($id);
        $categories = Category::get();
        return view('products.edit', compact('title', 'edit', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $product = Product::find($id);
        $data = [
            'category_id' => $request->category_id,
            'product_name' => $request->product_name,
            'product_price' => $request->product_price,
            'product_description' => $request->product_description,
            'is_active' => $request->is_active,
        ];

        if($request->hasFile('product_photo')){
            if($product->product_photo){
                File::delete(public_path('storage/' . $product->product_photo));
            }
            $path = $request->file('product_photo')->store('products', 'public');
            $data['product_photo'] = $path;
        }

        $product->update($data);
        alert()->success('Success', 'Update Success');
        return redirect()->to('product');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = Product::find($id);
        $data->delete();
        File::delete(public_path('storage/' . $data->product_photo)); //fungsi menghapus gambar dalam folder storage
        alert()->success('Success', 'Delete Success');
        return redirect()->to('product');
    }
}
