<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests\StoreProductRequest;

class ProductsController extends Controller
{

    function __construct()
    {
         $this->middleware('permission:show all products|create product|edit product|delete product', ['only' => ['index','show']]);
         $this->middleware('permission:create product', ['only' => ['create','store']]);
         $this->middleware('permission:edit product', ['only' => ['edit','update']]);
         $this->middleware('permission:delete product', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::all();
        return view('products/allProducts',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('products/createProduct',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductRequest $request)
    {
        $validated = $request->validated();
        Product::create([
            'name'        => $request->name,
            'category_id' => $request->category,
            'price'       => $request->price,
            'desc'        => $request->description,
        ]);

        return redirect()->route('products.index')->with('message','added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $product = Product::find($id);
        return view('products/show_Product',compact('product'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $product = Product::find($id);
        $categories = Category::all();
        return view('products/editProduct',compact('product','categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreProductRequest $request, string $id)
    {
        // dd($request);
        $validated = $request->validated();
        $product = Product::find($id);
        $product->name = $request->name;
        $product->price = $request->price;
        $product->desc = $request->description;
        $product->category_id = $request->category;
        $product->save();
        return redirect()->route('products.index')->with('message','added successfully');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = Product::find($id);
        $product->delete();
        return redirect()->route('products.index')->with('message','added successfully');

    }
}
