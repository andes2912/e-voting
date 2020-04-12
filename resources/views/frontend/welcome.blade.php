@extends('layouts.frontend')
@section('title','Welcome')
@section('content')
{{-- HEADER --}}
    <div class="container-fluid">
        @include('frontend.header.index')
    </div>
{{-- END --}}

{{-- CONTENT --}}
    @include('frontend.content.index')
{{-- END --}}

@endsection