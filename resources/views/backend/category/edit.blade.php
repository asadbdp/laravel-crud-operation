@extends('layouts.backend')
@section('content')
<div class="card-header">
    <h4 class="card-title mb-0 d-flex justify-content-between">Edit Category
        <a href="{{ route('category.index') }}" class="btn btn-sm btn-outline-danger">Back</a>
    </h4>

</div>

<div class="card-body">
    <div class="row">
        <div class="col-md-8 mx-auto">
            {{-- alert --}}
            @include('backend.include.alert')
            <form action="{{ route('category.update', $category->id) }}" method="POST">
                @csrf
                @method('PUT')
                <input type="hidden" name="update_id" value="{{ $category->id }}">
                <div class="mb-3">
                    <label for="category_name" class="form-label">Category Name :</label>
                    <input type="text" placeholder="Category Name" value="{{ $category->name }}" id="category_name" name="category_name" class="form-control">
                    @error('category_name')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="status" class="form-label">Status :</label>
                    <select name="status" id="status" class="form-control">
                        <option value="">Select Status</option>
                        <option value="0" {{ $category->status == 0 ? 'selected' : '' }}>Pending</option>
                        <option value="1" {{ $category->status == 1 ? 'selected' : '' }}>Published</option>
                    </select>
                    @error('status')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="text-end">
                    <button type="submit" class="btn btn-sm btn-primary">Update</button>
                </div>



            </form>
        </div>
    </div>
</div>
@endsection
