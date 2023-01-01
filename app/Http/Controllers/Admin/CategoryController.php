<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;

class CategoryController extends Controller
{
    /**
     * category resource list
     * @return \Illuminate\Http\Response
    */
    public function index(){
        $category = Category::orderBy('id', 'DESC')->get();
        return view('backend.category.index', ['category'=>$category]);
    }

     /**
     * category resource create
     * @return \Illuminate\Http\Response
    */
    public function create(){
        return view('backend.category.create');
    }

     /**
     * category resource store
     * @param \App\Http\Requests\CategoryRequest $request
     * @return \Illuminate\Http\Response
    */
    public function store(CategoryRequest $request){
        Category::create([
            'name' => $request->category_name,
            'status' => $request->status,
         ]);

         return back()->with('success', 'Category has been saved');
    }

    /**
     * category resource edit
     * @param \App\Models\Category $category
     * @return \Illuminate\Http\Response
    */
    public function edit(Category $category){
        return view('backend.category.edit', ['category'=>$category]);
    }

    /**
     * category resource update
     * @param \App\Models\Category $category
     * @param \App\Http\Requests\CategoryRequest
     * @return \Illuminate\Http\Response
    */

    public function update(CategoryRequest $request, Category $category){

        $category->update([
            'name' => $request->category_name,
            'status' => $request->status,
         ]);

         return back()->with('success', 'Category has been updated');
    }

    /**
     * category resource delete
     * @param \App\Models\Category $category
     * @return \Illuminate\Http\Response
    */

    public function delete(Category $category){
        $category->delete();
        return back()->with('success', 'Category has been Deleted');
    }


}
