@extends('adminlte::page')

@section('content_header')
    <h1>Add new book</h1>
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
                <form role="form" method="post" action="{{ route('book.create') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="box-body">
                        <div class="form-group">
                            <label for="book_name">Book Name</label>
                            <x-adminlte-input name="name" placeholder="Enter Book Name"/>
                        </div>
                        <div class="form-group">
                            <label for="author">Author</label>
                            <x-adminlte-input name="author" placeholder="Enter author"/>
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <x-adminlte-input name="description" placeholder="Enter description" type="textarea"/>
                        </div>
                        <div class="form-group">
                            <label for="price">Price</label>
                            <x-adminlte-input name="price" placeholder="Enter price" type="number"/>
                        </div>
                        <div class="form-group">
                            <label for="discount">Discount</label>
                            <x-adminlte-input name="discount" placeholder="Enter discount" type="number"/>
                        </div>
                        <div class="form-group">
                            <label for="category_id">Category ID</label>
                            <x-adminlte-input name="category_id" placeholder="Enter category ID" type="number"/>
                        </div>
                        <div class="form-group">
                            <label for="image">Image</label>
                            <x-adminlte-input name="image" placeholder="Upload image" type="file"/>
                        </div>
                        <div class="form-group">
                            <label for="status">Status</label>
                            <select class="form-control" id="status" name="status">
                                <option value="" selected>Select Status</option>
                                <option value="1">Active</option>
                                <option value="0">Inactive</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="stock">Stock</label>
                            <x-adminlte-input name="stock" placeholder="Enter stock" type="number"/>
                        </div>
                        <div class="form-group">
                            <label for="number_of_pages">Number of Pages</label>
                            <x-adminlte-input name="number_of_pages" placeholder="Enter number of pages" type="number"/>
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
