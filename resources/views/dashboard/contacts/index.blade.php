@extends('adminlte::page')
@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">contacts</h3>
    </div>
    <div class="card-body">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Subject</th>
                    <th>Message</th>
                    <th>Created at</th>
                    <th>Actions</th>
                    <!-- Add more table headers as needed -->
                </tr>
            </thead>
            <tbody>
                @foreach ($contacts as $contact )
                <tr>
                    <td>{{ $contact->id }}</td>
                    <td>{{ $contact->name}}</td>
                    <td>{{ $contact->email }}</td>
                    <td>{{ $contact->phone  }}</td>
                    <td>{{ $contact->subject  }}</td>
                    <td>{{ $contact->message  }}</td>
                    <td>{{ $contact->created_at  }}</td>
                    <td><form action="{{ route('contact.delete',$contact->id) }}" method="post">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-danger">
                            <i class="fas fa-trash"></i>
                        </button>
                    </form></td>
                    </tr>
                    @endforeach
            </tbody>
        </table>
    </div>
</div>
{{ $contacts->links() }}
@endsection

