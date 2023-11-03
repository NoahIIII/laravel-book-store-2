@extends('adminlte::page')
@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">books</h3>
    </div>
    <div class="card-body">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Author</th>
                    <th>Description</th>
                    <th>Price</th>
                    <th>Discount</th>
                    <th>P.After</th>
                    <th>N.Pages</th>
                    <th>N.Sales</th>
                    <th>Actions</th>
                    <!-- Add more table headers as needed -->
                </tr>
            </thead>
            <tbody>
                @foreach ($books as $book )
                <tr>
                    <td>{{ $book->id }}</td>
                    <td>{{ $book->name }}</td>
                    <td>{{ $book->author }}</td>
                    <td>{{ $book->description}}</td>
                    <td>{{ $book->price}}</td>
                    <td>{{ $book->discount}}</td>
                    <td>{{ $book->price_after_discount}}</td>
                    <td>{{ $book->number_of_pages}}</td>
                    <td>{{ $book->best_seller}}</td>
                    <td>
                    <form action="{{ route('book.delete',$book->id) }}" method="post">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-danger">
                            <i class="fas fa-trash"></i>
                        </button>
                    </form>
                        <form action="{{ route('updatebook',$book->id)}}" >
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
{{ $books->links() }}
@endsection

