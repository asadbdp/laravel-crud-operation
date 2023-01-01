@extends('layouts.backend')
@section('content')
<div class="card-header">
    <h4 class="card-title mb-0 d-flex justify-content-between">View Product
        <a href="{{ route('product.index') }}" class="btn btn-sm btn-outline-danger">Back</a>
    </h4>

</div>

<div class="card-body">
    <table class="table table-bordered table-sm table-striped">
        <tr>
            <th>Product Category</th>
            <td>{{ $product->category->name }}</td>
        </tr>
        <tr>
            <th>Product Brand</th>
            <td>{{ $product->brand->name }}</td>
        </tr>
        <tr>
            <th>Product Name</th>
            <td>{{ $product->product_name }}</td>
        </tr>
        <tr>
            <th>Product Slug</th>
            <td>{{ $product->product_slug }}</td>
        </tr>
        <tr>
            <th>Product Code</th>
            <td>{{ $product->product_code }}</td>
        </tr>
        <tr>
            <th>Product Price</th>
            <td>{{ $product->price }}</td>
        </tr>
        <tr>
            <th>Product Quantity</th>
            <td>{{ $product->qty }}</td>
        </tr>

        <tr>
            <th>Product Status</th>
            <td>
                @if($product->status == 0)
                    <span class="badge bg-warning">Pending</span>
                @else
                    <span class="badge bg-success">Published</span>
                @endif
            </td>
        </tr>

        <tr>
            <th>Feature Image</th>
            <td><img width="150" height="150" src="{{ $product->image!=null ? asset('image/products/'.$product->image) : 'https://via.placeholder.com/60' }}"></td>
        </tr>


    </table>
</div>

@endsection
