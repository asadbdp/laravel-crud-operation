@extends('layouts.backend')
@section('content')
<div class="card-header">
    <h4 class="card-title mb-0 d-flex justify-content-between">Edit Product
        <a href="{{ route('product.index') }}" class="btn btn-sm btn-outline-danger">Back</a>
    </h4>

</div>

<div class="card-body">
    <form action="{{ route('product.update', $product->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="row">
            {{-- alert --}}
            @include('backend.include.alert')
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="product_name" class="form-label">Product Name</label>
                            <input type="text" name="product_name" value="{{ $product->product_name }}" class="form-control" id="product_name"
                                placeholder="Product Name">
                             @error('product_name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>


                        <div class="mb-3">
                            <label for="product_slug" class="form-label">Product Slug</label>
                            <input type="text" name="product_slug" value="{{ $product->product_slug }} "class="form-control" id="product_slug">
                            @error('product_slug')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="product_code" class="form-label">Product Code</label>
                            <input type="text" name="product_code" class="form-control" value="{{$product->product_code}}" id="product_code"
                                placeholder="Product Code">
                            @error('product_code')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="quantity" class="form-label">Quantity</label>
                            <input type="text" name="qty" value="{{ $product->qty }}" class="form-control" id="quantity"
                                placeholder="Quantity">
                            @error('qty')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="price" class="form-label">Price</label>
                            <input type="text" name="price" value="{{ $product->price }}" class="form-control" id="price" placeholder="Price">
                            @error('price')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="image" class="form-label">Feature Image</label>
                            <input type="file" name="image" class="form-control" id="image" placeholder="Price">
                            <img width="60" height="60" src="{{ $product->image!=null ? asset('image/products/'.$product->image) : 'https://via.placeholder.com/60'}}" alt="">
                            @error('image')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                </div>
            </div>

            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="brand" class="form-label">Brand</label>
                            <select name="brand_id" id="brand" class="form-control form-control-sm">
                                <option value="">Select Brand</option>
                                @forelse ($data['brand'] as $brand)
                                    <option value="{{ $brand->id }}" {{$product->brand_id == $brand->id ? 'selected' : '' }}>{{ $brand->name }}</option>
                                @empty
                                <option value="">There are no brand, create brand</option>
                                @endforelse

                            </select>
                            @error('brand_id')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror

                        </div>

                        <div class="mb-3">
                            <label for="category" class="form-label">Category</label>
                            <select name="category_id" id="category" class="form-control form-control-sm">
                                <option value="">Select Category</option>
                                @forelse ($data['category'] as $category)
                                <option value="{{ $category->id }}" {{ $product->category_id == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                                @empty
                                <option value="">There are no category, create category</option>
                                @endforelse

                            </select>
                            @error('category_id')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="status" class="form-label">Status</label>
                            <select name="status" id="status" class="form-control form-control-sm">
                                <option value="">Select Status</option>
                                <option value="0" {{ $product->status == 0 ? 'selected' : '' }}>Pending</option>
                                <option value="1" {{ $product->status == 1 ? 'selected' : '' }}>Published</option>
                            </select>
                            @error('status')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="text-end">
                            <button type="submit" class="btn btn-sm btn-primary">Update</button>
                        </div>
                    </div>
                </div>
            </div>


        </div>



    </form>

</div>
@endsection
