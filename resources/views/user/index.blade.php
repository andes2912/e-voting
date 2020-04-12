@extends('layouts.frontend')
@section('title','Dashboard Pemilih')
@section('content')
{{-- HEADER --}}
    <div class="container-fluid">
        @include('frontend.header.index')
    </div>
{{-- END --}}

{{-- CONTENT --}}
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6 col-xl-6 col-12">
                <div class="card shadow-lg card-user" style="background-image:url('{{asset('backend/images/pages/graphic-3.png')}}')">
                    
                </div>
            </div>
            <div class="col-lg-6 col-xl-6 col-12">
                <div class="card shadow-lg card-user" style="background-image:url('{{asset('backend/images/pages/graphic-1.png')}}')">
                    
                </div>
            </div>
        </div>
        @if (@$cek->user_id == auth::user()->id)
            <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="btn btn-warning btn-block text-white">Keluar</a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST">
                @csrf
            </form>
        @else
            <a href="{{url('voting')}}" class="btn btn-primary btn-block">Voting</a>
        @endif
    </div>
{{-- END --}}

@endsection