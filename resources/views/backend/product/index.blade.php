@extends('layouts.backend')
@section('content')
<div class="card-header">
    <h4 class="card-title mb-0 d-flex justify-content-between">Product List
        <a href="{{ route('product.create') }}" class="btn btn-sm btn-outline-primary">Add New</a>
    </h4>

</div>

<div class="card-body">
    {{-- alert --}}
    @include('backend.include.alert')
    <table class="table table-sm table-striped table-hover table-bordered">
        <thead class="text-center">
            <th>SL</th>
            <th>Brand</th>
            <th>Category</th>
            <th>Product Name</th>
            <th>Product Code</th>
            <th>Quantity</th>
            <th>Price</th>
            <th>Feature Image</th>
            <th>Action</th>
        </thead>
        <tbody>
            @if ($product->count() > 0)

            @foreach ($product as $key=>$value)

            <tr class="text-center">
                <td>{{ $key+1 }}</td>
                <td>{{ $value->brand->name }}</td>
                <td>{{ $value->category->name }}</td>
                <td>{{ $value->product_name }}</td>
                <td>{{ $value->product_code }}</td>
                <td>{{ $value->qty }}</td>
                <td>{{ $value->price }}</td>
                <td><img width="60" height="60" src="{{ $value->image!=null ? asset('image/products/'.$value->image) : 'https://via.placeholder.com/60' }}"></td>
                <td>
                    <div class="d-flex justify-content-center">
                        <a href="{{ route('product.show', $value->id) }}" class="btn btn-sm btn-success me-1">View</a>
                        <a href="{{ route('product.edit', $value->id) }}" class="btn btn-sm btn-info me-1">Edit</a>

                        <form id="delete-form-{{ $value->id }}" action="{{ route('product.destroy', $value->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                        </form>

                        <button type="button" class="btn btn-sm btn-danger" onclick="alert_message({{ $value->id }})">Delete</button>

                    </div>

                </td>
            </tr>

            @endforeach

            @endif
        </tbody>

    </table>
</div>
@endsection
