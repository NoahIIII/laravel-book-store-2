@extends('adminlte::page')
@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Users</h3>
    </div>
    <div class="card-body">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>UserName</th>
                    <th>Email</th>
                    <th>Type</th>
                    <th>Created at</th>
                    <th>Actions</th>
                    <!-- Add more table headers as needed -->
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user )
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->fname }}</td>
                    <td>{{ $user->lname }}</td>
                    <td>{{ $user->username  }}</td>
                    <td>{{ $user->email  }}</td>
                    <td>{{ $user->type  }}</td>
                    <td>{{ $user->created_at  }}</td>
                    <td><form action="{{ route('user.destroy',$user->id) }}" method="post">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-danger">
                            <i class="fas fa-trash"></i>
                        </button>
                    </form>

                        <form action="{{ route('updateuser',$user->id)}}" >
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
{{ $users->links() }}
@endsection

