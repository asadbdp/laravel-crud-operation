<?php

namespace App\Http\Controllers\Admin;

use App\Models\Brand;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;

class ProductController extends Controller
{
    /**
     * product resource list
     * @return lluminate\Http\Response
     */
    public function index(){
        $product = Product::with('category', 'brand')->orderBy('id', 'DESC')->get();
        return view('backend.product.index', ['product'=>$product]);
    }

    /**
     * product create list
     * @return lluminate\Http\Response
     */

    public function create(){

        $data = [
            'brand' => Brand::latest('id')->where('status', 1)->get(),
            'category' => Category::latest('id')->where('status', 1)->get(),
        ];
        return view('backend.product.create', ['data'=>$data]);

    }

    /**
     * product store
     * @param App\Http\Requests\ProductRequest $request
     * @return lluminate\Http\Response
     */

     public function store(ProductRequest $request){
        $data = $request->except('_token');
        $data['product_slug'] = Str::slug($request->product_slug);

        //product upload
        if($request->hasFile('image')){
            $data['image'] = $this->file_upload($request->file('image'), 'image/products/');
        }

        Product::create($data);

        return back()->with('success','Product has been saved');

     }

     /**
     * product edit
     * @return lluminate\Http\Response
     */
    public function edit($product_id){
        $data = [
            'brand' => Brand::latest('id')->where('status', 1)->get(),
            'category' => Category::latest('id')->where('status', 1)->get(),
        ];

        $product = Product::findOrFail($product_id);

        return view('backend.product.edit', ['data'=>$data, 'product'=>$product]);

     }

     /**
     * product update
     * @param App\Http\Requests\ProductRequest $request
     * @return lluminate\Http\Response
     */

     public function update(Request $request, $product_id){
        $data = $request->except('_token');
        $data['product_slug'] = Str::slug($request->product_slug);

        $product = Product::findOrFail($product_id);

        //product upload
        if($request->hasFile('image')){
            $data['image'] = $this->file_updated($request->file('image'), 'image/products/', $product->image);
        }

        $product->update($data);

        return back()->with('success','Product has been updated');

     }


    /**
     * product delete
     * @return lluminate\Http\Response
     */

     public function destroy($product_id){
        $product = Product::findOrFail($product_id);

        $this->file_remove('image/products/',$product->image);


        $product->delete();

        return back()->with('success','Product has been Removed');

     }

     /**
     * product show
     * @return lluminate\Http\Response
     */

     public function show($product_id){
        $product = Product::findOrFail($product_id);
        return view('backend.product.view', ['product'=>$product]);
     }


}
