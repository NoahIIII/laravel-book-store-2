@extends('adminlte::page')

@section('content_header')
    <h1>edit book ({{ $book->name }})</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Book Details</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form role="form" method="post" action="{{ route('book.edit',$book->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <div class="box-body">
                        <div class="form-group">
                            <label for="book_name">Book Name</label>
                            <x-adminlte-input name="name" value="{{ $book->name }}" placeholder="Enter Book Name"/>
                        </div>
                        <div class="form-group">
                            <label for="author">Author</label>
                            <x-adminlte-input name="author" value="{{ $book->author }}" placeholder="Enter author"/>
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <x-adminlte-input name="description" value="{{ $book->description }}" placeholder="Enter description" type="textarea"/>
                        </div>
                        <div class="form-group">
                            <label for="price">Price</label>
                            <x-adminlte-input name="price" value="{{ $book->price }}" placeholder="Enter price" type="number"/>
                        </div>
                        <div class="form-group">
                            <label for="discount">Discount</label>
                            <x-adminlte-input name="discount" value="{{ $book->discount }}" placeholder="Enter discount" type="number"/>
                        </div>
                        <div class="form-group">
                            <label for="category_id">Category ID</label>
                            <x-adminlte-input name="category_id" value="{{ $book->category_id}}" placeholder="Enter category ID" type="number"/>
                        </div>
                        <div class="form-group">
                            <label for="image">Image</label>
                            <x-adminlte-input name="image" placeholder="Upload image" type="file"/>
                        </div>
                        <div class="form-group">
                            <label for="status">Status</label>
                            <select class="form-control" id="status" name="status">

                                <option value="1">Active</option>
                                <option value="0">Inactive</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="stock">Stock</label>
                            <x-adminlte-input name="stock" placeholder="Enter stock" value="{{ $book->stock }}" type="number"/>
                        </div>
                        <div class="form-group">
                            <label for="number_of_pages">Number of Pages</label>
                            <x-adminlte-input name="number_of_pages" placeholder="Enter number of pages" value="{{ $book->number_of_pages }}" type="number"/>
                        </div>
                    </div>
                    <!-- /.box-body -->

                    <div class="box-footer text-center">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
            <!-- /.box -->
        </div>
    </div>
@stop
