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
            @if ($ceks->id <= 0)
                <div class="col-12">
                    <div class="card shadow-lg mx-auto mt-5">
                        <h1 class="text-center">Belum ada calon untuk dipilih !</h1>
                        <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="btn btn-warning btn-block text-white">Keluar</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST">
                            @csrf
                        </form>
                    </div>
                </div>
            @else
                @foreach ($pasangan as $item)
                    <div class="col-lg-4 col-xl-4 col-12">
                        <div class="card shadow-lg card-pasangan">
                            <img src="{{asset('frontend/img/pasangan/pasangan-1.jpg')}}" class="img-cards">
                            <h3 class="text-center">{{$item->ketua_nama}} dan {{$item->wakil_nama}}</h3>
                            <div class="row">
                                <div class="col-lg-6">
                                    <a href="" class="btn btn-info btn-block mt-0">Detail</a>
                                </div>
                                <div class="col-lg-6">
                                    <a data-id="{{$item->id}}" id="voting" class="btn btn-primary btn-block mt-0 text-white">Pilih</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
{{-- END --}}
@endsection
@section('scripts')
<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
    <script type="text/javascript">
            // Proses Voting
            $(document).on('click','#voting', function () {
                var id = $(this).attr('data-id');
                $.get(' {{Url("proses-voting")}}', {'_token' : $('meta[name=csrf-token]').attr('content'),id:id}, function(resp){
                    // location.reload();
                    window.location = '/home';
                });
            });
    </script>
@endsection