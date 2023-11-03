@extends('adminlte::page')
@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">orders</h3>
    </div>
    <div class="card-body">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>UserID</th>
                    <th>Total</th>
                    <th>Total After Discount</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($orders as $order )
                <tr>
                    <td>
                        {{ $order->id }}
                    </td>
                    <td>
                        {{ $order->user_id }}
                    </td>
                    <td>
                        {{ $order->total }}
                    </td>
                    <td>
                        {{ $order->total_after_discount }}
                    </td>
                    <td>
                        {{ $order->status }}
                    </td>
                    <td>
                    <form action="{{ route('order.delete',$order->id) }}" method="post">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-danger">
                            <i class="fas fa-trash"></i>
                        </button>
                    </form>
                    <br>
                    @if($order->status=='pending')
                    <form action="{{ route('order.confirm',$order->id) }}" method="post">
                        @csrf
                        @method('put')
                        <x-adminlte-button type="submit" theme="primary" label="confirm order" />
                    </form>

                    @else
                     cant stop order after the confirmation
                     @endif
                </td>
                    </tr>
                    @endforeach
            </tbody>
        </table>
    </div>
</div>
{{ $orders->links() }}
@endsection
