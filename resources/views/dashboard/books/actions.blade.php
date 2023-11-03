@extends('adminlte::page')

@section('content_header')
    <h1>Action Links</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-md-4">
            <div class="info-box">
                <span class="info-box-icon bg-primary"><i class="fa fa-eye"></i></span>
                <div class="info-box-content">
                    <h4>Control Books</h4>
                    <p>View / edit / delete all the books.</p>
                    <a href="{{ route('viewbooks') }}" class="btn btn-primary">View</a>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="info-box">
                <span class="info-box-icon bg-success"><i class="fa fa-plus"></i></span>
                <div class="info-box-content">
                    <h4>Create item</h4>
                    <p>Add new Books to the shop.</p>
                    <a href="{{ route('createbook') }}" class="btn btn-success">Create</a>
                </div>
            </div>
        </div>

        {{-- <div class="col-md-4">
            <div class="info-box">
                <span class="info-box-icon bg-warning"><i class="fa fa-edit"></i></span>
                <div class="info-box-content">
                    <h4>Update Item</h4>
                    <p>Update details of an existing book.</p>
                    <a href="{{ route('updatebook') }}" class="btn btn-warning">Update</a>
                </div>
            </div>
        </div> --}}
    </div>
@stop
