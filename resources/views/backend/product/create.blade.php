@extends('layouts.backend')
@section('content')
<div class="card-header">
    <h4 class="card-title mb-0 d-flex justify-content-between">New Product
        <a href="{{ route('product.index') }}" class="btn btn-sm btn-outline-danger">Back</a>
    </h4>

</div>

<div class="card-body">
    <form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
        @csrf


        <div class="row">
            {{-- alert --}}
            @include('backend.include.alert')
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="product_name" class="form-label">Product Name</label>
                            <input type="text" name="product_name" class="form-control" id="product_name"
                                placeholder="Product Name">
                             @error('product_name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>


                        <div class="mb-3">
                            <label for="product_slug" class="form-label">Product Slug</label>
                            <input type="text" name="product_slug" class="form-control" id="product_slug">
                            @error('product_slug')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="product_code" class="form-label">Product Code</label>
                            <input type="text" name="product_code" class="form-control" id="product_code"
                                placeholder="Product Code">
                            @error('product_code')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="quantity" class="form-label">Quantity</label>
                            <input type="text" name="qty" class="form-control" id="quantity"
                                placeholder="Quantity">
                            @error('qty')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="price" class="form-label">Price</label>
                            <input type="text" name="price" class="form-control" id="price" placeholder="Price">
                            @error('price')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="image" class="form-label">Feature Image</label>
                            <input type="file" name="image" class="form-control" id="image" placeholder="Price">
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
                                    <option value="{{ $brand->id }}">{{ $brand->name }}</option>
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
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
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
                                <option value="0">Pending</option>
                                <option value="1">Published</option>
                            </select>
                            @error('status')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="text-end">
                            <button type="submit" class="btn btn-sm btn-primary">Create</button>
                        </div>
                    </div>
                </div>
            </div>


        </div>



    </form>

</div>
@endsection
