@extends('adminlte::page')
@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Categories</h3>
    </div>
    <div class="card-body">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Category Name</th>
                    <th>Actions</th>
                    <!-- Add more table headers as needed -->
                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $category )
                <tr>
                    <td>{{ $category->id }}</td>
                    <td>{{ $category->name }}</td>
                    {{-- <td>{{ $category->created_at  }}</td> --}}
                    <td><form action="{{ route('category.delete',$category->id) }}" method="post">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-danger">
                            <i class="fas fa-trash"></i>
                        </button>
                    </form>
                        <form action="{{ route('updatecategory',$category->id) }}">
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-pencil-alt"></i>
                            </button>
                        </form>
                    </td>
                    </tr>
                    @endforeach
            </tbody>
        </table>
    </div>
</div>
{{-- {{ $categories->links() }} --}}

@endsection

