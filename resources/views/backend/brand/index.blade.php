@extends('layouts.backend')
@section('content')
<div class="card-header">
    <h4 class="card-title mb-0 d-flex justify-content-between">Brand List
        <a href="{{ route('brand.create') }}" class="btn btn-sm btn-outline-primary">Add New</a>
    </h4>

</div>

<div class="card-body">
    @include('backend.include.alert')
    <table class="table table-sm table-striped table-hover table-bordered">
        <thead class="text-center">
            <th>SL</th>
            <th>Brand Name</th>
            <th>Status</th>
            <th>Action</th>
        </thead>
        <tbody>
            @forelse ($brand as $value)
                <tr class="text-center">
                    <td>{{ $loop->index+1 }}</td>
                    <td>{{ $value->name }}</td>
                    <td>
                        @if ($value->status == 1)
                            <span class="badge bg-success">Published</span>
                        @else
                            <span class="badge bg-danger">Pending</span>

                        @endif
                    </td>

                    <td>
                       <div class="d-flex justify-content-center">
                        <a href="{{ route('brand.edit', $value->id) }}" class="btn btn-sm btn-info me-1">Edit</a>
                        <form id="delete-form-{{ $value->id }}" action="{{ route('brand.delete', $value->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                        </form>

                        <button type="button" class="btn btn-sm btn-danger" onclick="alert_message({{ $value->id }})">Delete</button>
                        </div>
                    </td>
                </tr>
                @empty
                    <tr>
                        <td colspan="4" class="text-danger text-center">No Data Found</td>
                    </tr>

            @endforelse

        </tbody>

    </table>
</div>
@endsection
