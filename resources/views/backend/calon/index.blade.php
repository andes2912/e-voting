@extends('layouts.backend')
@section('title','Calon')
@section('content')
<div class="row">
   
    @if ($cek->status == "Tidak Aktif" || $cek->id <= 1)
        <div class="col-12">
            <div class="card shadow-lg mx-auto">
                <h1 class="text-center">Tidak Ada Calon !!</h1>
            </div>
            <div class="col text-center">
                <a href="{{route('calon.create')}}" class="btn btn-primary">Tambah Calon</a>
            </div>
        </div>
    @else
        @foreach ($calon as $item)
            <div class="col-xl-3 col-md-6 col-sm-12 profile-card-2">
                <div class="card">
                    <div class="card-header mx-auto pb-0">
                        <div class="row m-0">
                            <div class="col-sm-12 text-center">
                                <h4>{{$item->nama_calon}}</h4>
                            </div>
                            <div class="col-sm-12 text-center">
                                <p class="">{{$item->role}}</p>
                            </div>
                        </div>
                    </div>
                    <div class="card-content">
                        <div class="card-body text-center mx-auto">
                            <div class="avatar avatar-xl">
                                <img class="img-fluid" src="{{asset('backend/images/profile/user-uploads/user-04.jpg')}}" alt="img placeholder">
                            </div>
                            <div class="d-flex justify-content-between mt-2">
                                <span class="col-sm-12 text-center">{{$item->umur}} Tahun</span>
                            </div>
                            <button class="btn gradient-light-primary btn-block mt-2">Detail</button>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    @endif
</div>
@endsection