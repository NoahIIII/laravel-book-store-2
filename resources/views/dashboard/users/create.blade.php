@extends('adminlte::page')

@section('content_header')
    <h1>Add new User</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">User Details</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form role="form" action="{{ route('user.create') }}"  method="post">
                    @csrf
                    <div class="box-body">
                        <div class="form-group">
                            <label for="first name">first name</label>
                            <x-adminlte-input name="fname" placeholder="Enter the first name"/>
                        </div>
                        <div class="form-group">
                            <label for="author">last name</label>
                            <x-adminlte-input name="lname" placeholder="Enter the last name"/>
                        </div>
                        <div class="form-group">
                            <label for="email">email</label>
                            <x-adminlte-input name="email" placeholder="Enter email" type="textarea"/>
                        </div>
                        <div class="form-group">
                            <label for="password">password</label>
                            <x-adminlte-input name="password" placeholder="Enter password" type="password"/>
                        </div>
                        <div class="form-group">
                            <label for="type">type</label>
                            <select class="form-control" id="type" name="type">

                                <option value="user">User</option>
                                <option value="admin">Admin</option>
                            </select>
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
