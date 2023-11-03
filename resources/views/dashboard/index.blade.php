@extends('adminlte::page')

@section('content')

    <x-adminlte-small-box title="{{ $users }}" text="New User Registrations Today" icon="fas fa-user-plus text-teal"
        theme="primary" url="{{ route('viewusers') }}" url-text="View all users "  class="mx-2"/>
{{--  --}}
    <x-adminlte-small-box title="{{ $orders }}" text="New Orders Today" icon="fas fa-shopping-cart"
        theme="danger" url="{{ route('vieworders') }}" url-text="View all orders"   class="mx-2"/>
{{--  --}}
    <x-adminlte-small-box title="{{ $contacts }}" text="New Message Today" icon="fas far fa-envelope"
        theme="info" url="{{ route('viewcontacts') }}" url-text="View all messages"  class="mx-2"/>
{{--  --}}
    <x-adminlte-small-box title="{{ $books }}" text=" Total Number Of Books" icon="fas fa-copy text-dark"
    theme="teal" url="{{ route('viewbooks') }}" url-text="View all books" />

@endsection
