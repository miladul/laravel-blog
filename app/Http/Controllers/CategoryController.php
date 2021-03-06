<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use MongoDB\Driver\Session;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::orderBy('created_at','DESC')->paginate(7);

        return view('admin.category.index',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('admin.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validate
        $request->validate([
            'name' => ['required', 'unique:categories,name'],
        ]);
        $categories = Category::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name, '-'),
            'discription' => $request->discription,
        ]);

        return redirect()->back()->with('success','Category inserted');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        //return $category;
        return view('admin.category.edit',compact('category'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        //dd($request);
        $request->validate([
            'name' => 'required|unique:categories,name,'.$category->id,
        ]);

        $category->name = $request->name;
        $category->slug = Str::slug($request->name, '-');
        $category->discription = $request->discription;
        $category->save();

        return redirect()->back()->with('success','Category updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        if($category){
            $category->delete();
            return redirect()->back()->with('warningMsg','Category has been deleted');
        }

    }
}
