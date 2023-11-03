@extends('adminlte::page')

@section('content_header')
    <h1>Add new branche</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Branche Details</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form role="form" method="post" action="{{ route('branch.create') }}">
                    @csrf
                    <div class="box-body">
                        <div class="form-group">
                            <label for="name">branche Name</label>
                            <x-adminlte-input name="name" type="text" placeholder="Enter the branche name"/>
                        </div>
                        <div class="form-group">
                            <label for="short_address">branche short address</label>
                            <x-adminlte-input name="short_address"  type="text" placeholder="Enter the branche short_address"/>
                        </div>
                        <div class="form-group">
                            <label for="full_addres">branche full address</label>
                            <x-adminlte-input name="full_address" type="text"  placeholder="Enter the branche name"/>
                        </div>
                        <div class="form-group">
                            <label for="email">email</label>
                            <x-adminlte-input name="email" type="email" placeholder="Enter the branche name"/>
                        </div>
                        <div class="form-group">
                            <label for="phone">phone</label>
                            <x-adminlte-input name="phone" type="text"  placeholder="Enter the branche name"/>
                        </div>
                    </div>
                    <div class="box-footer text-center">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
            <!-- /.box -->
        </div>
    </div>
@stop
