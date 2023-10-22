<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\Catch_;

class CategoriesController extends Controller
{
   function __construct()
    {
         $this->middleware('permission:show all categories|create category|edit category|delete category', ['only' => ['index','show']]);
         $this->middleware('permission:create category', ['only' => ['create','store']]);
         $this->middleware('permission:edit category', ['only' => ['edit','update']]);
         $this->middleware('permission:delete category', ['only' => ['destroy']]);
    }


    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all();
        return view('categories/allCategories',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('categories/createNewCategory');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'name' => ['required','unique:categories'],
        ]);
        Category::create([
            'name' => $request->name,
        ]);

        return redirect()->route('categories.index')->with('sucsses','your category has been added successfuly');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        $products = $category->products;
        return view('categories/products_of_category',compact('products'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $category = Category::find($id);
        return view('categories/editCategory',compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $category = Category::find($id);

        $request->validate([
            'name' => ['required','unique:categories'],
        ]);

        $category->name = $request->name;
        $category->save();
        return redirect()->route('categories.index')->with('message','updated successfuly');


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $category = Category::find($id);
        $category->delete();
        return redirect()->route('categories.index')->with('message','deleted successfuly');

    }
}
