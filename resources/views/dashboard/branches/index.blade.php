@extends('adminlte::page')
@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">branches</h3>
    </div>
    <div class="card-body">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>branche Name</th>
                    <th>Short Address</th>
                    <th>Full Address</th>
                    <th>Short Address</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Actions</th>
                    <!-- Add more table headers as needed -->
                </tr>
            </thead>
            <tbody>
                @foreach ($branches as $branche )
                <tr>
                    <td>{{ $branche->id }}</td>
                    <td>{{ $branche->name }}</td>
                    <td>{{ $branche->short_address }}</td>
                    <td>{{ $branche->full_address }}</td>
                    <td>{{ $branche->phone }}</td>
                    <td>{{ $branche->email }}</td>
                    <td>{{ $branche->created_at  }}</td>
                    <td><form action="{{ route('branch.delete',$branche->id) }}" method="post">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-danger">
                            <i class="fas fa-trash"></i>
                        </button>
                    </form>
                        <form action="{{ route('updatebranche',$branche->id) }}">
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
{{ $branches->links() }}
@endsection

