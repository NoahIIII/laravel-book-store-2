@extends('adminlte::page')

@section('content')
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Add new Banner</h3>
        </div>
        <div class="box-body">

            <form action="{{ route('banner.create') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="image">Banner Image</label>
                    <x-adminlte-input name="image" type="file"/>
                </div>
                <div class="form-group">
                    <label for="status">Banner Status</label>
                    <select name="status" class="form-control">
                        <option value="0">Inactive</option>
                        <option value="1">Active</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>

    </div>
@stop
