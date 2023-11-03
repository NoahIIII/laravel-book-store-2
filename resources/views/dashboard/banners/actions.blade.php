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
                    <h4>Control banners</h4>
                    <p>View / delete / edit all the banners.</p>
                    <a href="{{ route('viewbanners') }}" class="btn btn-primary">View</a>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="info-box">
                <span class="info-box-icon bg-success"><i class="fa fa-plus"></i></span>
                <div class="info-box-content">
                    <h4>Create item</h4>
                    <p>Add new banners to the shop.</p>
                    <a href="{{ route('createbanner') }}" class="btn btn-success">Create</a>
                </div>
            </div>
        </div>
    </div>
@stop
