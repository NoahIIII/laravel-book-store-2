@extends('adminlte::page')

@section('content_header')
    <h1>Edit Category ({{ $category->id }})</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Cateogry Details</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form role="form" method="post" action="{{ route('category.edit',$category->id) }}" >
                    @csrf
                    @method('put')
                    <div class="box-body">
                        <div class="form-group">
                            <label for="name">Category Name</label>
                            <x-adminlte-input name="name" value="{{ $category->name }}" placeholder="Enter the new category name"/>
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
