@if(!session('verification_sent'))
@php

    return redirect()->to(route('home'));
@endphp
@endif
@extends('layout.app')
@section('title', 'Verify Code')
@section('content')
    <main>

        <div class="page-full pb-5">
            <div class="account account--verify mt-5 pt-5">
                <div class="account__verify w-100">
                    @error('*')
                        <div class="alert alert-danger">
                            {{ $message }}
                        </div>
                    @enderror
                    <form class="mb-5" method="POST" action="{{ route('verify') }}">
                        @csrf
                        <div class="input-group rounded-1 mb-3">
                            <input type="text" name="code" class="form-control p-3" placeholder="Enter verification code"
                                aria-label="Verification Code" aria-describedby="basic-addon1" />
                            <span class="input-group-text verify__input-icon" id="basic-addon1">
                                <!-- Your icon for verification code input -->
                                <!-- Example: -->
                                <!-- <i class="fa-solid fa-check-circle"></i> -->
                            </span>
                        </div>

                        <button class="text-center fs-6 py-2 w-100 bg-black text-white border-0 rounded-1">
                            Verify Code
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </main>
@endsection
