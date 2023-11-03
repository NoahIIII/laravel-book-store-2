@extends('adminlte::page')

@section('content_header')
    <h1>Edit branch ( {{ $branche->name }} )</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Branch Details</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form role="form" action="{{ route('branch.edit',$branche->id) }}" method="post" >
                    @csrf
                    @method('put')
                    <div class="box-body">
                        <div class="form-group">
                            <label for="name">branche Name</label>
                            <x-adminlte-input name="name" value="{{ $branche->name }}" placeholder="Enter the branche name"/>
                        </div>
                        <div class="form-group">
                            <label for="name">branche short address</label>
                            <x-adminlte-input name="short_address" value="{{ $branche->short_address }}" placeholder="Enter the branche name"/>
                        </div>
                        <div class="form-group">
                            <label for="name">branche full address</label>
                            <x-adminlte-input name="full_address" value="{{ $branche->full_address }}" placeholder="Enter the branche name"/>
                        </div>
                        <div class="form-group">
                            <label for="name">email</label>
                            <x-adminlte-input name="email" value="{{ $branche->email }}" placeholder="Enter the branche name"/>
                        </div>
                        <div class="form-group">
                            <label for="name">phone</label>
                            <x-adminlte-input name="phone" value="{{ $branche->phone }}" placeholder="Enter the branche name"/>
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
