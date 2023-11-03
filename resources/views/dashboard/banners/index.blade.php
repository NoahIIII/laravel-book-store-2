@extends('adminlte::page')

@section('content')
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Banners</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Banner Image</th>
                        <th>Current Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($banners as $banner)
                        <tr>
                            <td>{{ $banner->id }}</td>
                            <td>
                                @if(file_exists(public_path('storage/'.$banner->image)))
                                <img src="{{ asset('storage/'.$banner->image)}}  " alt="Photo" width="100" height="100">
                                @else
                                <img src="{{ asset($banner->image)}}" alt="Photo" width="100" height="100">
                                @endif
                            </td>
                            <td>{{ $banner->status == 1 ? 'Active' : 'Inactive' }}</td>
                            <td>
                                <form action="{{ route('banner.delete',$banner->id) }}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-danger">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                                <br>
                                <form action="{{ route('banner.edit',$banner->id) }}" method="post" style="width: 50%">
                                    @csrf
                                    @method('put')
                                    <div class="form-group">
                                        <select name="status" class="form-control select2" style="width: 100%;">
                                            <option value="0">Inactive</option>
                                            <option value="1">Active</option>
                                        </select>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <!-- /.box-body -->
    </div>
    <!-- /.box -->
@stop
