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
                    <h4>Control branches</h4>
                    <p>View / delete / edit all the branches.</p>
                    <a href="{{ route('viewbranches') }}" class="btn btn-primary">View</a>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="info-box">
                <span class="info-box-icon bg-success"><i class="fa fa-plus"></i></span>
                <div class="info-box-content">
                    <h4>Create item</h4>
                    <p>Add new branches to the shop.</p>
                    <a href="{{ route('createbranche') }}" class="btn btn-success">Create</a>
                </div>
            </div>
        </div>

    </div>
@stop
