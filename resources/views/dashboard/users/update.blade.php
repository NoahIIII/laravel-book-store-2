@extends('adminlte::page')

@section('content_header')
    <h1>Update User ({{ $user->fname }})</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">User Details</h3>
                </div>
                <form role="form" method="post" action="{{ route('user.edit',$user->id) }}">
                    @csrf
                    @method('put')
                    <div class="box-body">
                        <div class="form-group">
                            <label for="first name">first name</label>
                            <x-adminlte-input name="fname" value="{{ $user->fname }}" placeholder="Enter the first name"/>
                        </div>
                        <div class="form-group">
                            <label for="author">last name</label>
                            <x-adminlte-input name="lname" value="{{ $user->lname }}" placeholder="Enter the last name"/>
                        </div>
                        <div class="form-group">
                            <label for="email">email</label>
                            <x-adminlte-input name="email" value="{{ $user->email }}" placeholder="Enter email" type="email"/>
                        </div>
                        <div class="form-group">
                            <label for="email">user name</label>
                            <x-adminlte-input name="username" value="{{ $user->username}}" placeholder="Enter email" type="text"/>
                        </div>
                        <div class="form-group">
                            <label for="type">type</label>
                            <select class="form-control" id="type" name="type">
                                <option value="user">User</option>
                                <option value="admin">Admin</option>
                            </select>
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
