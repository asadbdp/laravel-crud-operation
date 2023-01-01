<?php

namespace App\Http\Controllers\Admin;

use App\Models\Brand;
use Illuminate\Http\Request;
use App\Http\Requests\BrandRequest;
use App\Http\Controllers\Controller;

class BrandController extends Controller
{
    /**
     * brand resource list
     * @return \Illuminate\Http\Response
    */
    public function index(){
        $brand = Brand::orderBy('id', 'DESC')->get();
        return view('backend.brand.index', ['brand'=>$brand]);
    }

     /**
     * brand resource create
     * @return \Illuminate\Http\Response
    */
    public function create(){
        return view('backend.brand.create');
    }

    /**
     * brand resource store
     * @param App\Http\Requests\BrandRequest $request
     * @return \Illuminate\Http\Response
    */
    public function store(BrandRequest $request){
        Brand::create([
            'name' => $request->brand_name,
            'status' => $request->status,
        ]);

        return back()->with('success', 'Brand has been saved');
    }

     /**
     * brand resource edit
     * @param \App\Models\Category $category
     * @return \Illuminate\Http\Response
    */

    public function edit(Brand $brand){
        return view('backend.brand.edit', ['brand'=>$brand]);
    }

    /**
     * brand resource update
     * @param \App\Models\Category $category
     * @param App\Http\Requests\BrandRequest $request
     * @return \Illuminate\Http\Response
    */
    public function update(BrandRequest $request, Brand $brand){

        $brand->update([
            'name' => $request->brand_name,
            'status' => $request->status,
        ]);

        return back()->with('success', 'Brand has been Updated');
    }

    /**
     * brand resource delete
     * @param \App\Models\Category $category
     * @return \Illuminate\Http\Response
    */
    public function delete(Brand $brand){
       $brand->delete();
        return back()->with('success', 'Brand has been Deleted');

    }
}
